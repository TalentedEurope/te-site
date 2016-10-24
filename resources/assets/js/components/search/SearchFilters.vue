<template>
    <div class="col-sm-4 col-md-3 search-options">
        <div class="options-title">
            <span class="h3"><i class="fa fa-filter" aria-hidden="true"></i>Filters</span>
        </div>
        <div class="current-search" v-if="current_search.length > 0">
            <h3>Current Search</h3>
            <ul>
                <li v-for="filter in current_search">
                    {{filter.item.name}} <button class="remove-item" @click.prevent="removeCurrentSearchFilter(filter)"><i class="fa fa-close" aria-hidden="true"></i></button>
                </li>
            </ul>
        </div>
        <multi-options-filter v-for="filter in filters" @onselectfilter="selectFilter" @onremovefilter="removeFilter" :items="filter.items" :id="filter.id" :title="filter.title"></multi-options-filter>
    </div>
</template>

<script>
import EventBus from 'event-bus.js';
import MultiOptionsFilter from './MultiOptionsFilter.vue';
import { companiesFiltersResource, studentsFiltersResource } from 'resources/search';

export default {
    props: ['collective'],
    components: {
        'multi-options-filter': MultiOptionsFilter,
    },
    data () {
        return {
            current_search: [],
            filters: [],
            applied_filters: {}
        }
    },
    mounted () {
        this.fetchFilters();
    },
    methods: {
        fetchFilters: function () {
            if (this.collective == 'companies') {
                var resource = companiesFiltersResource;
            } else {
                var resource = studentsFiltersResource;
            }

            resource.get().then((response) => {
                this.filters = response.body;
            }, (errorResponse) => {
                console.log(errorResponse);
            });
        },
        removeCurrentSearchFilter: function (filter) {
            var e_filter = this.filters.find(x => x.id === filter.id);
            var item = e_filter.items.find(x => x.id === filter.item.id);
            this.$set(item, 'selected', false);

            this.removeFilter(filter);
        },
        selectFilter: function (filter) {
            this.current_search.push(filter);

            if (!this.applied_filters[filter.id]) {
                this.applied_filters[filter.id] = [];
            }
            this.applied_filters[filter.id].push(filter.item.id);

            EventBus.$emit('onChangeFilters', this.applied_filters);
        },
        removeFilter: function (filter) {
            var current_search_filter = this.current_search.find(x => x.item_id === filter.item_id);
            var index = this.current_search.indexOf(current_search_filter);
            if (index > -1) {
                this.current_search.splice(index, 1);
            }

            index = this.applied_filters[filter.id].indexOf(filter.item.id);
            if (index > -1) {
                this.applied_filters[filter.id].splice(index, 1);
            }

            EventBus.$emit('onChangeFilters', this.applied_filters);
        }
    }
}
</script>

<style lang="sass" scoped>
@import "resources/assets/sass/variables";

.options-title {
    box-shadow: none;
    text-transform: uppercase;
    span {
        font-weight: bold;
    }
    .fa {
        padding-right: 10px;
    }
}
.current-search {
    ul {
        padding: 0;
        list-style: none;
        li {
            display: inline-block;
            padding: 5px 10px;
            background: $blue;
            color: $white;
            margin-bottom: 3px;
            margin-right: 3px;
            button {
                border: none;
                background: none;
            }
        }
    }
}
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
