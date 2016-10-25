<template>
    <div class="col-sm-8 col-md-9">
        <result-info :collective="collective" :number-of-results="numberOfResults"></result-info>
        <ul class="results">
            <student-profile v-if="collective == 'students'" v-for="student in results" :student="student"></student-profile>
            <company-profile v-if="collective == 'companies'" v-for="company in results" :company="company"></company-profile>
        </ul>
    </div>
</template>

<script>
import ResultInfo from './ResultInfo.vue'
import StudentProfile from './StudentProfile.vue'
import CompanyProfile from './CompanyProfile.vue'

export default {
    props: ['collective', 'results', 'numberOfResults'],
    components: {
        'result-info': ResultInfo,
        'student-profile': StudentProfile,
        'company-profile': CompanyProfile,
    },
}
</script>

<style lang="sass" scoped>
.results {
    list-style: none;
    padding: 0;
}
</style>
