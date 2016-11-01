<template>
    <div>
        <div class="study" v-for="(index, study) in parsed_studies">
            <header class="clearfix">
                <h4 class="pull-left">Studies #{{ index + 1 }}</h4>
                <remove-item-button v-if="!showClearButton" :items="parsed_studies" :item="study"></remove-item-button>
                <button class="pull-right remove btn-warning btn btn-sm" v-if="showClearButton" @click.prevent="clearForm()" >
                    <i class="fa fa-close" aria-hidden="true"></i> clear
                </button>
            </header>

            <text-box-form type="hidden" code="id" group-code="studies" :group-id="study.id" :value="study.id"></text-box-form>

            <text-box-form code="institution_name" group-code="studies" :group-id="study.id" label="Institution name" placeholder="Institution name" :value="study.institution_name" :errors="errors"></text-box-form>

            <div class="row">
                <text-box-form class="col-sm-8" code="name" group-code="studies" :group-id="study.id" label="Course/Studies name" placeholder="Course/Studies name" :value="study.name" :errors="errors"></text-box-form>
                <select-form class="col-sm-4" code="level" group-code="studies" :group-id="study.id" label="Level" placeholder=" - Level - " :values="studyLevels" :value="study.level" :errors="errors"></select-form>
            </div>

            <select-form code="field" group-code="studies" :group-id="study.id" label="Field of studies" placeholder=" - Field of studies - " :values="studyFields" :value="study.field" :errors="errors"></select-form>

            <hr>
            <file-form code="certificate" group-code="studies" :group-id="study.id" label="Certificate" download-text="Download Certificate" :has-file="study.certificate" :file-url="getFileUrl(study.id, 'certificate')"></file-form>
            <hr>
            <file-form code="gradecard" group-code="studies" :group-id="study.id" label="Gradecard" download-text="Download Gradecard" :has-file="study.gradecard" :file-url="getFileUrl(study.id, 'gradecard')"></file-form>
            <hr>
        </div>

        <div class="study" v-for="(index, new_study) in new_studies">
            <header class="clearfix">
                <h4 class="pull-left">Studies #{{ (parsed_studies.length + index + 1) }}</h4>
                <remove-item-button v-if="!showClearButton" :items="new_studies" :item="new_study" ></remove-item-button>
                <button class="pull-right remove btn-warning btn btn-sm" v-if="showClearButton" @click.prevent="clearForm()" >
                    <i class="fa fa-close" aria-hidden="true"></i> clear
                </button>
            </header>

            <text-box-form code="institution_name" group-code="studies" :group-id="new_study.id" label="Institution name" placeholder="Institution name" :value="new_study.institution_name"></text-box-form>

            <div class="row">
                <text-box-form class="col-sm-8" code="name" group-code="studies" :group-id="new_study.id" label="Course/Studies name" placeholder="Course/Studies name" :value="new_study.name"></text-box-form>
                <select-form class="col-sm-4" code="level" group-code="studies" :group-id="new_study.id" label="Level" placeholder=" - Level - " :values="studyLevels" :value="new_study.level"></select-form>
            </div>

            <select-form code="field" group-code="studies" :group-id="new_study.id" label="Field of studies" placeholder=" - Field of studies - " :values="studyFields" :value="new_study.field"></select-form>

            <hr>
            <file-form code="certificate" group-code="studies" :group-id="new_study.id" label="Certificate"></file-form>
            <hr>
            <file-form code="gradecard" group-code="studies" :group-id="new_study.id" label="Gradecard"></file-form>
            <hr>
        </div>

        <p class="text-center">
            <button class="btn btn-default" @click.prevent="addNewStudy()">
                <i class="fa fa-plus" aria-hidden="true"></i> add more studies
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

export default {
    props: ['studies', 'studyLevels', 'studyFields', 'userId', 'errors'],
    components: { RemoveItemButton, TextBoxForm, SelectForm, FileForm },
    data() {
        return {
            parsed_studies: [],
            parsed_errors: [],
            new_studies: []
        }
    },
    ready() {
        this.parsed_studies = JSON.parse(this.studies);
        this.parsed_errors = JSON.parse(this.errors);
        if (this.parsed_studies.length == 0) {
            this.addNewStudy();
        }
    },
    methods: {
        clearForm: function () {
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
            return `/${code}/${this.userId}/study/${study_id}`;
        }
    },
    computed: {
        showClearButton: function () {
            return this.parsed_studies.length + this.new_studies.length == 1;
        }
    }
};
</script>
