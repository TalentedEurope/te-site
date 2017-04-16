<template>
    <div class="birthdate-form form-group" v-bind:class="{ 'alert alert-danger': has_error }">
        <label :for="generateFieldId()">{{ parsedLabel }}</label>

        <div>
            <div class="form-inline select-holder">
                <input type="text" class="form-control" id="birthdate" data-format="YYYY-MM-DD" data-template="D MMMM YYYY" name="birthdate" :value="value">
            </div>
        </div>

        <span v-if="has_error" class="help-block">
            <strong>{{error_message}}</strong>
        </span>
    </div>
</template>

<script>
import { parsedLabel, setDebounced, setCodeForValidation, setInitError, generateFieldId, generateFieldName, validateField, onInput } from '../common/form-helpers';

export default {
    props: ['code', 'groupCode', 'groupId', 'label', 'placeholder', 'value', 'readonly', 'required', 'errors', 'noValidate'],
    data() {
        return {
            'has_error': false,
            'error_message': null
        }
    },
    created() {
        this.$nextTick(function () {
            $('#birthdate').combodate({
                'firstItem': 'name',
                'smartDays': true,
                'customClass': 'form-control',
                'maxYear': 2005
            });
        });

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
    },
    watch: {
        value: onInput
    }
};
</script>

<style lang="sass">
.birthdate-form {
    .select-holder {
        display: inline-block;
    }

    select.form-control {
        display: inline-block;
        margin-right: 15px;

        &:last-child {
            margin-right: 0;
        }
    }
}
</style>
