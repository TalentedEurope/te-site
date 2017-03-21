<template>
    <div class="col-sm-12 sm-no-padding-left sm-no-padding-right">
        <div class="panel panel-default">
            <div class="default-message" v-if="validators.length == 0">
                No referees
            </div>
            <table v-if="validators.length > 0" class="table table-striped table-hover table-responsive">
                <thead>
                    <tr>
                        <th><a href="#" v-on:click.prevent="sortBy('full_name')">{{ $t('reg-profile.name') }}</a></th>
                        <th><a href="#" v-on:click.prevent="sortBy('email')">{{ $t('reg-profile.email') }}</th>
                        <th><a href="#" v-on:click.prevent="sortBy('validator_deparment')">{{ $t('reg-profile.validator_department') }}</a></th>
                        <th><a href="#" v-on:click.prevent="sortBy('position')">{{ $t('reg-profile.position') }}</a></th>
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
                                <i class="fa fa-toggle-on" aria-hidden="true"></i> {{ $t('validators.enable') }}
                            </button>
                            <button v-if="validator.active" class="btn btn-warning" v-on:click="toggleValidatorStatus(validator)">
                                <i class="fa fa-toggle-off" aria-hidden="true"></i> {{ $t('validators.disable') }}
                            </button>
                        </td>
                        <td>
                            <button class="btn btn-danger" v-on:click="onRemoveButton(validator)">
                                <i class="fa fa-toggle-on" aria-hidden="true"></i> {{ $t('reg-profile.remove_btn') }}
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
        onRemoveButton(validator) {
            var validator_info = validator.full_name.trim() != '' ? validator.full_name.trim() : validator.email;
            var that = this;
            $.confirm({
                title: 'Remove referee',
                content: `Do you want to remove ${validator_info} from your institution?`,
                backgroundDismiss: true,
                buttons: {
                    confirm: {
                        text: 'Remove',
                        btnClass: 'btn-danger',
                        keys: ['enter'],
                        action: function() {
                            if (validator.loading) {
                                return false;
                            }
                            Vue.set(validator, 'loading', true);

                            this.setContent('Removing...')
                            that.removeValidator(validator, this)

                            return false;
                        }
                    },
                    cancel: function() {
                        return !validator.loading;
                    },
                }
            });
        },
        removeValidator(validator, jq_confirm) {
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
