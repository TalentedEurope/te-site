<template>
    <div class="filter-list">
        <h3>{{title}}</h3>
        <ul>
            <li v-for="item in getItems">
                <label v-bind:for="getInputId(code, item.code)">
                    <input type="checkbox" name="checkboxes" v-bind:id="getInputId(code, item.code)" :value="item.code" v-model="selected_items">
                    {{item.name}}
                </label>
            </li>
            <li class="more" v-if="displayViewMore">
                <button @click="viewMore()"><i class="fa fa-plus-square" aria-hidden="true"></i> View More</button>
            </li>
        </ul>
    </div>
</template>

<script>
export default {
    props: ['items', 'code', 'title'],
    data() {
        return {
            'view_more': false,
            'max_items': 4,
            'selected_items': []
        }
    },
    methods: {
        getInputId: function (filter_code, item_code) {
            return filter_code + item_code;
        },
        viewMore: function () {
            this.view_more = true;
            return;
        }
    },
    computed: {
        getItems() {
            if (this.view_more) {
                return this.items;
            }
            return this.items.slice(0, this.max_items);
        },
        displayViewMore() {
            return !(this.view_more || this.items.length <= this.max_items);
        }
    },
    watch: {
        selected_items: function () {
            this.$emit('onselectfilter', {code: this.code, selected: this.selected_items});
        },
    }
}
</script>

<style lang="sass" scoped>
@import "resources/assets/sass/variables";
.search-options .filter-list {
    ul {
        list-style: none;
        padding-left: 10px;
        border-left: 2px solid $blue;
        li {
            font-size: 16px;
            padding: 5px 0;
            label {
                font-weight: normal;
                cursor: pointer;
            }
        }
    }
    .more button {
        background: none;
        border: none;
        font-size: 14px;
        color: $blue;
        &:hover {
            text-decoration: underline;
        }
        .fa {
            padding-right: 5px;
        }
    }
}
</style>
