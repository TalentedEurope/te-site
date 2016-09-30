<template>
<div>
    <div class="panel panel-default col-sm-12">
        <div v-if="validators.length == 0">
            Mensaje no validators
        </div>
        <table v-if="validators.length > 0" class="table table-striped table-hover table-responsive">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Department</th>
                    <th>Position</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="validator in validators">
                    <td>{{validator.full_name}}</td>
                    <td>{{validator.email}}</td>
                    <td>{{validator.department}}</td>
                    <td>{{validator.position}}</td>
                    <td>
                        <button v-if="!validator.active" class="btn btn-primary" v-on:click="toggleValidatorStatus(validator)">
                            <i class="fa fa-toggle-on" aria-hidden="true"></i> Enable
                        </button>
                        <button v-if="validator.active" class="btn btn-warning" v-on:click="toggleValidatorStatus(validator)">
                            <i class="fa fa-toggle-off" aria-hidden="true"></i> Disable
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <new-validator></new-validator>

</div>
</template>

<script>
import NewValidator from './NewValidator.vue'
import { validatorsResource } from '../../helpers/resources'

export default {
    components: {
        'new-validator': NewValidator
    },
    data() {
        return {
            'validators': []
        }
    },
    mounted() {
        this.fetchValidators();
    },
    methods: {
        fetchValidators() {
            validatorsResource.get()
                .then((response) => {
                    this.validators = response;
                }, (errorResponse) => {
                    console.log(errorResponse);
                });
        },
        toggleValidatorStatus(validator) {
            if (validator.active) {
                // TODO: Call api
                validator.active = false;
            } else {
                // TODO: Call api
                validator.active = true;
            }
        }
    }
};
</script>
