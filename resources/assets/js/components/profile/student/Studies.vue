<template>
    <div>
        <input type="hidden" name="remove_studies[]" v-for="remove_study in remove_studies" :value="remove_study"/>

        <div class="study" v-for="(index, study) in parsed_studies">
            <header class="clearfix">
                <h4 class="pull-left">{{ $tc('reg-profile.study', 1) }} #{{ index + 1 }}</h4>
                <remove-item-button v-if="!showClearButton" :items="parsed_studies" :item="study" group-name="Study"></remove-item-button>
                <button class="pull-right remove btn-warning btn btn-sm" v-if="study.locked != 1 && showClearButton" @click.prevent="clearForm()" >
                    <i class="fa fa-close" aria-hidden="true"></i> {{ $t('reg-profile.clear_btn') }}
                </button>
            </header>

            <text-box-form type="hidden" code="id" group-code="studies" :group-id="study.id" :value="study.id"></text-box-form>

            <text-box-form code="institution_name" group-code="studies" :group-id="study.id" :label="$t('reg-profile.student_study_institution_name')"
                required :placeholder="$t('reg-profile.student_study_institution_name')" :value="study.institution_name" :readonly="!!study.locked" :errors="errors"></text-box-form>

            <div class="row">
                <div class="col-sm-8">
                    <text-box-form code="name" group-code="studies" :group-id="study.id" :label="$t('reg-profile.student_study_course_studies_name')"
                        required :placeholder="$t('reg-profile.student_study_course_studies_name')" :value="study.name" :readonly="!!study.locked" :errors="errors"></text-box-form>
                </div>
                <div class="col-sm-4">
                    <select-form code="level" group-code="studies" :group-id="study.id" :label="$t('reg-profile.student_study_level')"
                        required :placeholder="' - ' + $t('reg-profile.student_study_level') + ' - '" :values="studyLevels" :value="study.level" :disabled="!!study.locked" :errors="errors"></select-form>
                </div>
            </div>

            <select-form code="field" group-code="studies" :group-id="study.id" :label="$t('reg-profile.student_study_field')"
                required :placeholder="' - ' + $t('reg-profile.student_study_level') + ' - '" :values="studyFields" :value="study.field" :disabled="!!study.locked" :errors="errors"></select-form>

            <div v-if="study.certificate || !study.locked">
                <hr>
                <file-form code="certificate" group-code="studies" :group-id="study.id" :label="$t('reg-profile.student_certificate')"
                    :download-text="$t('reg-profile.student_download_certificate')" :has-file="study.certificate"
                    :file-url="getFileUrl(study.id, 'certificate')" :readonly="!!study.locked" :errors="errors"></file-form>
            </div>
            <div v-if="study.gradecard || !study.locked">
                <hr>
                <file-form code="gradecard" group-code="studies" :group-id="study.id" :label="$t('reg-profile.student_study_grade_card')"
                    :download-text="$t('reg-profile.student_download_grade_card')" :has-file="study.gradecard"
                    :file-url="getFileUrl(study.id, 'gradecard')" :readonly="!!study.locked" :errors="errors"></file-form>
            </div>
            <hr>
        </div>

        <div class="study" v-for="(index, new_study) in new_studies">
            <header class="clearfix">
                <h4 class="pull-left">{{ $tc('reg-profile.study', 1) }} #{{ (parsed_studies.length + index + 1) }}</h4>
                <remove-item-button v-if="!showClearButton" :items="new_studies" :item="new_study" ></remove-item-button>
                <button class="pull-right remove btn-warning btn btn-sm" v-if="showClearButton" @click.prevent="clearForm()" >
                    <i class="fa fa-close" aria-hidden="true"></i> {{ $t('reg-profile.clear_btn') }}
                </button>
            </header>

            <text-box-form code="institution_name" group-code="studies" :group-id="new_study.id" :label="$t('reg-profile.student_study_institution_name')"
                required :placeholder="$t('reg-profile.student_study_institution_name')" :value="new_study.institution_name"></text-box-form>

            <div class="row">
                <div class="col-sm-8">
                    <text-box-form code="name" group-code="studies" :group-id="new_study.id"
                        required :label="$t('reg-profile.student_study_course_studies_name')" :placeholder="$t('reg-profile.student_study_course_studies_name')" :value="new_study.name"></text-box-form>
                </div>
                <div class="col-sm-4">
                    <select-form code="level" group-code="studies" :group-id="new_study.id"
                        required :label="$t('reg-profile.student_study_level')" :placeholder="' - ' + $t('reg-profile.student_study_level') + ' - '" :values="studyLevels" :value="new_study.level"></select-form>
                </div>
            </div>

            <select-form code="field" group-code="studies" :group-id="new_study.id" :label="$t('reg-profile.student_study_field')"
                required :placeholder="' - ' + $t('reg-profile.student_study_level') + ' - '" :values="studyFields" :value="new_study.field"></select-form>

            <hr>
            <file-form code="certificate" group-code="studies" :group-id="new_study.id" :label="$t('reg-profile.student_certificate')"></file-form>
            <hr>
            <file-form code="gradecard" group-code="studies" :group-id="new_study.id" :label="$t('reg-profile.student_study_grade_card')"></file-form>
            <hr>
        </div>

        <p class="text-center">
            <button class="btn btn-default" @click.prevent="addNewStudy()">
                <i class="fa fa-plus" aria-hidden="true"></i> {{ $t('reg-profile.student_study_add_more') }}
            </button>
        </p>
        <hr class="separator">
    </div>
</template>

<script>
import RemoveItemButton from './common/RemoveItemButton.vue';
import TextBoxForm from '../common/TextBoxForm.vue';
import SelectForm from '../common/SelectForm.vue';
import FileForm from '../common/FileForm.vue';
import EventBus from 'event-bus.js';

export default {
    props: ['studies', 'studyLevels', 'studyFields', 'userId', 'errors'],
    components: { RemoveItemButton, TextBoxForm, SelectForm, FileForm },
    data() {
        return {
            parsed_studies: JSON.parse(this.studies),
            new_studies: [],
            remove_studies: []
        }
    },
    ready() {
        if (this.parsed_studies.length == 0) {
            this.addNewStudy();
        }
        EventBus.$on('onRemoveStudy', (study) => {
            this.remove_studies.push(study.id);
        });
    },
    methods: {
        clearForm: function () {
            if (this.parsed_studies.length > 0) {
                this.remove_studies.push(this.parsed_studies[0].id);
            }
            this.parsed_studies = [];
            this.new_studies = [];
            this.addNewStudy();
        },
        addNewStudy: function () {
            var count = this.new_studies.length;
            this.new_studies.push(
                {'id': `new_${count}`, 'institution_name': '', 'name': '', 'level': '', 'field': ''});
        },
        getFileUrl: function (study_id, code) {
            return `/profile/${code}/${this.userId}/study/${study_id}`;
        }
    },
    computed: {
        showClearButton: function () {
            return this.parsed_studies.length + this.new_studies.length == 1;
        }
    }
};
</script>
