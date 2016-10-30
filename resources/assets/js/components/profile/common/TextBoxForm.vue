<template>
    <div class="form-group" v-bind:class="{ 'alert alert-danger': has_error }">
        <!-- <label :for="code">{{label}}</label> -->
        <input v-if="input_type == 'text'" type="text" class="form-control" :id="code" :name="generateFieldName()" :placeholder="placeholder" v-model="model" :readonly="readonly"/>
        <input v-if="input_type == 'email'" type="email" class="form-control" :id="code" :name="generateFieldName()" :placeholder="placeholder" v-model="model" :readonly="readonly"/>
        <input v-if="input_type == 'password'" type="password" class="form-control" :id="code" :name="generateFieldName()" :placeholder="placeholder" v-model="model" :readonly="readonly"/>
        <input v-if="input_type == 'hidden'" type="hidden" class="form-control" :id="code" :name="generateFieldName()" :placeholder="placeholder" v-model="model" :readonly="readonly"/>

        <span v-if="has_error" class="help-block">
            <strong>{{error_message}}</strong>
        </span>
    </div>
</template>

<script>
import { setDebounced, setInitError, generateFieldName, validateField, modelWatch} from './form-helpers'

export default {
    props: ['code', 'groupCode', 'groupId', 'label', 'placeholder', 'type', 'value', 'errors', 'readonly'],
    data() {
        return {
            'model': this.value,
            'has_error': false,
            'error_message': '',
            'input_type': this.type || 'text',
        }
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
