<template>
    <div>
        <input type="hidden" name="remove_languages[]" v-for="remove_language in remove_languages" :value="remove_language"/>

        <div class="language" :id="language.id" v-for="(index, language) in parsed_languages">
            <header class="clearfix">
                <h4 class="pull-left">Language #{{ index + 1 }}</h4>
                <remove-item-button :items="parsed_languages" :item="language" group-name="Language"></remove-item-button>
            </header>

            <text-box-form type="hidden" code="id" group-code="languages" :group-id="language.id"
                :value="language.id"></text-box-form>

            <select-form code="name" group-code="languages" :group-id="language.id" label="Language name"
                required placeholder=" - Language name - " :values="languageNames" :value="language.name" :errors="errors"></select-form>
            <select-form code="level" group-code="languages" :group-id="language.id" label="Language level"
                required placeholder=" - Language level - " :values="languageLevels" :value="language.level" :errors="errors"></select-form>

            <hr>
            <file-form code="certificate" group-code="languages" :group-id="language.id" label="Certificate"
                download-text="Download Certificate" :has-file="language.certificate"
                :file-url="getFileUrl(language.id, 'certificate')" :errors="errors"></file-form>
            <hr>
        </div>

        <div class="language" v-for="(index, new_language) in new_languages">
            <header class="clearfix">
                <h4 class="pull-left">Language #{{ (parsed_languages.length + index + 1) }}</h4>
                <remove-item-button :items="new_languages" :item="new_language"></remove-item-button>
            </header>

            <select-form code="name" group-code="languages" :group-id="new_language.id" label="Language name"
                required placeholder=" - Language name - " :values="languageNames" :value="new_language.name"></select-form>
            <select-form code="level" group-code="languages" :group-id="new_language.id" label="Language level"
                required placeholder=" - Language level - " :values="languageLevels" :value="new_language.level"></select-form>

            <hr>
            <file-form code="certificate" group-code="languages" :group-id="new_language.id" label="Certificate"
                download-text="Download Certificate"></file-form>
            <hr>

        </div>

        <p class="text-center">
            <button class="btn btn-default" @click.prevent="addNewLanguage()">
                <i class="fa fa-plus" aria-hidden="true"></i> {{addButtonText}}
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
    props: ['languages', 'languageNames', 'languageLevels', 'errors', 'userId'],
    components: { RemoveItemButton, TextBoxForm, SelectForm, FileForm },
    data() {
        return {
            parsed_languages: JSON.parse(this.languages),
            new_languages: [],
            total: 0,
            remove_languages: [],
        }
    },
    ready() {
        EventBus.$on('onRemoveLanguage', (language) => {
            this.remove_languages.push(language.id);
        });
    },
    methods: {
        addNewLanguage: function () {
            var count = this.new_languages.length;
            this.new_languages.push({"id": `new_${count}`});
        },
        getFileUrl: function (language_id, code) {
            return `/profile/${code}/${this.userId}/language/${language_id}`;
        }
    },
    computed: {
        addButtonText: function () {
            return this.total == 0 ? 'add a language' : 'add more languages';
        }
    },
    watch: {
        parsed_languages: function () {
            this.total = this.parsed_languages.length + this.new_languages.length
        },
        new_languages: function () {
            this.total = this.parsed_languages.length + this.new_languages.length
        }
    }
};
</script>
