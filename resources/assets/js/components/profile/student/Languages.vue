<template>
    <div>
        <div class="language" v-for="(language, index) in parsed_languages">
            <header class="clearfix">
                <h4 class="pull-left">Language #{{ index + 1 }}</h4>
                <remove-item-button :items="parsed_languages" :item="language"></remove-item-button>
            </header>

            <text-box-form type="hidden" code="id" group-code="languages" :group-id="language.id" :value="language.id"></text-box-form>

            <select-form code="name" group-code="languages" :group-id="language.id" label="Language name" placeholder=" - Language name - " :values="languageNames" :value="language.name" :errors="errors"></select-form>
            <select-form code="level" group-code="languages" :group-id="language.id" label="Language level" placeholder=" - Language level - " :values="languageLevels" :value="language.level" :errors="errors"></select-form>

            <hr>
            <file-form code="certificate" group-code="languages" :group-id="language.id" label="Certificate" download-text="Download Certificate" file-url="/profile/certificate/2/language/32"></file-form>
            <hr>
        </div>

        <div class="language" v-for="(new_language, index) in new_languages">
            <header class="clearfix">
                <h4 class="pull-left">Language #{{ (parsed_languages.length + index + 1) }}</h4>
                <remove-item-button :items="new_languages" :item="new_language"></remove-item-button>
            </header>

            <select-form code="name" group-code="languages" :group-id="new_language.id" label="Language name" placeholder=" - Language name - " :values="languageNames" value="" :errors="errors"></select-form>
            <select-form code="level" group-code="languages" :group-id="new_language.id" label="Language level" placeholder=" - Language level - " :values="languageLevels" value="" :errors="errors"></select-form>

            <hr>
            <file-form code="certificate" group-code="languages" :group-id="new_language.id" label="Certificate" download-text="Download Certificate" file-url="/profile/certificate/2/language/32"></file-form>
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
import RemoveItemButton from './common/RemoveItemButton.vue';
import TextBoxForm from '../common/TextBoxForm.vue';
import SelectForm from '../common/SelectForm.vue';
import FileForm from '../common/FileForm.vue';

export default {
    props: ['languages', 'languageNames', 'languageLevels', 'errors'],
    components: { RemoveItemButton, TextBoxForm, SelectForm, FileForm },
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
        addNewLanguage: function () {
            var count = this.new_languages.length;
            this.new_languages.push({"id": `new_${count}`});
        }
    }
};
</script>
