<template>
    <div>
        <search-bar :show-type-selector="showTypeSelector"></search-bar>
        <div class="row results-filters-wrapper">
            <div class="results-filters-transition" v-bind:class="{ 'init-loading': init_loading }">
                <search-filters :collective="collective"></search-filters>
                <results :collective="collective" :results="results" :number-of-results="numberOfResults" :loading="loading" :is-filtering="is_filtering"></results>
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
            results: [],
            is_filtering: true,
            filters: null,
            search_text: null,
            numberOfResults: null
        }
    },
    created () {
        var that = this;
        EventBus.$on('onChangeFilters', function(filters) {
            this.filters = filters;
            if (_.isEmpty(_.omit(filters, ['__ob__']))) {
                this.filters = {};
            }
            that.fetchResults(this.filters, this.search_text);
        });
        EventBus.$on('onSearch', function(search_text) {
            this.search_text = search_text;
            that.fetchResults(this.filters, this.search_text);
        });
    },
    mounted () {
        this.fetchResults();
    },
    methods: {
        fetchResults(filters, search_text) {
            var resource = studentsResultsResource;
            if (this.collective == 'companies') {
                resource = companiesResultsResource;
            }

            this.loading = true;

            resource.get(filters, search_text).then((response) => {
                this.is_filtering = !_.isEmpty(filters) || !_.isEmpty(search_text);
                this.results = response.body.data;
                this.numberOfResults = response.body.total;
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
