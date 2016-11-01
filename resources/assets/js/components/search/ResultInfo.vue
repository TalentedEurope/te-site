<template>
    <div class="well result-info">
        <span class="h4">{{infoMessage}}</span>

        <!-- <p v-if="collective == 'companies'">
            <label class="h5" for="magic-matching">
                <input type="checkbox" name="magic-matching" id="magic-matching" value="1">
                Search only for companies with matched desired skills <em>(magic matching)</em>
            </label>
        </p> -->
    </div>
</template>

<script>
export default {
    props: ['collective', 'numberOfResults', 'isFiltering'],
    methods: {
        getCollective: function () {
            if (this.numberOfResults > 1) {
                return this.collective;
            }
            return this.collective == 'companies' ? 'company' : 'student';
        }
    },
    computed: {
        infoMessage: function () {
            if (this.numberOfResults == 0) {
                return `There are no ${this.collective} matching the selected filters at the moment`;
            }
            var collective = this.getCollective();
            if (this.isFiltering) {
                return `We found ${this.numberOfResults} ${collective} matching your needs`;
            }
            return `There exists ${this.numberOfResults} ${collective} in the database`;
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
