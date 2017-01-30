<template>
<div>
    <div class="panel panel-default col-sm-12">
        <div v-if="validators.length == 0">
            Mensaje no validators
        </div>
        <table v-if="validators.length > 0" class="table table-striped table-hover table-responsive">
            <thead>
                <tr>
                    <th>{{ $t('reg-profile.name') }}</th>
                    <th>{{ $t('reg-profile.email') }}</th>
                    <th>{{ $t('reg-profile.validator_department') }}</th>
                    <th>{{ $t('global.position') }}</th>
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
import { validatorsResource } from '../../resources/validators'
import { defaultErrorToast } from 'errors-handling.js';

export default {
    components: {
        'new-validator': NewValidator
    },
    data() {
        return {
            'validators': []
        }
    },
    ready() {
        this.fetchValidators();
    },
    methods: {
        fetchValidators() {
            validatorsResource.get()
                .then((response) => {
                    this.validators = response.body;
                }, (errorResponse) => {
                    defaultErrorToast();
                });
        },
        toggleValidatorStatus(validator) {
            validatorsResource.put(validator.id)
                .then((response) => {
                    validator.active = !validator.active;
                }, (errorResponse) => {
                    defaultErrorToast();
                });
        }
    }
};
</script>
