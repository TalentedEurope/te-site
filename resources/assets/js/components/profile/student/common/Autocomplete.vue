<template>
    <div class="form-group clearfix">
        <div class="dropdown suggestions-dropdown no-padding" v-bind:class="{'open': openSuggestion}">
            <input type="text" class="form-control" v-model="selected_name" :placeholder="placeholder"
               @keydown.enter.prevent="enter" @keydown.down="down" @keydown.up="up" @input="change" :disabled="disabled" :required="required"/>
            <ul class="dropdown-menu suggestions-menu">
                <li v-for="(index, item) in matches" v-bind:class="{'active': isActive(index)}" @click="selectItem(index)">
                    <a>{{item.name}}</a>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
import EventBus from 'event-bus.js';

// source http://fareez.info/blog/create-your-own-autocomplete-using-vuejs/
export default {
    props: ['code', 'items', 'placeholder', 'disabled', 'required'],
    data() {
        return {
            selected: null,
            selected_name: '',
            open: false,
            current: -1,
        };
    },
    created() {
        if (_.isNull(this.items) || _.isUndefined(this.items)) {
            this.items = [];
        }
    },
    methods: {
        enter() {
            if (this.current > -1) {
                this.selectItem(this.current);
                return;
            }
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
        selectItem(index) {
            this.selected = this.matches[index];
            this.selected_name = this.matches[index]["name"];
            this.open = false;
            this.current = -1;
            EventBus.$emit(`onAutocompleteChange-${this.code}`, this.selected);
        }
    },
    computed: {
        matches() {
            return this.items.filter((str) => {
                return str.name.toLowerCase().indexOf(this.selected_name.toLowerCase()) >= 0;
            });
        },
        openSuggestion() {
            return this.selected_name !== "" && this.matches.length != 0 && this.open === true;
        }
    },
    watch: {
        items: function (value) {
            if (value.length == 0) {
                this.selected = null;
                this.selected_name = '';
                EventBus.$emit(`onAutocompleteChange-${this.code}`, this.selected);
            }
        },
    }
};
</script>

<style lang="sass" scoped>
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
</style>
