<template>
    <div class="col-sm-8 col-md-9">
        <result-info :collective="collective"></result-info>
        <ul class="results">
            <student-profile v-if="collective == 'students'" v-for="student in results" :student="student"></student-profile>
            <company-profile v-if="collective == 'companies'" v-for="company in results" :company="company"></company-profile>
        </ul>
    </div>
</template>

<script>
import EventBus from 'event-bus.js'
import ResultInfo from './ResultInfo.vue'
import StudentProfile from './StudentProfile.vue'
import CompanyProfile from './CompanyProfile.vue'
import { studentsResultsResource, companiesResultsResource } from 'resources/search'

export default {
    props: ['collective'],
    components: {
        'result-info': ResultInfo,
        'student-profile': StudentProfile,
        'company-profile': CompanyProfile,
    },
    data() {
        return {
            results: [],
            filters: null,
            search_text: null
        }
    },
    created () {
        var that = this;
        EventBus.$on('onChangeFilters', function(filters) {
            this.filters = filters;
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
            resource.get(filters, search_text).then((response) => {
                this.results = response.body;
            }, (errorResponse) => {
                console.log(errorResponse);
            });
        }
    },
}
</script>

<style lang="sass" scoped>
.results {
    list-style: none;
    padding: 0;
}
</style>
