<template>
    <div class="well result-info">
        <span class="h4">We found 30 students matching your needs</span>
        {{companies_page}}
        <p v-if="companies_page">
            <label class="h5" for="magic-matching">
                <input type="checkbox" name="magic-matching" id="magic-matching" value="1">
                Search only for companies with matched desired skills <em>(magic matching)</em>
            </label>
        </p>
    </div>
</template>

<script>
export default {
    data () {
        return {
            companies_page: TE.companies_page
        }
    }
}
</script>

<style lang="sass" scoped>
@import "resources/assets/sass/variables";
.result-info {
    background: $dark-blue;
    color: white;
}
</style>
