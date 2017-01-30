<template>
    <div class="filter-list">
        <h3>{{title}}</h3>
        <ul>
            <li v-for="item in getItems">
                <label v-bind:for="getInputId(id, item.id)">
                    <input type="checkbox" v-bind:id="getInputId(id, item.id)" :checked="item.selected" @change="change(item)">
                    {{item.name}}
                </label>
            </li>
            <li class="more" v-if="displayViewMore">
                <button @click.prevent="viewMore()"><i class="fa fa-plus-square" aria-hidden="true"></i> {{ $t('global.more_btn') }}</button>
            </li>
            <li class="less" v-if="displayViewLess">
                <button @click.prevent="viewLess()"><i class="fa fa-minus-square" aria-hidden="true"></i> View Less</button>
            </li>
        </ul>
    </div>
</template>

<script>
import Vue from 'vue';

export default {
    props: ['items', 'id', 'title'],
    data() {
        return {
            'view_all': false,
            'max_items': 5,
        }
    },
    methods: {
        getInputId: function (filter_id, item_id) {
            return filter_id + item_id;
        },
        viewMore: function () {
            this.view_all = true;
        },
        viewLess: function () {
            this.view_all = false;
        },
        change: function (item) {
            Vue.set(item, 'selected', !item.selected);
            var data = {id: this.id, item_id: this.getInputId(this.id, item.id), item: item};
            if (item.selected) {
                this.$emit('onselectfilter', data);
            } else {
                this.$emit('onremovefilter', data);
            }
        }
    },
    computed: {
        getItems() {
            if (this.view_all) {
                return this.items;
            }
            return this.items.slice(0, this.max_items);
        },
        displayViewMore() {
            return !(this.view_all || this.items.length <= this.max_items);
        },
        displayViewLess() {
            return this.view_all;
        }
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
            margin-bottom: 3px;
            label {
                font-weight: normal;
                cursor: pointer;
                padding: 5px 0;
                margin: 0;
            }
        }
    }
    .more button, .less button {
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
