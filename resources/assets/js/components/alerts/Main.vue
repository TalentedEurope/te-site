<template>
    <div class="well col-sm-12" id="alerts">
        <div v-if="!loading && alerts.length == 0">
            No alerts found
        </div>
        <table v-if="!loading && alerts.length > 0" class="table table-striped table-hover table-responsive">
            <thead>
                <tr>
                    <th>Student</th>
                    <th>Country</th>
                    <th>Study Level</th>
                    <th>When it was sent?</th>
                    <!-- <th></th> -->
                </tr>
            </thead>
            <tbody>
                <tr v-for="alert in orderedAlerts">
                    <td>
                        <a :href="getStudentUrl(alert)">{{alert.student}}</a>
                    </td>
                    <td>{{alert.country}}</td>
                    <td>{{alert.study_level}}</td>
                    <td>{{alert.when_alert_relative}}</td>
                    <!-- <td>
                        <button v-on:click="removeAlert(alert)" class="btn btn-primary" title="Remove alert">
                            <i class="fa fa-trash-o" aria-hidden="true"></i>
                        </button>
                    </td> -->
                </tr>
            </tbody>
        </table>

        <pager v-show="!loading && alerts.length > 0" :pagination-data="pagination_data"></pager>
    </div>
</template>

<script>
import Pager from '../common/Pager.vue';
import EventBus from 'event-bus.js';
import { alertsResource } from '../../resources/alerts';
import smoothScroll from 'smoothscroll';

export default {
    components: { Pager },
    data() {
        return {
            loading: true,
            alerts: [],
            pagination_data: {},
            current_page: 1,
        }
    },
    ready() {
        this.fetchAlerts(this.current_page);

        EventBus.$on('onChangePage', (current_page) => {
            this.current_page = current_page;
            this.fetchAlerts(this.current_page);
            if (!this.results_element) {
                this.results_element = document.querySelector('#alerts')
            }
            smoothScroll(this.results_element);
        });
    },
    methods: {
        fetchAlerts(page) {
            alertsResource.get(page)
                .then((response) => {
                    this.alerts = response.body.data;
                    this.pagination_data = response.body;
                }, (errorResponse) => {
                    console.log(errorResponse);
                })
                .finally(() => {
                    this.loading = false;
                });
        },
        removeAlert(alert) {
            var index = this.alerts.indexOf(alert);
            this.alerts.splice(index, 1);
        },
        getStudentUrl(alert) {
            return `/profile/${alert.slug}/${alert.user_id}`;
        }
    },
    computed: {
        orderedAlerts() {
            return _.orderBy(this.alerts, [function (alert) { return new Date(alert.when_alert); }]);
        }
    }
}
</script>
