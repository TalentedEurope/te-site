<template>
    <div class="well result-info">
        <span class="h4">{{infoMessage}}</span>
    </div>
</template>

<script>
export default {
    props: ['collective', 'numberOfResults', 'isFiltering'],
    methods: {
        getCollective: function () {
            return this.collective == 'companies' ? this.$tc('global.company', this.numberOfResults) : this.$tc('global.student', this.numberOfResults);
        }
    },
    computed: {
        infoMessage: function () {
            var collective = this.getCollective().toLowerCase();
            if (this.isFiltering) {
                if (this.numberOfResults == 0) {
                    return this.$t('search.there_are_no_matching_the_selected_filters').replace('%s', collective);
                } else {
                    return this.$t('search.we_found_matching_your_needs').replace('%number%', this.numberOfResults).replace('%collective%', collective);
                }
            }
            return `${this.$t('search.we_found')} ${this.numberOfResults} ${collective}`;
        }
    }
}
</script>

<style lang="sass" scoped>
@import "resources/assets/sass/variables";
.result-info {
    background: $dark-blue;
    color: white;

    p {
        margin-bottom: 0;
    }
}
</style>
