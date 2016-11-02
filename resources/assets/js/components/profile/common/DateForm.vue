<template>
    <div class="form-group" v-bind:class="{ 'alert alert-danger': has_error }">
        <label :for="code">{{label}}</label>
        <input class="form-control" type="text" :id="generateFieldId()" :name="generateFieldName()" :placeholder="placeholder" :value="value" data-input/>

        <span v-if="has_error" class="help-block">
            <strong>{{error_message}}</strong>
        </span>
    </div>
</template>

<script>
import { setDebounced, setCodeForValidation, setInitError, generateFieldId, generateFieldName, validateField, onInput } from './form-helpers';

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
        this.$nextTick(function () {
            this.datepicker = document.getElementById(this.generateFieldId()).flatpickr({
                altInput: true,
                altFormat: 'd/m/Y',
                altInputClass: 'form-control',
                onChange: (selectedDates, dateStr, instance) => {
                    this.value = dateStr;
                },
            });
        });

        setDebounced.call(this);
        setCodeForValidation.call(this);
        setInitError.call(this);
    },
    methods: {
        validateField: validateField,
        generateFieldId: generateFieldId,
        generateFieldName: generateFieldName,
        onInput: onInput
    },
    watch: {
        value: onInput
    }
};
</script>
