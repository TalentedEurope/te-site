<template>
    <div>
        <search-bar :search-text="search_text"></search-bar>
        <div class="row results-filters-wrapper">
            <div class="results-filters-transition" v-bind:class="{ 'init-loading': init_loading }">
                <search-filters class="sm-no-padding-left" :collective="collective"></search-filters>
                <results id="results" class="sm-no-padding-right" :collective="collective" :results="results" :pagination-data="pagination_data" :loading="loading" :is-filtering="is_filtering"></results>
            </div>

            <div class="well init-loading-box" v-if="init_loading">
                {{ $t('search.loading') }}...
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
import { getUrlParameter } from 'helpers/manage-urls.js';
import { defaultErrorToast } from 'errors-handling.js';
import smoothScroll from 'smoothscroll';

export default {
    props: ['collective'],
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
            search_text: null,
            remaining_alerts: null
        }
    },
    created () {
        EventBus.$on('onChangePage', (current_page) => {
            this.current_page = current_page;
            this.fetchResults(true);
            this.scrollToUp();
        });
        EventBus.$on('onChangeFilters', (filters) => {
            this.current_page = 1;
            this.filters = filters;
            if (_.isEmpty(_.omit(filters, ['__ob__']))) {
                this.filters = {};
            }
            this.fetchResults(true);
        });
        EventBus.$on('onSearch', (search_text) => {
            this.current_page = 1;
            this.search_text = _.trim(search_text);
            this.fetchResults(true);
        });

        EventBus.$on('onAlert', () => {
            this.remaining_alerts -= 1;
            if (this.remaining_alerts == 0) {
                this.$broadcast('disableAlerts');
            }
        });

    },
    ready () {
        this.search_text = getUrlParameter('search');
        this.current_page = getUrlParameter('page') || 1;

        history.replaceState(this.getStateData(), null);

        this.fetchResults();

        var that = this;
        window.addEventListener('popstate', function (e) {
            that.search_text = e.state.search_text;
            that.current_page = e.state.current_page;
            that.fetchResults();
            that.scrollToUp();
        });
    },
    methods: {
        getStateData: function () {
            return {
                'search_text': this.search_text,
                'current_page': this.current_page
            };
        },
        setHistory: function () {
            var url = '';
            var connector = '?';
            if (this.search_text != null && this.search_text != '') {
                url = `${url}${connector}search=${this.search_text}`;
                connector = '&';
            }
            if (this.current_page > 1) {
                url = `${url}${connector}page=${this.current_page}`;
                connector = '&';
            }
            history.pushState(this.getStateData(), null, url || '?');
        },
        fetchResults(set_history) {
            if (set_history) {
                this.setHistory();
            }

            this.loading = true;

            var resource = this.collective == 'companies' ? companiesResultsResource : studentsResultsResource;

            resource.get(this.current_page, this.filters, this.search_text).then((response) => {
                this.is_filtering = !_.isEmpty(this.filters) || !_.isEmpty(this.search_text);
                this.results = response.body.data;
                this.pagination_data = response.body;
                this.remaining_alerts = response.body.remaining_alerts;
            }, (errorResponse) => {
                defaultErrorToast();
            }).finally(() => {
                this.init_loading = false;
                this.loading = false;
            });
        },
        scrollToUp: function () {
            if (!this.results_element) {
                this.results_element = document.querySelector('#results');
            }
            if ($(window).scrollTop() > $(this.results_element).offset().top) {
                smoothScroll(this.results_element);
            }
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
