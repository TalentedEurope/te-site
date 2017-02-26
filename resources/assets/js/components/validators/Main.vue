<template>
    <div class="col-sm-12 sm-no-padding-left sm-no-padding-right">
        <h1 class="page-title">Validators</h1>
        <div class="panel panel-default">
            <div v-if="validators.length == 0">
                Mensaje no validators
            </div>
            <table v-if="validators.length > 0" class="table table-striped table-hover table-responsive">
                <thead>
                    <tr>
                        <th><a href="#" v-on:click.prevent="sortBy('full_name')">{{ $t('reg-profile.name') }}</a></th>
                        <th><a href="#" v-on:click.prevent="sortBy('email')">{{ $t('reg-profile.email') }}</th>
                        <th><a href="#" v-on:click.prevent="sortBy('validator_deparment')">{{ $t('reg-profile.validator_department') }}</a></th>
                        <th><a href="#" v-on:click.prevent="sortBy('position')">{{ $t('global.position') }}</a></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="validator in validators | orderBy sort_key reverse">
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
                        <td>
                            <button class="btn btn-danger" v-on:click="onDeleteButton(validator)">
                                <i class="fa fa-toggle-on" aria-hidden="true"></i> Delete
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
import Vue from 'vue';
import { validatorsResource } from '../../resources/validators'
import { defaultErrorToast } from 'errors-handling.js';

export default {
    data() {
        return {
            'validators': [],
            'sort_key': 'full_name',
            'reverse': 1,
        }
    },
    ready() {
        this.fetchValidators();
    },
    methods: {
        sortBy: function(sort_key) {
            this.reverse = (this.sort_key == sort_key) ? -this.reverse : -1;
            this.sort_key = sort_key;
        },
        fetchValidators() {
            validatorsResource.get()
                .then((response) => {
                    this.validators = response.body;
                }, (errorResponse) => {
                    defaultErrorToast();
                });
        },
        toggleValidatorStatus(validator) {
            if (validator.loading) {
                return;
            }
            Vue.set(validator, 'loading', true);

            validatorsResource.put(validator.id)
                .then((response) => {
                    validator.active = !validator.active;
                }, (errorResponse) => {
                    defaultErrorToast();
                })
                .finally(() => {
                    Vue.set(validator, 'loading', false);
                });
        },
        onDeleteButton(validator) {
            var that = this;
            $.confirm({
                title: 'Delete title',
                content: 'Delete content',
                backgroundDismiss: true,
                buttons: {
                    confirm: {
                        text: 'Delete',
                        btnClass: 'btn-danger',
                        keys: ['enter'],
                        action: function() {
                            if (validator.loading) {
                                return false;
                            }
                            Vue.set(validator, 'loading', true);

                            this.setContent('Deleting...')
                            that.deleteValidator(validator, this)

                            return false;
                        }
                    },
                    cancel: function() {
                        return !validator.loading;
                    },
                }
            });
        },
        deleteValidator(validator, jq_confirm) {
            validatorsResource.delete(validator.delete_url)
                .then((response) => {
                    var index = this.validators.indexOf(validator);
                    if (index > -1) {
                        this.validators.splice(index, 1);
                    }
                }, (errorResponse) => {
                    defaultErrorToast();
                })
                .finally(() => {
                    jq_confirm.close();
                    Vue.set(validator, 'loading', false);
                });
        }
    }
};
</script>
