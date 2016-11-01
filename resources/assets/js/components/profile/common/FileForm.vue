<template>
    <div class="form-group">
        <label :for="code">{{ label }}</label>
        <input type="file" :id="generateFieldId()" :name="generateFieldName()" :filename="code"/>
        <p class="download-button h4" v-if="fileUrl">
            <a class="btn btn-primary" :alt="downloadText" :href="fileUrl">
                <i class="fa fa-cloud-download" aria-hidden="true"></i> {{ downloadText }}
            </a>
        </p>
    </div>
</template>

<script>
import { generateFieldId, generateFieldName } from './form-helpers';
export default {
    props: ['code', 'label', 'groupCode', 'groupId', 'downloadText', 'fileUrl'],
    methods: {
        generateFieldId: generateFieldId,
        generateFieldName: generateFieldName,
    },
};
</script>
