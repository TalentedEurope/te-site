<template>
    <div class="form-group" v-bind:class="{ 'alert alert-danger': has_error }">
        <label :for="code">{{label}}</label>
        <textarea type="text" class="form-control" :id="code" :name="code" :placeholder="placeholder" v-model="model"></textarea>

        <span v-if="has_error" class="help-block">
            <strong>{{error_message}}</strong>
        </span>
    </div>
</template>

<script>
import { setDebounced, validateField, modelWatch} from './form-helpers'

export default {
    props: ['code', 'label', 'placeholder', 'value', 'hasError', 'error'],
    data() {
        return {
            'model': this.value,
            'has_error': this.hasError,
            'error_message': this.error
        }
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
