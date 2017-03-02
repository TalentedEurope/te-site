<template>
    <div>
        <input type="hidden" name="remove_trainings[]" v-for="remove_training in remove_trainings" :value="remove_training"/>

        <div class="training" v-for="(index, training) in parsed_trainings">
            <header class="clearfix">
                <h4 class="pull-left">{{ $t('reg-profile.student_training') }} #{{ index + 1 }}</h4>
                <remove-item-button :items="parsed_trainings" :item="training" group-name="Training"></remove-item-button>
            </header>

            <text-box-form type="hidden" code="id" group-code="trainings" :group-id="training.id" :value="training.id" required></text-box-form>

            <text-box-form code="name" group-code="trainings" :group-id="training.id" label="Course name" placeholder="Course name"
                required :value="training.name" :readonly="!!training.locked" :errors="errors"></text-box-form>
            <date-form code="date" group-code="trainings" :group-id="training.id" :label="$t('reg-profile.student_date')" :placeholder="$t('reg-profile.student_date')"
                required :value="training.date" :readonly="!!training.locked" :errors="errors"></date-form>

            <hr>
            <file-form code="certificate" group-code="trainings" :group-id="training.id" :label="$t('reg-profile.student_certificate')"
                download-text="Download Certificate" :has-file="training.certificate" :readonly="!!training.locked"
                :file-url="getFileUrl(training.id, 'certificate')" :errors="errors"></file-form>
            <hr>
        </div>

        <div class="training" v-for="(index, new_training) in new_trainings">
            <header class="clearfix">
                <h4 class="pull-left">{{ $t('reg-profile.student_training') }} #{{ (parsed_trainings.length + index + 1) }}</h4>
                <remove-item-button :items="new_trainings" :item="new_training"></remove-item-button>
            </header>

            <text-box-form code="name" group-code="trainings" :group-id="new_training.id" label="Course name"
                required placeholder="Course name" :value="new_training.name"></text-box-form>
            <date-form code="date" group-code="trainings" :group-id="new_training.id" :label="$t('reg-profile.student_date')"
                required :placeholder="$t('reg-profile.student_date')" :value="new_training.date"></date-form>

            <hr>
            <file-form code="certificate" group-code="trainings" :group-id="new_training.id" :label="$t('reg-profile.student_certificate')"
                download-text="Download Certificate"></file-form>
            <hr>

        </div>

        <p class="text-center">
            <button class="btn btn-default" @click.prevent="addNewTraining()">
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
import FileForm from '../common/FileForm.vue';
import EventBus from 'event-bus.js';

export default {
    props: ['trainings', 'trainingLevels', 'trainingFields', 'userId', 'errors'],
    components: { RemoveItemButton, TextBoxForm, DateForm, FileForm },
    data() {
        return {
            parsed_trainings: JSON.parse(this.trainings),
            new_trainings: [],
            total: 0,
            remove_trainings: [],
        }
    },
    ready() {
        EventBus.$on('onRemoveTraining', (training) => {
            this.remove_trainings.push(training.id);
        });
    },
    methods: {
        addNewTraining: function () {
            var count = this.new_trainings.length;
            this.new_trainings.push({"id": `new_${count}`});
        },
        getFileUrl: function (training_id, code) {
            return `/profile/${code}/${this.userId}/training/${training_id}`;
        }
    },
    computed: {
        addButtonText: function () {
            return this.total == 0 ? 'add a training' : 'add more trainings';
        }
    },
    watch: {
        parsed_trainings: function () {
            this.total = this.parsed_trainings.length + this.new_trainings.length
        },
        new_trainings: function () {
            this.total = this.parsed_trainings.length + this.new_trainings.length
        }
    }
};
</script>
