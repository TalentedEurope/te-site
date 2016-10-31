<template>
    <div class="form-group" v-bind:class="{ 'alert alert-danger': has_error }">
        <label :for="code">{{label}}</label>
        <input type="date" class="form-control" :id="code" :name="generateFieldName()" :placeholder="placeholder" :value="value" @input="onInput" :readonly="readonly"/>

        <span v-if="has_error" class="help-block">
            <strong>{{error_message}}</strong>
        </span>
    </div>
</template>

<script>
import { setDebounced, setCodeForValidation, setInitError, generateFieldName, validateField, onInput } from './form-helpers';

export default {
    props: ['code', 'groupCode', 'groupId', 'label', 'placeholder', 'value', 'errors', 'readonly'],
    data() {
        return {
            'has_error': false,
            'error_message': '',
            'code_for_validation': '',
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
