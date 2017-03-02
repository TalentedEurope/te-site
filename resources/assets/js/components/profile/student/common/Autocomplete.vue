<template>
    <div class="form-group clearfix">
        <div class="dropdown suggestions-dropdown no-padding" v-bind:class="{'open': openedSuggestions}">
            <input type="hidden" :code="code" :name="code" :value="selected_id"/>
            <input type="text" class="form-control" v-model="selected_name" :placeholder="placeholder"
               @keydown.enter.prevent="enter" @keydown.down="down" @keydown.up="up" @input="change" :disabled="disabled" :required="required"/>
            <ul class="dropdown-menu suggestions-menu" v-if="matches.length > 0">
                <li v-for="(index, item) in matches" v-bind:class="{'active': isActive(index)}" @click="selectItem(index)">
                    <a>{{item.name}}</a>
                </li>
            </ul>
            <div class="no-matches" v-if="showMessageNoMatches">
                <div class="text-center">No matches</div>
            </div>
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
            selected_id: null,
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
            } else if (this.matches.length == 1) {
                this.selectItem(0);
            }
        },
        up() {
            if (this.current > -1) {
                this.current--;
            }
        },
        down() {
            this.openSuggestions();
            if (this.current < this.matches.length - 1) {
                this.current++;
            }
        },
        isActive(index) {
            return index === this.current;
        },
        change() {
            this.current = -1;
            this.openSuggestions();
        },
        selectItem(index) {
            this.setSelected(this.matches[index]);
            this.open = false;
            this.current = -1;
            EventBus.$emit(`onAutocompleteChange-${this.code}`, this.selected);
        },
        setSelected(selected) {
            if (_.isNull(selected)) {
                this.selected = null;
                this.selected_id = null;
                this.selected_name = '';
            } else {
                this.selected = selected;
                this.selected_id = selected['id'];
                this.selected_name = selected['name'];
            }
        },
        openSuggestions() {
            if (this.open == false) {
                this.open = true;
            }
        },
        clickOutside(e) {
            if ($(this.$el).find(e.target).length == 0) {
                this.open = false;
                this.setSelected(this.selected);
            }
        }
    },
    computed: {
        matches() {
            return this.items.filter((str) => {
                return str.name.toLowerCase().indexOf(this.selected_name.toLowerCase()) >= 0;
            });
        },
        openedSuggestions() {
            return this.matches.length != 0 && this.open === true;
        },
        showMessageNoMatches() {
            return this.selected_name != '' && this.items.length > 0 && this.matches.length == 0;
        }
    },
    watch: {
        items: function (value) {
            if (value.length == 0) {
                this.setSelected(null);
                EventBus.$emit(`onAutocompleteChange-${this.code}`, this.selected);
            }
        },
        open: function (value) {
            if (value) {
                $('body').on("click", this.clickOutside);
            } else {
                $('body').off("click", this.clickOutside);
            }
        },
        selected_name: function (value) {
            TE.profile.modified_fields = true;
        }
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

.no-matches {
    position: absolute;
    top: 100%;
    left: 0;
    padding: 0.3em;
    width: 100%;
    background-color: #fbfbfb;
    border: 1px solid rgba(0, 0, 0, 0.15);
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.175);
}
</style>
