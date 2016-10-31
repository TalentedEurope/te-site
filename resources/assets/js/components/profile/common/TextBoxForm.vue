<template>
    <div class="form-group" v-bind:class="{ 'alert alert-danger': has_error, 'hidden-type': input_type == 'hidden' }">
        <!-- <label :for="code">{{label}}</label> -->
        <input v-if="input_type == 'text'" type="text" class="form-control" :id="code" :name="generateFieldName()" :placeholder="placeholder" :value="value" @input="onInput" :readonly="readonly"/>
        <input v-if="input_type == 'email'" type="email" class="form-control" :id="code" :name="generateFieldName()" :placeholder="placeholder" :value="value" @input="onInput" :readonly="readonly"/>
        <input v-if="input_type == 'password'" type="password" class="form-control" :id="code" :name="generateFieldName()" :placeholder="placeholder" :value="value" @input="onInput" :readonly="readonly"/>
        <input v-if="input_type == 'hidden'" type="hidden" class="form-control" :id="code" :name="generateFieldName()" :placeholder="placeholder" :value="value" @input="onInput" :readonly="readonly"/>

        <span v-if="has_error" class="help-block">
            <strong>{{error_message}}</strong>
        </span>
    </div>
</template>

<script>
import { setDebounced, setCodeForValidation, setInitError, generateFieldName, validateField, onInput } from './form-helpers'

export default {
    props: ['code', 'groupCode', 'groupId', 'label', 'placeholder', 'type', 'value', 'errors', 'readonly'],
    data() {
        return {
            'has_error': false,
            'error_message': '',
            'code_for_validation': '',
            'input_type': this.type || 'text',
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

<style lang="sass" scoped>
.form-group.hidden-type {
    margin: 0;
}
</style>
