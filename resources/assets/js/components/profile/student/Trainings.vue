<template>
    <div>
        <div class="training" v-for="(training, index) in parsed_trainings">
            <header class="clearfix">
                <h4 class="pull-left">Training #{{ index + 1 }}</h4>
                <remove-item-button :items="parsed_trainings" :item="training"></remove-item-button>
            </header>

            <text-box-form type="hidden" code="id" group-code="trainings" :group-id="training.id" :value="training.id"></text-box-form>

            <text-box-form code="name" group-code="trainings" :group-id="training.id" label="Course name" placeholder="Course name" :value="training.name" :errors="errors"></text-box-form>
            <date-form code="date" group-code="trainings" :group-id="training.id" label="Date" placeholder="Date" :value="training.date" :errors="errors"></date-form>

            <hr>
            <file-form code="certificate" group-code="trainings" :group-id="training.id" label="Certificate" download-text="Download Certificate" file-url="/profile/certificate/2/training/32"></file-form>
            <hr>
        </div>

        <div class="training" v-for="(new_training, index) in new_trainings">
            <header class="clearfix">
                <h4 class="pull-left">Training #{{ (parsed_trainings.length + index + 1) }}</h4>
                <remove-item-button :items="new_trainings" :item="new_training"></remove-item-button>
            </header>

            <text-box-form code="name" group-code="trainings" :group-id="new_training.id" label="Course name" placeholder="Course name" :value="new_training.name" :errors="errors"></text-box-form>
            <date-form code="date" group-code="trainings" :group-id="new_training.id" label="Date" placeholder="Date" :value="new_training.date" :errors="errors"></date-form>

            <hr>
            <file-form code="certificate" group-code="trainings" :group-id="new_training.id" label="Certificate" download-text="Download Certificate" file-url="/profile/certificate/2/training/32"></file-form>
            <hr>

        </div>

        <p class="text-center">
            <button class="btn btn-default" @click.prevent="addNewTraining()">
                <i class="fa fa-plus" aria-hidden="true"></i> add more trainings
            </button>
        </p>
        <hr class="separator">
    </div>
</template>

<script>
import RemoveItemButton from './common/RemoveItemButton.vue';
import TextBoxForm from '../common/TextBoxForm.vue';
import DateForm from '../common/DateForm.vue';
import FileForm from '../common/FileForm.vue';

export default {
    props: ['trainings', 'trainingLevels', 'trainingFields', 'errors'],
    components: { RemoveItemButton, TextBoxForm, DateForm, FileForm },
    data() {
        return {
            parsed_trainings: [],
            parsed_errors: [],
            new_trainings: []
        }
    },
    mounted() {
        this.parsed_trainings = JSON.parse(this.trainings);
        this.parsed_errors = JSON.parse(this.errors);
        if (this.parsed_trainings.length == 0) {
            this.addNewTraining();
        }
    },
    methods: {
        addNewTraining: function () {
            var count = this.new_trainings.length;
            this.new_trainings.push({"id": `new_${count}`});
        }
    }
};
</script>
