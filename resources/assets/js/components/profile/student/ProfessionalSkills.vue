<template>
    <div>
        <div class="form-group dropdown" v-bind:class="{'open': openSuggestion}">
            <label for="profesional_skills">Professional skills</label>

            <ul class="selected-skills list-unstyled">
                <li class="btn btn-default" v-for="skill in selected_items">
                    <input type="hidden" name="professionalSkills[]" :value="skill.name"/>
                    {{ skill.name }}
                    <a title="Remove professional skill" @click.prevent="removeSkill(skill)"><i class="fa fa-close" aria-hidden="true"></i></a>
                </li>
            </ul>

            <input type="text" class="form-control" v-model="model"
                @keydown.enter.prevent="enter" @keydown.down="down" @keydown.up="up" @input="change"/>
            <ul class="dropdown-menu">
                <li v-for="(item, index) in matches" v-bind:class="{'active': isActive(index)}" @click="suggestionClick(index)">
                    <a>{{item}}</a>
                </li>
            </ul>
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
            items: ['test1', 'test2', 'test3'],
            model: '',
            open: false,
            current: -1,
        };
    },
    mounted() {
        this.selected_items = JSON.parse(this.selectedSkills);
        // this.items = JSON.parse(this.skills);
    },
    methods: {
        enter() {
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
        suggestionClick(index) {
            this.selectItem(index)
        },
        selectItem(index) {
            if (index >= 0) {
                this.selected_items.push({name: this.matches[index]});
            } else {
                this.selected_items.push({name: this.model});
            }
            this.model = '';
            this.open = false;
            this.current = -1;
        }
    },
    computed: {
        suggestions() {
            return this.items.filter((item) => {
                return !(_.includes(this.selected_items, item))
            });
        },
        matches() {
            return this.suggestions.filter((str) => {
                return str.indexOf(this.model) >= 0;
            });
        },
        openSuggestion() {
            return this.model !== "" && this.matches.length != 0 && this.open === true;
        }
    }
};
</script>

<style>
</style>
