<template>
    <div class="col-sm-8 col-md-9">
        <result-info :collective="collective" :number-of-results="paginationData.total" :is-filtering="isFiltering"></result-info>

        <ul class="results" v-bind:class="{ 'loading': loading }">
            <div v-if="collective == 'students'">
                <student-profile v-for="student in results" :student="student"></student-profile>
            </div>
            <div v-if="collective == 'companies'">
                <company-profile v-for="company in results" :company="company"></company-profile>
            </div>
        </ul>

        <pager v-show="!loading && results.length > 0" :pagination-data="paginationData"></pager>
    </div>
</template>

<script>
import ResultInfo from './ResultInfo.vue';
import StudentProfile from './StudentProfile.vue';
import CompanyProfile from './CompanyProfile.vue';
import Pager from '../common/Pager.vue';

export default {
    props: ['collective', 'results', 'paginationData', 'loading', 'isFiltering'],
    components: {
        'result-info': ResultInfo,
        'student-profile': StudentProfile,
        'company-profile': CompanyProfile,
        'pager': Pager,
    },
}
</script>

<style lang="sass" scoped>
.results {
    list-style: none;
    padding: 0;

    &.loading {
        opacity: 0.6;
        pointer-events: none;
    }
}
</style>
