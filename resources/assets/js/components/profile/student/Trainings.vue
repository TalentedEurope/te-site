<template>
    <div>
        <div class="training" v-for="(training, index) in parsed_trainings">
            <header class="clearfix">
                <h4 class="pull-left">Training {{ index + 1 }}</h4>
                <a class="pull-right remove btn-danger btn btn-sm" href="#"><i class="fa fa-close" aria-hidden="true"></i> remove</a>
            </header>

            <text-box-form :code="generateCode('name', training)" label="Course name" placeholder="Course name" :value="training.name" :has-error="parsed_errors['name']" :error="parsed_errors['name']"></text-box-form>
            <date-form :code="generateCode('date', training)" label="Date" placeholder="Date" :value="training.date" :has-error="parsed_errors['date']" :error="parsed_errors['date']"></date-form>

            <hr>
            <file-form :code="generateCode('certificate', training)" label="Certificate" download-text="Download Certificate" file-url="/profile/certificate/2/training/32"></file-form>
            <hr>
        </div>

        <div class="training" v-for="(new_training, index) in new_trainings">
            <header class="clearfix">
                <h4 class="pull-left">Training {{ (parsed_trainings.length + index + 1) }}</h4>
                <a class="hidden pull-right remove btn-danger btn btn-sm" href="#"><i class="fa fa-close" aria-hidden="true"></i> remove</a>
            </header>

            <text-box-form :code="generateCode('name', new_training)" label="Course name" placeholder="Course name" :value="new_training.name" :has-error="parsed_errors['name']" :error="parsed_errors['name']"></text-box-form>
            <date-form :code="generateCode('date', new_training)" label="Date" placeholder="Date" :value="new_training.date" :has-error="parsed_errors['date']" :error="parsed_errors['date']"></date-form>

            <hr>
            <file-form :code="generateCode('certificate', new_training)" label="Certificate" download-text="Download Certificate" file-url="/profile/certificate/2/training/32"></file-form>
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
import TextBoxForm from '../common/TextBoxForm.vue';
import DateForm from '../common/DateForm.vue';
import FileForm from '../common/FileForm.vue';

export default {
    props: ['trainings', 'trainingLevels', 'trainingFields', 'errors'],
    components: { TextBoxForm, DateForm, FileForm },
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
        generateCode: function (field_name, training) {
            return `trainings[${training.id}][${field_name}]`;
        },
        addNewTraining: function () {
            var count = this.new_trainings.length;
            this.new_trainings.push({"id": `new_${count}`});
        }
    }
};
</script>
