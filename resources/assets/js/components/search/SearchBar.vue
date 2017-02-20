<template>
    <div class="row" v-if="!transition" transition="opacity">
        <div class="col-sm-12 search-bar">
            <div class="form-group col-sm-3" v-if="showTypeSelector">
                <div class="select-holder">
                    <select class="form-control" id="country" name="country" v-model="user_type">
                        <option value="" selected="">{{ $t('global.search_info') }}:</option>
                        <option value="students">{{ $tc('global.student', 2) }}</option>
                        <option value="companies">{{ $tc('global.company', 2) }}</option>
                    </select>
                </div>
            </div>
            <div class="form-group col-sm-7" v-bind:class="{ 'col-sm-10': !showTypeSelector }">
                <input type="text" class="form-control" id="name" name="name" :placeholder="$t('landing.search_placeholder')" v-model="search_text" @keyup.enter="onSearchButton()">
            </div>
            <div class="form-group col-sm-2">
                <button type="submit" class="btn btn-primary" @click.prevent="onSearchButton()">
                    <i class="fa fa-search" aria-hidden="true"></i> {{ $t('landing.search_btn') }}
                </button>
            </div>
        </div>
    </div>
</template>

<script>
import EventBus from 'event-bus.js';
import { getUrlParameter } from 'helpers/manage-urls.js';

export default {
    props: ['showTypeSelector', 'landing', 'transition'],
    data () {
        return {
            search_text: '',
            user_type: ''
        }
    },
    ready () {
        this.transition = false;

        if (!this.landing) {
            this.search_text = getUrlParameter('search');

            this.cleanSearchText();
            history.replaceState(this.search_text, '');
            this.emitSearch();

            var that = this;
            window.addEventListener('popstate', function (e) {
                that.search_text = e.state;
                that.emitSearch();
            });
        }
    },
    methods: {
        cleanSearchText: function () {
            this.search_text = _.trim(this.search_text);
        },
        onSearchButton: function () {
            this.cleanSearchText();

            if (this.landing) {
                var user_type = this.user_type ? this.user_type : 'students';
                location.href = `/search/${user_type}/?search=${this.search_text}`;
            } else {
                history.pushState(this.search_text, null, `?search=${this.search_text}`);
                this.emitSearch();
            }
        },
        emitSearch: function () {
            EventBus.$emit('onSearch', this.search_text);
        }
    }
}
</script>

<style lang="sass" scoped>
@import "resources/assets/sass/variables";
.opacity-transition {
    opacity: 1;
    transition: 0.5s;
}
.opacity-enter {
    opacity: 0;
    transition: 0.5s;
}

.search-bar {
    background: $blue;
    padding: 19px 4px;
    margin-bottom: 20px;

    input, select, .btn-primary {
        border-radius: 0;
        -webkit-appearance: none;
    }

    input {
        background: $white;
        padding: 15px;
        height: auto;
    }
    select {
        height: 52px;
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
