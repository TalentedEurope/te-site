<template>
    <div class="form-group" v-bind:class="{ 'alert alert-danger': has_error }">
        <label :for="generateFieldId()">{{ parsedLabel }}</label>
        <textarea type="text" class="form-control" :id="generateFieldId()" :name="generateFieldName()"
            :placeholder="placeholder" v-model="value" @input="onInput" @onBlur="onBlur" :required="required"></textarea>

        <span v-if="has_error" class="help-block">
            <strong>{{error_message}}</strong>
        </span>
    </div>
</template>

<script>
import { parsedLabel, setDebounced, setCodeForValidation, setInitError, generateFieldId, generateFieldName, validateField, onInput, onBlur } from './form-helpers'

export default {
    props: ['code', 'groupCode', 'groupId', 'label', 'placeholder', 'value', 'required', 'errors', 'noValidate'],
    data() {
        return {
            has_error: false,
            error_message: null
        }
    },
    created() {
        setDebounced.call(this);
        setCodeForValidation.call(this);
        setInitError.call(this);
    },
    computed: {
        parsedLabel: parsedLabel
    },
    methods: {
        validateField: validateField,
        generateFieldId: generateFieldId,
        generateFieldName: generateFieldName,
        onInput: onInput,
        onBlur: onBlur
    }
};
</script>
