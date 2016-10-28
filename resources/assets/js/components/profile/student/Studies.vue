<template>
    <div>
        <div class="study" v-for="(study, key, index) in parsed_studies">
            <header class="clearfix">
                <h4 class="pull-left">Studies {{ index + 1 }}</h4>
                <a class="pull-right remove btn-danger btn btn-sm" href="#"><i class="fa fa-close" aria-hidden="true"></i> remove</a>
            </header>

            <text-box-form :code="generateCode('institution_name', study)" label="Institution name" placeholder="Institution name" :value="study.institution_name" :has-error="parsed_errors['institution_name']" :error="parsed_errors['institution_name']"></text-box-form>

            <div class="row">
                <text-box-form class="col-sm-8" :code="generateCode('studies_name', study)" label="Course/Studies name" placeholder="Course/Studies name" :value="study.studies_name" :has-error="parsed_errors['studies_name']" :error="parsed_errors['studies_name']"></text-box-form>
                <select-form class="col-sm-4" :code="generateCode('level', study)" label="Level" placeholder=" - Level - " :values="studyLevels" :value="study.level" :has-error="parsed_errors['level']" :error="parsed_errors['level']"></select-form>
            </div>

            <select-form :code="generateCode('study_field', study)" label="Field of studies" placeholder=" - Field of studies - " :values="studyFields" :value="study.study_field" :has-error="parsed_errors['study_field']" :error="parsed_errors['study_field']"></select-form>

            <hr>
            <file-form :code="generateCode('certificate', study)" label="Certificate" download-text="Download Certificate" file-url="/profile/certificate/2/study/32"></file-form>
            <hr>
            <file-form :code="generateCode('gradecard', study)" label="Gradecard" download-text="Download Gradecard" file-url="/profile/gradecard/2/study/32"></file-form>
            <hr>
        </div>

        <div class="study" v-for="(new_study, index) in new_studies">
            <header class="clearfix">
                <h4 class="pull-left">Studies {{ (parsed_studies.length + index + 1) }}</h4>
                <a class="hidden pull-right remove btn-danger btn btn-sm" href="#"><i class="fa fa-close" aria-hidden="true"></i> remove</a>
            </header>

            <text-box-form :code="generateCode('institution_name', new_study)" label="Institution name" placeholder="Institution name" :has-error="parsed_errors['institution_name']" :error="parsed_errors['institution_name']"></text-box-form>

            <div class="row">
                <text-box-form class="col-sm-8" :code="generateCode('studies_name', new_study)" label="Course/Studies name" placeholder="Course/Studies name" :has-error="parsed_errors['studies_name']" :error="parsed_errors['studies_name']"></text-box-form>
                <select-form class="col-sm-4" :code="generateCode('level', new_study)" label="Level" placeholder=" - Level - " :values="studyLevels" value="" :has-error="parsed_errors['level']" :error="parsed_errors['level']"></select-form>
            </div>

            <select-form :code="generateCode('study_field', new_study)" label="Field of studies" placeholder=" - Field of studies - " :values="studyFields" value="" :has-error="parsed_errors['study_field']" :error="parsed_errors['study_field']"></select-form>

            <hr>
            <file-form :code="generateCode('certificate', new_study)" label="Certificate"></file-form>
            <hr>
            <file-form :code="generateCode('gradecard', new_study)" label="Gradecard"></file-form>
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
import TextBoxForm from '../common/TextBoxForm.vue';
import SelectForm from '../common/SelectForm.vue';
import FileForm from '../common/FileForm.vue';

export default {
    props: ['studies', 'studyLevels', 'studyFields', 'errors'],
    components: { TextBoxForm, SelectForm, FileForm },
    data() {
        return {
            parsed_studies: [],
            parsed_errors: [],
            new_studies: []
        }
    },
    mounted() {
        this.parsed_studies = JSON.parse(this.studies);
        this.parsed_errors = JSON.parse(this.errors);
        if (this.parsed_studies.length == 0) {
            this.addNewStudy();
        }
    },
    methods: {
        generateCode: function (field_name, study) {
            return `studies[${study.id}][${field_name}]`;
        },
        addNewStudy: function () {
            var count = this.new_studies.length;
            this.new_studies.push({"id": `new_${count}`});
        }
    }
};
</script>
