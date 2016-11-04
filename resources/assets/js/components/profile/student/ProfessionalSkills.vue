<template>
    <div class="form-group clearfix" v-bind:class="{ 'alert alert-danger': has_error }">
        <label for="professionalSkillsInput">Professional skills (max {{ max_professional_skills }})</label>

        <ul class="selected-skills list-unstyled" v-show="selected_items.length > 0">
            <li class="btn btn-default" v-for="skill in selected_items">
                <input type="hidden" name="professionalSkills[]" :value="skill.name"/>
                {{ skill.name }}
                <a title="Remove professional skill" @click.prevent="removeSkill(skill)"><i class="fa fa-close" aria-hidden="true"></i></a>
            </li>
        </ul>

        <div class="dropdown suggestions-dropdown col-sm-10 no-padding" v-bind:class="{'open': openSuggestion}">
            <input type="text" class="form-control" id="professionalSkillsInput" v-model="model" placeholder="Add a professional skill"
               @keydown.enter.prevent="enter" @keydown.down="down" @keydown.up="up" @input="change" :disabled="selected_items.length >= max_professional_skills"/>
            <ul class="dropdown-menu suggestions-menu">
                <li v-for="(index, item) in matches" v-bind:class="{'active': isActive(index)}" @click="selectItem(index)">
                    <a>{{item.name}}</a>
                </li>
            </ul>
        </div>
        <div class="col-sm-2 no-padding">
            <button class="btn btn-primary button-add-skill" @click.prevent="enter()" :disabled="selected_items.length >= max_professional_skills">Add</button>
        </div>

        <span v-if="has_error" class="help-block">
            <strong>{{error_message}}</strong>
        </span>

        <input type="hidden" name="remove_all_professional_skills" v-if="selected_items.length == 0" value="true"/>
    </div>
</template>

<script>
import { setCodeForValidation, setInitError, onInput } from '../common/form-helpers';

// source http://fareez.info/blog/create-your-own-autocomplete-using-vuejs/
export default {
    props: ['skills', 'selectedSkills', 'errors'],
    data() {
        return {
            code: 'professionalSkills',
            max_professional_skills: 6,
            selected_items: JSON.parse(this.selectedSkills),
            items: JSON.parse(this.skills),
            model: '',
            open: false,
            current: -1,
            has_error: false,
            error_message: null
        };
    },
    created() {
        setCodeForValidation.call(this);
        setInitError.call(this);
    },
    methods: {
        enter() {
            if (this.current > -1) {
                this.selectItem(this.current);
                return;
            }

            this.model = this.model.trim();

            var is_duplicate = _.find(this.selected_items, (selected) => {
                return selected.name.toLowerCase() == this.model.toLowerCase();
            });
            if (this.model.length == 0 || is_duplicate) {
                return;
            }

            if (this.matches.length == 1 && this.matches[0].name.length == this.model.length) {
                this.current = 0;
            }
            this.selectItem(this.current)
        },
        up() {
            if (this.current > -1) {
                this.current--;
            }
        },
        down() {
            if (this.current < this.matches.length - 1) {
                this.current++;
            }
        },
        isActive(index) {
            return index === this.current;
        },
        change() {
            this.current = -1;
            if (this.open == false) {
                this.open = true;
            }
        },
        removeSkill(skill) {
            var index = this.selected_items.indexOf(skill);
            if (index >= 0) {
                this.selected_items.splice(index, 1);
            }
        },
        selectItem(index) {
            if (index >= 0) {
                this.selected_items.push(this.matches[index]);
            } else {
                this.selected_items.push({'id': 'new', 'language_code': 'en', 'name': this.model});
            }
            this.model = '';
            this.open = false;
            this.current = -1;
        }
    },
    computed: {
        suggestions() {
            return this.items.filter((item) => {
                return !_.find(this.selected_items, (selected) => {
                    return item.id == selected.id;
                });
            });
        },
        matches() {
            return this.suggestions.filter((str) => {
                return str.name.toLowerCase().indexOf(this.model.toLowerCase()) >= 0;
            });
        },
        openSuggestion() {
            return this.model !== "" && this.matches.length != 0 && this.open === true;
        }
    },
    watch: {
        selected_items: function () {
            onInput.call(this);
        }
    }
};
</script>

<style lang="sass" scoped>
.selected-skills .btn-default {
    margin-right: 5px;
    margin-bottom: 5px;
}
.no-padding {
    padding: 0;
}
.suggestions-dropdown {

    .suggestions-menu {
        width: 100%;

        & > li > a {
            cursor: pointer;
            padding-top: 5px;
            padding-bottom: 5px;
        }
    }
}

.button-add-skill {
    width: 100%;
    height: 50px;
}
</style>
