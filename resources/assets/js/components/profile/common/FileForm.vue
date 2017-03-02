<template>
    <div class="form-group" v-bind:class="{ 'alert alert-danger': has_error }">
        <label :for="generateFieldId()">{{ parsedLabel }}</label>
        <input type="file" :id="generateFieldId()" :name="generateFieldName()" :filename="code"
            @change="changeFile()" :required="isRequired()" v-if="!readonly"/>
        <p class="download-button h4" v-if="hasFile">
            <a class="btn btn-primary" :alt="downloadText" :href="fileUrl">
                <i class="fa fa-cloud-download" aria-hidden="true"></i> {{ downloadText }}
            </a>
        </p>
        <p v-if="readonly && !hasFile">You have not uploaded a file</p>
        <span v-if="has_error" class="help-block">
            <strong>{{error_message}}</strong>
        </span>
    </div>
</template>

<script>
import { parsedLabel, setCodeForValidation, setInitError, generateFieldId, generateFieldName, onInput } from './form-helpers';

export default {
    props: ['code', 'label', 'groupCode', 'groupId', 'downloadText', 'hasFile', 'fileUrl', 'required', 'readonly', 'errors', 'noValidate'],
    data() {
        return {
            'has_error': false,
            'error_message': null
        }
    },
    created() {
        setCodeForValidation.call(this);
        setInitError.call(this);
    },
    computed: {
        parsedLabel: parsedLabel
    },
    methods: {
        isRequired: function () {
            return !_.isUndefined(this.required) && !this.hasFile;
        },
        generateFieldId: generateFieldId,
        generateFieldName: generateFieldName,
        changeFile: function () {
            onInput.call(this);
        }
    }
};
</script>

<style lang="sass" scoped>
.form-group {
    overflow: hidden;
}
</style>
