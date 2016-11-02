<template>
    <div class="form-group" v-bind:class="{ 'alert alert-danger': has_error }">
        <label :for="code">{{label}}</label>
        <textarea type="text" class="form-control" :id="code" :name="generateFieldName()" :placeholder="placeholder" v-model="value" @input="onInput"></textarea>

        <span v-if="has_error" class="help-block">
            <strong>{{error_message}}</strong>
        </span>
    </div>
</template>

<script>
import { setDebounced, setCodeForValidation, setInitError, generateFieldName, validateField, onInput } from './form-helpers'

export default {
    props: ['code', 'groupCode', 'groupId', 'label', 'placeholder', 'value', 'errors', 'noValidate'],
    data() {
        return {
            'has_error': false,
            'error_message': null
        }
    },
    created() {
        setDebounced.call(this);
        setCodeForValidation.call(this);
        setInitError.call(this);
    },
    methods: {
        validateField: validateField,
        generateFieldName: generateFieldName,
        onInput: onInput
    }
};
</script>
