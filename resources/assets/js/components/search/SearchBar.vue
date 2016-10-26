<template>
    <div class="row">
        <div class="col-sm-12 well search-bar">
            <div class="form-group col-sm-3" v-if="showTypeSelector">
                <div class="select-holder">
                    <select class="form-control" id="country" name="country">
                        <option value="" selected="">Search for:</option>
                        <option value="students">Students</option>
                        <option value="companies">Companies</option>
                    </select>
                </div>
            </div>
            <div class="form-group col-sm-7" v-bind:class="{ 'col-sm-10': !showTypeSelector }">
                <input type="text" class="form-control" id="name" name="name" placeholder="What are you looking for?" v-model="search_text" @keyup.enter="search()">
            </div>
            <div class="form-group col-sm-2">
                <button type="submit" class="btn btn-primary" @click.prevent="search()">
                    <i class="fa fa-search" aria-hidden="true"></i> Search
                </button>
            </div>
        </div>
    </div>
</template>

<script>
import EventBus from 'event-bus.js';

export default {
    props: ['showTypeSelector'],
    data () {
        return {
            search_text: ''
        }
    },
    methods: {
        search: function() {
            this.search_text = _.trim(this.search_text);
            EventBus.$emit('onSearch', this.search_text);
        }
    }
}
</script>

<style lang="sass" scoped>
@import "resources/assets/sass/variables";
.search-bar {
    background: $blue;
    input {
        background: $white;
    }
    .select-holder {
        background: $white;
    }
    .btn-primary {
        width: 100%;
        background: $yellow;
        text-transform: uppercase;
        font-weight: bold;
        padding: 15px;
        font-size: 15px;
        border: none;
        .fa {
            padding-right: 5px;
        }
    }
    .form-group {
        margin-bottom: 0;
    }
}
</style>
