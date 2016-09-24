<template>
    <div class="filter-list">
        <h3>{{title}}</h3>
        <ul>
            <li v-for="item in items">
                <label v-bind:for="getInputId(prefix, item.code)">
                    <input type="checkbox" name="checkboxes" v-bind:id="getInputId(prefix, item.code)" :value="item.code">
                    {{item.name}}
                </label>
            </li>
            <li class="more">
                <button><i class="fa fa-plus-square" aria-hidden="true"></i> View More</button>
            </li>
        </ul>
    </div>
</template>

<script>
export default {
    methods: {
        getInputId: function (prefix, code) {
            return prefix + code
        }
    },
    props: ['items', 'prefix', 'title']
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
