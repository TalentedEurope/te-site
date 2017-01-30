<template>
    <div>
        <input type="hidden" name="remove_experiences[]" v-for="remove_experience in remove_experiences" :value="remove_experience"/>

        <div class="experience" v-for="(index, experience) in parsed_experiences">
            <header class="clearfix">
                <h4 class="pull-left">{{ $t("reg-profile.student_work_experience") }} #{{ index + 1 }}</h4>
                <remove-item-button :items="parsed_experiences" :item="experience" group-name="Experience"></remove-item-button>
            </header>

            <text-box-form type="hidden" code="id" group-code="experiences" :group-id="experience.id" :value="experience.id"></text-box-form>

            <div class="row">
                <date-form class="col-sm-6" code="from" group-code="experiences" :group-id="experience.id" :label="$t('reg-profile.student_study_from')"
                    required placeholder="Work from" :value="experience.from" :errors="errors"></date-form>
                <date-form class="col-sm-6" code="until" group-code="experiences" :group-id="experience.id" :label="$t('reg-profile.student_study_to')"
                    placeholder="Work to" :value="experience.until" :errors="errors"></date-form>
            </div>

            <text-box-form code="company" group-code="experiences" :group-id="experience.id" :label="$t('reg-profile.student_experience_company')"
                required :placeholder="$t('reg-profile.student_experience_company')" :value="experience.company" :errors="errors"></text-box-form>
            <text-box-form code="position" group-code="experiences" :group-id="experience.id" :label="$t('reg-profile.position')"
                required :placeholder="$t('reg-profile.position')" :value="experience.position" :errors="errors"></text-box-form>
            <hr>
        </div>

        <div class="experience" v-for="(index, new_experience) in new_experiences">
            <header class="clearfix">
                <h4 class="pull-left">{{ $t("reg-profile.student_work_experience") }} #{{ (parsed_experiences.length + index + 1) }}</h4>
                <remove-item-button :items="new_experiences" :item="new_experience"></remove-item-button>
            </header>
            <div class="row">
                <date-form class="col-sm-6" code="from" group-code="experiences" :group-id="new_experience.id"
                    required :label="$t('reg-profile.student_study_from')" placeholder="Work from" :value="new_experience.from"></date-form>
                <date-form class="col-sm-6" code="until" group-code="experiences" :group-id="new_experience.id"
                    :label="$t('reg-profile.student_study_to')" placeholder="Work to" :value="new_experience.until"></date-form>
            </div>

            <text-box-form code="company" group-code="experiences" :group-id="new_experience.id" :label="$t('reg-profile.student_experience_company')"
                required :placeholder="$t('reg-profile.student_experience_company')" :value="new_experience.company"></text-box-form>
            <text-box-form code="position" group-code="experiences" :group-id="new_experience.id" :label="$t('reg-profile.position')"
                required :placeholder="$t('reg-profile.position')" :value="new_experience.position"></text-box-form>
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
import EventBus from 'event-bus.js';

export default {
    props: ['experiences', 'errors'],
    components: { RemoveItemButton, TextBoxForm, DateForm },
    data() {
        return {
            parsed_experiences: JSON.parse(this.experiences),
            new_experiences: [],
            total: 0,
            remove_experiences: [],
        }
    },
    ready() {
        EventBus.$on('onRemoveExperience', (experience) => {
            this.remove_experiences.push(experience.id);
        });
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
