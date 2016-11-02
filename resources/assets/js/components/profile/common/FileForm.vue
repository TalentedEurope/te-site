<template>
    <div class="form-group" v-bind:class="{ 'alert alert-danger': has_error }">
        <label :for="code">{{ label }}</label>
        <input type="file" :id="generateFieldId()" :name="generateFieldName()" :filename="code" @change="changeFile()"/>
        <p class="download-button h4" v-if="hasFile">
            <a class="btn btn-primary" :alt="downloadText" :href="fileUrl">
                <i class="fa fa-cloud-download" aria-hidden="true"></i> {{ downloadText }}
            </a>
        </p>
        <span v-if="has_error" class="help-block">
            <strong>{{error_message}}</strong>
        </span>
    </div>
</template>

<script>
import { setCodeForValidation, setInitError, generateFieldId, generateFieldName, onInput } from './form-helpers';

export default {
    props: ['code', 'label', 'groupCode', 'groupId', 'downloadText', 'hasFile', 'fileUrl', 'errors', 'noValidate'],
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
    methods: {
        generateFieldId: generateFieldId,
        generateFieldName: generateFieldName,
        changeFile: function () {
            onInput.call(this);
        }
    }
};
</script>
