<template>
    <div>
        <div class="experience" v-for="(experience, index) in parsed_experiences">
            <header class="clearfix">
                <h4 class="pull-left">Work Experience #{{ index + 1 }}</h4>
                <remove-item-button :items="parsed_experiences" :item="experience"></remove-item-button>
            </header>

            <text-box-form type="hidden" code="id" group-code="experiences" :group-id="experience.id" :value="experience.id"></text-box-form>

            <div class="row">
                <date-form class="col-sm-6" code="from" group-code="experiences" :group-id="experience.id" label="From" placeholder="Work from" :value="experience.from" :errors="errors"></date-form>
                <date-form class="col-sm-6" code="until" group-code="experiences" :group-id="experience.id" label="To" placeholder="Work to" :value="experience.until" :errors="errors"></date-form>
            </div>

            <text-box-form code="company" group-code="experiences" :group-id="experience.id" label="Company name" placeholder="Company name" :value="experience.company" :errors="errors"></text-box-form>
            <text-box-form code="position" group-code="experiences" :group-id="experience.id" label="Position" placeholder="Position" :value="experience.position" :errors="errors"></text-box-form>
            <hr>
        </div>

        <div class="experience" v-for="(new_experience, index) in new_experiences">
            <header class="clearfix">
                <h4 class="pull-left">Work Experience #{{ (parsed_experiences.length + index + 1) }}</h4>
                <remove-item-button :items="new_experiences" :item="new_experience"></remove-item-button>
            </header>
            <div class="row">
                <date-form class="col-sm-6" code="from" group-code="experiences" :group-id="new_experience.id" label="From" placeholder="Work from" :value="new_experience.from" :errors="errors"></date-form>
                <date-form class="col-sm-6" code="until" group-code="experiences" :group-id="new_experience.id" label="To" placeholder="Work to" :value="new_experience.until" :errors="errors"></date-form>
            </div>

            <text-box-form code="company" group-code="experiences" :group-id="new_experience.id" label="Company name" placeholder="Company name" :value="new_experience.company" :errors="errors"></text-box-form>
            <text-box-form code="position" group-code="experiences" :group-id="new_experience.id" label="Position" placeholder="Position" :value="new_experience.position" :errors="errors"></text-box-form>
            <hr>
        </div>

        <p class="text-center">
            <button class="btn btn-default" @click.prevent="addNewExperience()">
                <i class="fa fa-plus" aria-hidden="true"></i> {{addButtonText}}
            </button>
        </p>

        <hr class="separator">
    </div>
</template>

<script>
import RemoveItemButton from './common/RemoveItemButton.vue';
import TextBoxForm from '../common/TextBoxForm.vue';
import DateForm from '../common/DateForm.vue';

export default {
    props: ['experiences', 'errors'],
    components: { RemoveItemButton, TextBoxForm, DateForm },
    data() {
        return {
            parsed_experiences: [],
            new_experiences: [],
            parsed_errors: [],
            total: 0
        }
    },
    mounted() {
        this.parsed_experiences = JSON.parse(this.experiences);
        this.parsed_errors = JSON.parse(this.errors);
    },
    methods: {
        addNewExperience: function () {
            var count = this.new_experiences.length;
            this.new_experiences.push({"id": `new_${count}`});
        }
    },
    computed: {
        addButtonText: function () {
            return this.total == 0 ? 'add a work experience' : 'add more work experiences';
        }
    },
    watch: {
        parsed_experiences: function () {
            this.total = this.parsed_experiences.length + this.new_experiences.length
        },
        new_experiences: function () {
            this.total = this.parsed_experiences.length + this.new_experiences.length
        }
    }
};
</script>
