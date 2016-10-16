<template>
    <div class="col-sm-8 col-md-9">
        <result-info :collective="collective"></result-info>
        <ul class="results">
            <student-profile v-if="students" v-for="student in students" :student="student"></student-profile>
            <company-profile v-if="companies" v-for="company in companies" :company="company"></company-profile>
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
            students: [],
            companies: []
        }
    },
    created () {
        var that = this;
        EventBus.$on('onChangeFilters', function(filters) {
            that.fetchResults(filters);
        });

    },
    mounted () {
        this.fetchResults();
    },
    methods: {
        fetchResults(filters) {
            if (this.collective == 'company') {
                companiesResultsResource.get(filters).then((response) => {
                    this.companies = response.body;
                }, (errorResponse) => {
                    console.log(errorResponse);
                });
            } else {
                studentsResultsResource.get(filters).then((response) => {
                    this.students = response.body;
                }, (errorResponse) => {
                    console.log(errorResponse);
                });
            }
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
