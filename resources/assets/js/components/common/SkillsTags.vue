<template>
<ul class="skills">
    <li v-for="skill in skills" :class="{'important': isCompany || skill.important}">{{skill.name}}</li>
</ul>
</template>

<script>
export default {
    props: ['skills', 'isCompany'],
}
</script>

<style lang="sass" scoped>
@import "resources/assets/sass/variables";
.skills {
    padding: 0;
    li {
        display: inline-block;
        padding: 5px 20px;
        background: $light-gray;
        margin-right: 5px;
    }
    li.important {
        background: $dark-blue;
        color: $white;
    }
}
</style>
