<template>
    <div class="panel panel-default col-sm-12">
        <div v-if="nudges.length == 0">
            Mensaje no Nudges
        </div>
        <table v-if="nudges.length > 0" class="table table-striped table-hover table-responsive">
            <thead>
                <tr>
                    <th>Student</th>
                    <th>Country</th>
                    <th>Study Level</th>
                    <th>When nudged</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="nudge in orderedNudges">
                    <td>
                        <a href="">{{nudge.student}}</a>
                    </td>
                    <td>{{nudge.country}}</td>
                    <td>{{nudge.study_level}}</td>
                    <td>{{nudge.when_nudged_relative}}</td>
                    <td>
                        <button v-on:click="removeNudge(nudge)" class="btn btn-primary" title="Remove nudge">
                            <i class="fa fa-trash-o" aria-hidden="true"></i>
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
import { nudgesResource } from '../../resources/nudges';

export default {
    data() {
        return {
            nudges: []
        }
    },
    mounted() {
        this.fetchNudges();
    },
    methods: {
        fetchNudges() {
            nudgesResource.get()
                .then((response) => {
                    this.nudges = response.body;
                }, (errorResponse) => {
                    console.log(errorResponse);
                });
        },
        removeNudge(nudge) {
            var index = this.nudges.indexOf(nudge);
            this.nudges.splice(index, 1);
        }
    },
    computed: {
        orderedNudges() {
            return _.orderBy(this.nudges, [function (nudge) { return new Date(nudge.when_nudged); }]);
        }
    }
}
</script>
