<template>
    <div class="form-group" v-bind:class="{ 'alert alert-danger': has_error }">
        <!-- <label :for="code">{{label}}</label> -->
        <div class="select-holder">
            <select class="form-control" :id="code" :name="generateFieldName()" v-model="model">
                <option value="">{{placeholder}}</option>
                <option v-for="(v_name, v_code) in parsed_values" :value="v_code">{{ v_name }}</option>
            </select>
        </div>
        <span v-if="has_error" class="help-block">
            <strong>{{error_message}}</strong>
        </span>
    </div>
</template>

<script>
import { setDebounced, setInitError, generateFieldName, validateField, modelWatch} from './form-helpers'

export default {
    props: ['code', 'groupCode', 'groupId', 'label', 'placeholder', 'values', 'value', 'errors'],
    data() {
        return {
            'model': this.value,
            'has_error': this.hasError,
            'error_message': this.error,
            'parsed_values': []
        }
    },
    mounted() {
        this.parsed_values = JSON.parse(this.values);
    },
    created() {
        setDebounced.call(this);
        setInitError.call(this);
    },
    methods: {
        validateField: validateField,
        generateFieldName: generateFieldName,
    },
    watch: {
        model: modelWatch
    }
};
</script>
