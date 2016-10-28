<template>
    <div>
        <div class="language" v-for="(language, key, index) in parsed_languages">
            <header class="clearfix">
                <h4 class="pull-left">Language {{ index + 1 }}</h4>
                <a class="pull-right remove btn-danger btn btn-sm" href="#"><i class="fa fa-close" aria-hidden="true"></i> remove</a>
            </header>

            <select-form :code="generateCode('name', language)" label="Language name" placeholder=" - Language name - " :values="languageNames" :value="language.name" :has-error="parsed_errors['name']" :error="parsed_errors['name']"></select-form>
            <select-form :code="generateCode('level', language)" label="Language level" placeholder=" - Language level - " :values="languageLevels" :value="language.level" :has-error="parsed_errors['level']" :error="parsed_errors['level']"></select-form>

            <hr>
            <file-form :code="generateCode('certificate', language)" label="Certificate" download-text="Download Certificate" file-url="/profile/certificate/2/language/32"></file-form>
            <hr>
        </div>

        <div class="language" v-for="(new_language, index) in new_languages">
            <header class="clearfix">
                <h4 class="pull-left">Language {{ (parsed_languages.length + index + 1) }}</h4>
                <a class="hidden pull-right remove btn-danger btn btn-sm" href="#"><i class="fa fa-close" aria-hidden="true"></i> remove</a>
            </header>

            <select-form :code="generateCode('name', new_language)" label="Language name" placeholder=" - Language name - " :values="languageNames" value="" :has-error="parsed_errors['name']" :error="parsed_errors['name']"></select-form>
            <select-form :code="generateCode('level', new_language)" label="Language level" placeholder=" - Language level - " :values="languageLevels" value="" :has-error="parsed_errors['level']" :error="parsed_errors['level']"></select-form>

            <hr>
            <file-form :code="generateCode('certificate', new_language)" label="Certificate" download-text="Download Certificate" file-url="/profile/certificate/2/language/32"></file-form>
            <hr>

        </div>

        <p class="text-center">
            <button class="btn btn-default" @click.prevent="addNewLanguage()">
                <i class="fa fa-plus" aria-hidden="true"></i> add more languages
            </button>
        </p>
        <hr class="separator">
    </div>
</template>

<script>
import SelectForm from '../common/SelectForm.vue';
import FileForm from '../common/FileForm.vue';

export default {
    props: ['languages', 'languageNames', 'languageLevels', 'errors'],
    components: { SelectForm, FileForm },
    data() {
        return {
            parsed_languages: [],
            parsed_errors: [],
            new_languages: []
        }
    },
    mounted() {
        this.parsed_languages = JSON.parse(this.languages);
        this.parsed_errors = JSON.parse(this.errors);
        if (this.parsed_languages.length == 0) {
            this.addNewLanguage();
        }
    },
    methods: {
        generateCode: function (field_name, language) {
            return `languages[${language.id}][${field_name}]`;
        },
        addNewLanguage: function () {
            var count = this.new_languages.length;
            this.new_languages.push({"id": `new_${count}`});
        }
    }
};
</script>
