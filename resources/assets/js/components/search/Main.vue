<template>
    <div>
        <search-bar :show-type-selector="showTypeSelector"></search-bar>
        <div class="row results-filters-wrapper">
            <div class="results-filters-transition" v-bind:class="{ 'init-loading': init_loading }">
                <search-filters :collective="collective"></search-filters>
                <results id="results" :collective="collective" :results="results" :pagination-data="pagination_data" :loading="loading" :is-filtering="is_filtering"></results>
            </div>

            <div class="well init-loading-box" v-if="init_loading">
                Loading...
            </div>
        </div>
    </div>
</template>

<script>
import SearchBar from './SearchBar.vue';
import SearchFilters from './SearchFilters.vue';
import Results from './Results.vue';
import EventBus from 'event-bus.js';
import { studentsResultsResource, companiesResultsResource } from 'resources/search';
import smoothScroll from 'smoothscroll';

export default {
    props: ['collective', 'showTypeSelector'],
    components: {
        'search-bar': SearchBar,
        'search-filters': SearchFilters,
        'results': Results,
    },
    data() {
        return {
            init_loading: true,
            loading: false,
            results_element: null,
            results: [],
            pagination_data: {},
            is_filtering: true,
            current_page: 1,
            filters: {},
            search_text: null
        }
    },
    created () {
        EventBus.$on('onChangePage', (current_page) => {
            this.current_page = current_page;
            this.fetchResults(this.current_page, this.filters, this.search_text);
            if (!this.results_element) {
                this.results_element = document.querySelector('#results')
            }
            smoothScroll(this.results_element);
        });
        EventBus.$on('onChangeFilters', (filters) => {
            this.filters = filters;
            if (_.isEmpty(_.omit(filters, ['__ob__']))) {
                this.filters = {};
            }
            this.fetchResults(1, this.filters, this.search_text);
        });
        EventBus.$on('onSearch', (search_text) => {
            this.search_text = search_text;
            this.fetchResults(1, this.filters, this.search_text);
        });
    },
    ready () {
        this.fetchResults();
    },
    methods: {
        fetchResults(page, filters, search_text) {
            var resource = studentsResultsResource;
            if (this.collective == 'companies') {
                resource = companiesResultsResource;
            }

            this.loading = true;

            resource.get(page, filters, search_text).then((response) => {
                this.is_filtering = !_.isEmpty(filters) || !_.isEmpty(search_text);
                this.results = response.body.data;
                this.pagination_data = response.body;
            }, (errorResponse) => {
                console.log(errorResponse);
            }).finally(() => {
                this.init_loading = false;
                this.loading = false;
            });
        }
    }
}
</script>

<style lang="sass" scoped>
.results-filters-wrapper {
    min-height: 200px;
    position: relative;
    .results-filters-transition {
        opacity: 1;
        transition: 0.6s ease;
        &.init-loading {
            opacity: 0;
        }
    }

    .init-loading-box {
        position: absolute;
        width: 100%;
        text-align: center;
        padding: 70px;
    }
}
</style>
