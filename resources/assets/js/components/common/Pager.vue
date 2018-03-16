<template>
    <nav>
        <ul class="pager pager-main">
            <li v-if="page_links.indexOf(1) == -1">
                <span>
                    ...
                </span>
            </li>

            <li v-for="page in page_links">
                <a v-if="page != current_page" role="button" @click.prevent="goToPage(page)">
                    <span aria-hidden="true">
                        {{ page }}
                    </span>
                </a>

                <span v-if="page == current_page" aria-hidden="true">
                    {{ page }}
                </span>
            </li>

            <li v-if="page_links.indexOf(number_of_pages) == -1">
                 <span>
                     ...
                 </span>
             </li>

            <li class="previous" v-bind:class="{ 'disabled': current_page == 1 }">
                <a role="button" @click.prevent="goToPreviousPage()">
                    <span aria-hidden="true">&larr;</span> {{ $t('global.older') }}
                </a>
            </li>
            <li class="next" v-bind:class="{ 'disabled': current_page == number_of_pages }">
                <a role="button" @click.prevent="goToNextPage()">
                    {{ $t('global.next') }} <span aria-hidden="true">&rarr;</span>
                </a>
            </li>
        </ul>

        <ul class="pager pager-small-screen">
            <li v-bind:class="{ 'disabled': current_page == 1 }">
                <a role="button" @click.prevent="goToPreviousPage()">
                    <span aria-hidden="true">&larr;</span> {{ $t('global.older') }}
                </a>
            </li>
            <li v-bind:class="{ 'disabled': current_page == number_of_pages }">
                <a role="button" @click.prevent="goToNextPage()">
                    {{ $t('global.next') }} <span aria-hidden="true">&rarr;</span>
                </a>
            </li>
        </ul>
    </nav>
</template>

<script>
import EventBus from 'event-bus.js';

export default {
    props: ['paginationData'],
    data() {
        return {
            number_of_pages: 0,
            number_of_visible_pages: 5,
            current_page: 0,
            per_page: 0,
            total: 0,
            page_links: []
        }
    },
    methods: {
        goToPage: function(page) {
            this.current_page = page;
            EventBus.$emit('onChangePage', this.current_page);
        },

        goToPreviousPage: function () {
            if (this.current_page == 1) {
                return;
            }
            this.current_page = this.current_page - 1;
            EventBus.$emit('onChangePage', this.current_page);
        },
        goToNextPage: function () {
            if (this.current_page == this.number_of_pages) {
                return;
            }
            this.current_page = this.current_page + 1;
            EventBus.$emit('onChangePage', this.current_page);
        },
        _addPages: function (start, end) {
            start = start >= 1 ? start : 1;
            end = end <= this.number_of_pages ? end : this.number_of_pages;
            for (var i = start; i <= end;  i++) {
                this.page_links.push(i);
            }
        }
    },
    watch: {
        paginationData: function (data) {
            this.current_page = data.current_page;
            this.total = data.total;
            this.per_page = data.per_page;

            if (this.total && this.per_page) {
                this.page_links = [];
                this.number_of_pages = Math.ceil(this.total / this.per_page);

                var side_pages = (this.number_of_visible_pages - 1) / 2;

                if (this.current_page - side_pages < 1) {
                    this._addPages(1, this.number_of_visible_pages);
                } else if (this.current_page + side_pages > this.number_of_pages) {
                    this._addPages(
                        this.number_of_pages - (this.number_of_visible_pages - 1),
                        this.number_of_pages
                    );
                } else {
                    this._addPages(this.current_page - side_pages, this.current_page + side_pages);
                }
            }
        }
    }
}
</script>

<style lang="sass" scoped>
@import "resources/assets/sass/variables";
.pager-main {
    .previous, .next {
        display: none;
    }
}

@media (min-width: 992px) {
    .pager-main {
        .previous, .next {
            display: inline;
        }
    }

    .pager-small-screen {
        display: none;
    }
}
</style>
