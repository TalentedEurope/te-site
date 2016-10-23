<template>
    <div class="form-group" v-bind:class="{ 'alert alert-danger': has_error }">
        <!-- <label :for="code">{{label}}</label> -->
        <div class="select-holder">
            <select class="form-control" :id="code" :name="code" v-model="model">
                <option :value="null">{{placeholder}}</option>
                <option v-for="(v_name, v_code) in parsed_values" :value="v_code">{{ v_name }}</option>
            </select>
        </div>
        <span v-if="has_error" class="help-block">
            <strong>{{error_message}}</strong>
        </span>
    </div>
</template>

<script>
import { setDebounced, validateField, modelWatch} from './form-helpers'

export default {
    props: ['code', 'label', 'placeholder', 'values', 'value', 'hasError', 'error'],
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
    },
    methods: {
        validateField: validateField
    },
    watch: {
        model: modelWatch
    }
};
</script>
