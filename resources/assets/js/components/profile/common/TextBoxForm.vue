<template>
    <div class="form-group" v-bind:class="{ 'alert alert-danger': has_error }">
        <!-- <label :for="code">{{label}}</label> -->
        <input v-if="input_type == 'text'" type="text" class="form-control" :id="code" :name="code" :placeholder="placeholder" v-model="model" :readonly="readonly"/>
        <input v-if="input_type == 'email'" type="email" class="form-control" :id="code" :name="code" :placeholder="placeholder" v-model="model" :readonly="readonly"/>
        <input v-if="input_type == 'password'" type="password" class="form-control" :id="code" :name="code" :placeholder="placeholder" v-model="model" :readonly="readonly"/>

        <span v-if="has_error" class="help-block">
            <strong>{{error_message}}</strong>
        </span>
    </div>
</template>

<script>
import { setDebounced, validateField, modelWatch} from './form-helpers'

export default {
    props: ['code', 'label', 'placeholder', 'type', 'value', 'hasError', 'error', 'readonly'],
    data() {
        return {
            'model': this.value,
            'has_error': this.hasError,
            'error_message': this.error,
            'input_type': this.type || 'text',
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
