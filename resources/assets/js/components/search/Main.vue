<template>
    <div>
        <search-bar :show-type-selector="showTypeSelector"></search-bar>
        <div class="row">
            <search-filters :collective="collective"></search-filters>
            <results :collective="collective"></results>
        </div>
    </div>
</template>

<script>
import SearchBar from './SearchBar.vue'
import SearchFilters from './SearchFilters.vue'
import Results from './Results.vue'

export default {
    props: ['collective', 'showTypeSelector'],
    components: {
        'search-bar': SearchBar,
        'search-filters': SearchFilters,
        'results': Results,
    }
}
</script>
