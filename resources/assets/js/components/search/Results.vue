<template>
    <div class="col-sm-8 col-md-9">
        <result-info></result-info>
        <ul class="results">
            <student-profile v-if="students" v-for="student in students" :student="student"></student-profile>
            <company-profile v-if="companies" v-for="company in companies" :company="company"></company-profile>
        </ul>
    </div>
</template>

<script>
import ResultInfo from './ResultInfo.vue'
import StudentProfile from './StudentProfile.vue'
import CompanyProfile from './CompanyProfile.vue'
import { studentsResultsResource, companiesResultsResource } from '../../helpers/resources'

export default {
    components: {
        'result-info': ResultInfo,
        'student-profile': StudentProfile,
        'company-profile': CompanyProfile,
    },
    data () {
        return {
            students: [],
            companies: []
        }
    },
    mounted () {
        this.fetchResults();
    },
    methods: {
        fetchResults: function () {
            if (TE.companies_page) {
                companiesResultsResource.get().then((response) => {
                    this.companies = response;
                }, (errorResponse) => {
                    console.log(errorResponse);
                });
            } else {
                studentsResultsResource.get().then((response) => {
                    this.students = response;
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
