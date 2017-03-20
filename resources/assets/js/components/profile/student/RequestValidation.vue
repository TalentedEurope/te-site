<template>
    <div class="row">
        <h4 class="col-sm-12">Find your Academic Institution</h4>

        <select-form class="col-sm-6" code="country" :label="$t('reg-profile.country')" :placeholder="' - ' + $t('reg-profile.country') + ' - '" required :values="countries" :value="country" no-validate>
        </select-form>

        <autocomplete class="col-sm-6" code="institution" :items="institutions" placeholder="Institution name"  :disabled="isInstitutionsDisabled" required>
        </autocomplete>

        <div class="form-group col-sm-12">
            <label for="referee">Choose referee</label>
            <select-form code="referee" label="Referee" placeholder=" - Any Referee - " :parsed-values="referees" :disabled="isRefereesDisabled" no-validate>
            </select-form>
        </div>
        <hr>
        <p class="col-sm-12 text-right">
            <button type="submit" class="btn btn-primary">Refer request</button>
        </p>
    </div>
</template>

<script>
import SelectForm from '../common/SelectForm.vue';
import TextBoxForm from '../common/TextBoxForm.vue';
import Autocomplete from './common/Autocomplete.vue';
import { institutionResource, refereeResource } from 'resources/profile';
import { defaultErrorToast } from 'errors-handling.js';
import EventBus from 'event-bus.js';

export default {
    props: ['countries'],
    components: { TextBoxForm, SelectForm, Autocomplete },
    data() {
        return {
            'institutions': [],
            'referees': {}
        };
    },
    ready() {
        EventBus.$on('onSelectChange-country', (country_key) => {
            this.institutions = [];
            if (!country_key == '') {
                institutionResource.get(country_key)
                    .then((response) => {
                        this.institutions = response.body;
                    }, (errorResponse) => {
                        defaultErrorToast();
                    })
            }
        });
        EventBus.$on('onAutocompleteChange-institution', (institution) => {
            this.referees = {};
            if (!_.isNull(institution)) {
                refereeResource.get(institution.id)
                    .then((response) => {
                        var _referees_obj = {};
                        response.body.forEach(function(value_obj) {
                           _referees_obj[value_obj["id"]] = `${value_obj["name"]} (${value_obj["department"]}, ${value_obj["position"]})`;
                        });
                        this.referees = _referees_obj;
                    }, (errorResponse) => {
                        defaultErrorToast();
                    })
            }
        });
    },
    computed: {
        isInstitutionsDisabled() {
            return this.institutions.length == 0;
        },
        isRefereesDisabled() {
            return _.isEmpty(this.referees);
        }
    }
};
</script>

<style lang="sass" scoped>
</style>
