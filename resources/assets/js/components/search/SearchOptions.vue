<template>
    <div class="col-sm-4 col-md-3 search-options">
        <div class="options-title">
            <span class="h3"><i class="fa fa-filter" aria-hidden="true"></i>Filters</span>
        </div>
        <div class="current-search">
            <h3>Current Search</h3>
            <ul>
                <li v-for="item in current_search">
                    {{item.name}} <button class="remove-item"><i class="fa fa-close" aria-hidden="true"></i></button>
                </li>
          </ul>
        </div>
        <multi-options-filter v-for="filter in filters" :items="filter.items" :prefix="filter.code" :title="filter.title"></multi-options-filter>

    </div>
</template>

<script>
import MultiOptionsFilter from './MultiOptionsFilter.vue'
import { companiesFiltersResource, studentsFiltersResource } from '../../resources/search'

export default {
    props: ['collective'],
    components: {
        'multi-options-filter': MultiOptionsFilter,
    },
    data () {
        return {
            current_search: [
                {code: '1', name: 'Item 1'},
                {code: '2', name: 'Item 2'},
                {code: '3', name: 'Item 3'},
            ],
            filters: []
        }
    },
    mounted () {
        this.fetchFilters();
    },
    methods: {
        fetchFilters: function () {
            var errorCallback = (errorResponse) => {
                console.log(errorResponse);
            }

            if (this.collective == 'company') {
                companiesFiltersResource.get().then((response) => {
                    this.filters = response.body;
                }, errorCallback);
            } else {
                studentsFiltersResource.get().then((response) => {
                    this.filters = response.body;
                }, errorCallback);
            }
        }
    },
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
