<template>
    <div class="row">
        <div class="col-sm-12 search-bar">
            <div class="form-group col-sm-10">
                <input type="text" class="form-control" :placeholder="$t('landing.search_placeholder')" v-model="searchText" @keyup.enter="search()">
            </div>
            <div class="form-group col-sm-2">
                <button type="submit" class="btn btn-primary" @click.prevent="search()">
                    <i class="fa fa-search" aria-hidden="true"></i> {{ $t('landing.search_btn') }}
                </button>
            </div>
        </div>
    </div>
</template>

<script>
import EventBus from 'event-bus.js';

export default {
    props: ['searchText'],
    methods: {
        search: function () {
            EventBus.$emit('onSearch', this.searchText);
        }
    }
}
</script>
