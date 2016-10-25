<template>
    <div class="well result-info">
        <span class="h4">We found {{ numberOfResults }} students matching your needs</span>
        <p v-if="collective == 'companies'">
            <label class="h5" for="magic-matching">
                <input type="checkbox" name="magic-matching" id="magic-matching" value="1">
                Search only for companies with matched desired skills <em>(magic matching)</em>
            </label>
        </p>
    </div>
</template>

<script>
export default {
    props: ['collective', 'numberOfResults'],
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
