<template>
    <div class="form-group" v-bind:class="{ 'alert alert-danger': has_error }">
        <!-- <label :for="code">{{label}}</label> -->
        <div class="select-holder">
            <select class="form-control" :id="code" :name="generateFieldName()" v-model="value" @input="onInput">
                <option value="">{{placeholder}}</option>
                <option v-for="(v_code, v_name) in parsed_values" :value="v_code">{{ v_name }}</option>
            </select>
        </div>
        <span v-if="has_error" class="help-block">
            <strong>{{error_message}}</strong>
        </span>
    </div>
</template>

<script>
import { setDebounced, setCodeForValidation, setInitError, generateFieldName, validateField, onInput } from './form-helpers';

export default {
    props: ['code', 'groupCode', 'groupId', 'label', 'placeholder', 'values', 'value', 'errors', 'noValidate'],
    data() {
        return {
            'parsed_values': JSON.parse(this.values),
            'has_error': false,
            'error_message': null
        }
    },
    ready() {
        if (_.isNull(this.value) || _.isUndefined(this.value)) {
            this.value = '';
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
