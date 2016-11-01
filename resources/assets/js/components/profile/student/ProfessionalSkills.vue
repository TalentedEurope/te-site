<template>
    <div class="form-group clearfix">
        <label>Professional skills</label>

        <ul class="selected-skills list-unstyled" v-show="selected_items.length > 0">
            <li class="btn btn-default" v-for="skill in selected_items">
                <input type="hidden" name="professionalSkills[]" :value="skill.name"/>
                {{ skill.name }}
                <a title="Remove professional skill" @click.prevent="removeSkill(skill)"><i class="fa fa-close" aria-hidden="true"></i></a>
            </li>
        </ul>

        <div class="dropdown suggestions-dropdown col-sm-10 no-padding" v-bind:class="{'open': openSuggestion}">
            <input type="text" class="form-control" v-model="model" placeholder="Add a professional skill"
               @keydown.enter.prevent="enter" @keydown.down="down" @keydown.up="up" @input="change"/>
            <ul class="dropdown-menu suggestions-menu">
                <li v-for="(index, item) in matches" v-bind:class="{'active': isActive(index)}" @click="selectItem(index)">
                    <a>{{item.name}}</a>
                </li>
            </ul>
        </div>
        <div class="col-sm-2 no-padding">
            <button class="btn btn-primary button-add-skill" @click.prevent="enter()">Add</button>
        </div>
    </div>
</template>


<script>
// source http://fareez.info/blog/create-your-own-autocomplete-using-vuejs/
export default {
    props: ['skills', 'selectedSkills'],
    data() {
        return {
            selected_items: [],
            items: [],
            model: '',
            open: false,
            current: -1,
        };
    },
    ready() {
        this.selected_items = JSON.parse(this.selectedSkills);
        this.items = JSON.parse(this.skills);
    },
    methods: {
        enter() {
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
                return _.indexOf(this.selected_items, item) == -1;
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
