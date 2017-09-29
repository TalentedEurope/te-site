<template>
    <nav>
        <ul class="pager">
            <li v-for="page in page_links">
                <a role="button" @click.prevent="goToPage(page)">
                    <span aria-hidden="true">
                        {{ page }}
                    </span>
                </a>
            </li>

           <li v-if="current_page != pages && current_page + 1 != pages">
                <span>
                    ...
                </span>
            </li>

           <li>
                <a role="button" @click.prevent="goToPage(pages)">
                    <span aria-hidden="true">
                        {{ pages }}
                    </span>
                </a>
            </li>

            <li class="previous" v-bind:class="{ 'disabled': current_page == 1 }">
                <a role="button" @click.prevent="goToPreviousPage()">
                    <span aria-hidden="true">&larr;</span> {{ $t('global.older') }}
                </a>
            </li>
            <li class="next" v-bind:class="{ 'disabled': current_page == pages }">
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
            view_total_pages: 4,
            pages: 0,
            current_page: 0,
            max_next_page: 0,
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
            if (this.current_page == this.pages) {
                return;
            }
            this.current_page = this.current_page + 1;
            EventBus.$emit('onChangePage', this.current_page);
        },
    },
    watch: {
        paginationData: function (data) {
            this.current_page = data.current_page;
            this.total = data.total;
            this.per_page = data.per_page;
            if (this.total && this.per_page) {
                this.page_links = [];
                if (this.current_page > 1) {
                    this.page_links.push(this.current_page - 1);
                }
                this.pages = Math.ceil(this.total / this.per_page);
                for (var i = this.current_page; i < this.pages;  i++) { 
                    this.page_links.push(i);
                }
            }
        }
    }
}
</script>
