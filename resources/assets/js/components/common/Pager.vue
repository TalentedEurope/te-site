<template>
    <nav>
        <ul class="pager">
            <li>
                <span>
                    {{ current_page }}
                </span>
            </li>
            <li class="previous" v-bind:class="{ 'disabled': current_page == 1 }">
                <a role="button" @click.prevent="goToPreviousPage()">
                    <span aria-hidden="true">&larr;</span> Older
                </a>
            </li>
            <li class="next" v-bind:class="{ 'disabled': current_page == pages }">
                <a role="button" @click.prevent="goToNextPage()">
                    Next <span aria-hidden="true">&rarr;</span>
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
            pages: 0,
            current_page: 0,
            per_page: 0,
            total: 0
        }
    },
    methods: {
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
                this.pages = Math.ceil(this.total / this.per_page);
            }
        }
    }
}
</script>
