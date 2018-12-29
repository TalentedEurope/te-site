<template>
    <div>
        <input type="hidden" name="remove_offers[]" v-for="remove_offer in remove_offers" :value="remove_offer"/>

        <div class="offer" v-for="(index, offer) in parsed_offers">
            <header class="clearfix">
                <h4 class="pull-left">{{ $tc('reg-profile.offer', 1) }} #{{ index + 1 }}</h4>
                <remove-item-button v-if="!showClearButton" :items="parsed_offers" :item="offer" group-name="Offer"></remove-item-button>
                <button class="pull-right remove btn-warning btn btn-sm" v-if="showClearButton" @click.prevent="clearForm()" >
                    <i class="fa fa-close" aria-hidden="true"></i> {{ $t('reg-profile.clear_btn') }}
                </button>
            </header>

            <text-box-form type="hidden" code="id" group-code="offers" :group-id="offer.id" :value="offer.id"></text-box-form>

            <text-box-form code="title" group-code="offers" :group-id="offer.id" :label="$t('reg-profile.offer_title')"
                required :placeholder="$t('reg-profile.offer_title')" :value="offer.title" :errors="errors"></text-box-form>

            <text-area-form code="description" group-code="offers" :group-id="offer.id" :label="$t('reg-profile.offer_description')"
                :placeholder="$t('reg-profile.offer_describe_description')" required :value="offer.description" :errors="errors"></text-area-form>        
            <hr>
        </div>

        <div class="offer" v-for="(index, offer) in new_offers">            
            <header class="clearfix">
                <h4 class="pull-left">{{ $tc('reg-profile.offer', 1) }} #{{ (parsed_offers.length + index + 1) }}</h4>
                <remove-item-button v-if="!showClearButton" :items="new_offers" :item="offer" ></remove-item-button>
                <button class="pull-right remove btn-warning btn btn-sm" v-if="showClearButton" @click.prevent="clearForm()" >
                    <i class="fa fa-close" aria-hidden="true"></i> {{ $t('reg-profile.clear_btn') }}
                </button>
            </header>

            <text-box-form code="title" group-code="offers" :group-id="offer.id"
                    required :label="$t('reg-profile.offer_title')" :placeholder="$t('reg-profile.offer_title')" :value="offer.title"></text-box-form>

            <text-area-form code="description" group-code="offers" :group-id="offer.id" :label="$t('reg-profile.offer_description')"
                    :placeholder="$t('reg-profile.offer_describe_description')" required :value="offer.description" :errors="errors"></text-area-form>

            <hr>
        </div>

        <p class="text-center">
            <button class="btn btn-default" @click.prevent="addNewOffer()">
                <i class="fa fa-plus" aria-hidden="true"></i> {{ $t('reg-profile.offer_add_more') }}
            </button>
        </p>
        <hr class="separator">
    </div>
</template>

<script>
import RemoveItemButton from '../student/common/RemoveItemButton.vue';
import TextBoxForm from '../common/TextBoxForm.vue';
import TextAreaForm from '../common/TextAreaForm.vue';
import SelectForm from '../common/SelectForm.vue';
import FileForm from '../common/FileForm.vue';
import Autocomplete from '../student/common/Autocomplete.vue';
import { institutionsResource } from 'resources/institutions';
import EventBus from 'event-bus.js';

export default {
    props: ['offers', 'userId', 'errors'],
    components: { RemoveItemButton, TextBoxForm, TextAreaForm, SelectForm, FileForm, Autocomplete },
    data() {
        return {
            parsed_offers: JSON.parse(this.offers),
            new_offers: [],
            remove_offers: []
        }
    },
    ready() {
        if (this.parsed_offers.length == 0) {
            this.addNewOffer();
        }
        EventBus.$on('onRemoveOffer', (offer) => {
            this.remove_offers.push(offer.id);
        });

        institutionsResource.get()
            .then((response) => {
                this.institutions = response.body;
            })
    },
    methods: {
        clearForm: function () {
            if (this.parsed_offers.length > 0) {
                this.remove_offers.push(this.parsed_offers[0].id);
            }
            this.parsed_offers = [];
            this.new_offers = [];
            this.addNewOffer();
        },
        addNewOffer: function () {
            var count = this.new_offers.length;
            this.new_offers.push(
                {'id': `new_${count}`, 'title': '', 'description': ''});
            console.log(this.new_offers);
        },
    },
    computed: {
        showClearButton: function () {
            return this.parsed_offers.length + this.new_offers.length == 1;
        }
    }
};
</script>
