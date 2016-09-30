<template>
    <div class="well profile-header">
        <h2 class="title">{{title}}</h2>
        <p class="subtitle">{{subtitle}}</p>
    </div>
</template>

<script>
export default {
    props: ['title', 'subtitle']
}
</script>

<style lang="sass" scoped>
@import "resources/assets/sass/variables";
.profile-header {
    background: $dark-blue;
    color: $white;

    h2.title {
        font-weight: bold;
        margin: 0;
    }

    .subtitle {
        margin: 0;
        font-size: 24px;
        font-style: italic;
        color: $yellow;
    }
}
</style>
