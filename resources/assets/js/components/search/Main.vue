<template>
    <form class="form-vertical" role="form" method="POST" action="http://te-site.dev/search">
        <search-bar></search-bar>
        <div class="row">
            <search-options :collective="collective"></search-options>
            <results :collective="collective"></results>
        </div>
    </form>
</template>

<script>
import SearchBar from './SearchBar.vue'
import SearchOptions from './SearchOptions.vue'
import Results from './Results.vue'

export default {
    props: ['collective'],
    components: {
        'search-bar': SearchBar,
        'search-options': SearchOptions,
        'results': Results,
    }
}
</script>
