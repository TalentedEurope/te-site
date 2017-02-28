<template>
    <div class="form-group" v-bind:class="{ 'alert alert-danger': has_error }">
        <!-- <label :for="generateFieldId()">{{label}}</label> -->
        <div class="select-holder">
            <select v-if="!relatedOptions" class="form-control" :id="generateFieldId()" :name="generateFieldName()" v-model="value"
                    @input="onInput" @blur="onBlur" :disabled="disabled" :required="required">
                <option value="">{{ parsedPlaceholder }}</option>
                <option v-for="(v_code, v_name) in parsedValues" :value="v_code">{{ v_name }}</option>
            </select>

            <select v-if="relatedOptions" class="form-control" :id="generateFieldId()" :name="generateFieldName()" v-model="value"
                    @input="onInput" @blur="onBlur" :disabled="disabled" :required="required">
                <option value="">{{ parsedPlaceholder }}</option>
                <optgroup :label="group_name" v-for="(group_name, options) in parsedValues">
                    <option v-for="(v_code, v_name) in options" :value="v_code">{{ v_name }}</option>
                </optgroup>
            </select>
        </div>
        <span v-if="has_error" class="help-block">
            <strong>{{error_message}}</strong>
        </span>
    </div>
</template>

<script>
import { parsedPlaceholder, setDebounced, setCodeForValidation, setInitError, generateFieldId, generateFieldName, validateField, onInput, onBlur } from './form-helpers';
import EventBus from 'event-bus.js';

export default {
    props: ['code', 'groupCode', 'groupId', 'label', 'placeholder', 'values', 'parsedValues', 'value', 'relatedOptions', 'disabled', 'required', 'errors', 'noValidate', 'emitEvent'],
    data() {
        return {
            'has_error': false,
            'error_message': null,
            'initial_change': false,
        }
    },
    created() {
        if (_.isNull(this.parsedValues) || _.isUndefined(this.parsedValues)) {
            this.parsedValues = JSON.parse(this.values);
            this.initial_change = true;
        }

        setDebounced.call(this);
        setCodeForValidation.call(this);
        setInitError.call(this);
    },
    ready() {
        if (_.isNull(this.value) || _.isUndefined(this.value)) {
            this.value = '';
            this.initial_change = true;
        }
    },
    computed: {
        parsedPlaceholder: parsedPlaceholder
    },
    methods: {
        validateField: validateField,
        generateFieldId: generateFieldId,
        generateFieldName: generateFieldName,
        onInput: onInput,
        onBlur: onBlur
    },
    watch: {
        parsedValues: function (values) {
            if (_.isEmpty(values)) {
                this.value = '';
            }
        },
        value: function (value) {
            if (this.initial_change) {
                this.initial_change = false;
                return;
            }
            EventBus.$emit(`onSelectChange-${this.code}`, this.value);
        }
    }
};
</script>
