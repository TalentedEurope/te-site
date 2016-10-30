<template>
    <button class="pull-right remove btn-danger btn btn-sm" @click.prevent="removeItem()">
        <i class="fa fa-close" aria-hidden="true"></i> remove
    </button>
</template>

<script>
export default {
    props: ['item', 'items'],
    methods: {
        removeItem: function () {
            var index = this.items.indexOf(this.item);
            if (index > -1) {
                this.items.splice(index, 1);
            }
        }
    }
};
</script>
