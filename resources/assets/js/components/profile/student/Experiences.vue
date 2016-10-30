<template>
    <div>
        <div class="experience" v-for="(experience, index) in parsed_experiences">
            <header class="clearfix">
                <h4 class="pull-left">Work Experience #{{ index + 1 }}</h4>
                <remove-item-button :items="parsed_experiences" :item="experience"></remove-item-button>
            </header>

            <input :name="generateCode('id', experience)" type="hidden" :value="experience.id"/>

            <div class="row">
                <date-form class="col-sm-6" :code="generateCode('from', experience)" label="From" placeholder="Work from" :value="experience.from" :has-error="parsed_errors['from']" :error="parsed_errors['from']"></date-form>
                <date-form class="col-sm-6" :code="generateCode('until', experience)" label="To" placeholder="Work to" :value="experience.until" :has-error="parsed_errors['until']" :error="parsed_errors['until']"></date-form>
            </div>

            <text-box-form :code="generateCode('company', experience)" label="Company name" placeholder="Company name" :value="experience.company" :has-error="parsed_errors['company']" :error="parsed_errors['company']"></text-box-form>
            <text-box-form :code="generateCode('position', experience)" label="Position" placeholder="Position" :value="experience.position" :has-error="parsed_errors['position']" :error="parsed_errors['position']"></text-box-form>
        </div>

        <div class="experience" v-for="(new_experience, index) in new_experiences">
            <header class="clearfix">
                <h4 class="pull-left">Work Experience #{{ (parsed_experiences.length + index + 1) }}</h4>
                <remove-item-button :items="new_experiences" :item="new_experience"></remove-item-button>
            </header>
            <div class="row">
                <date-form class="col-sm-6" :code="generateCode('from', new_experience)" label="From" placeholder="Work from" :value="new_experience.from" :has-error="parsed_errors['from']" :error="parsed_errors['from']"></date-form>
                <date-form class="col-sm-6" :code="generateCode('until', new_experience)" label="To" placeholder="Work to" :value="new_experience.until" :has-error="parsed_errors['until']" :error="parsed_errors['until']"></date-form>
            </div>

            <text-box-form :code="generateCode('company', new_experience)" label="Company name" placeholder="Company name" :value="new_experience.company" :has-error="parsed_errors['company']" :error="parsed_errors['company']"></text-box-form>
            <text-box-form :code="generateCode('position', new_experience)" label="Position" placeholder="Position" :value="new_experience.position" :has-error="parsed_errors['position']" :error="parsed_errors['position']"></text-box-form>
        </div>

        <hr>

        <p class="text-center">
            <button class="btn btn-default" @click.prevent="addNewExperience()">
                <i class="fa fa-plus" aria-hidden="true"></i> add more work experiences
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
            parsed_errors: [],
            new_experiences: []
        }
    },
    mounted() {
        this.parsed_experiences = JSON.parse(this.experiences);
        this.parsed_errors = JSON.parse(this.errors);
        if (this.parsed_experiences.length == 0) {
            this.addNewExperience();
        }
    },
    methods: {
        generateCode: function (field_name, experience) {
            return `experiences[${experience.id}][${field_name}]`;
        },
        addNewExperience: function () {
            var count = this.new_experiences.length;
            this.new_experiences.push({"id": `new_${count}`});
        }
    }
};
</script>
