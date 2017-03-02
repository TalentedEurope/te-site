<template>
    <button class="pull-right remove btn-danger btn btn-sm" @click.prevent="removeItem()" v-if="!item.locked">
        <i class="fa fa-close" aria-hidden="true"></i> remove
    </button>
</template>

<script>
import EventBus from 'event-bus.js';

export default {
    props: ['item', 'items', 'groupName'],
    methods: {
        removeItem: function () {
            var index = this.items.indexOf(this.item);
            if (index > -1) {
                this.items.splice(index, 1);
                if (this.groupName) {
                    EventBus.$emit(`onRemove${this.groupName}`, this.item);
                }
            }
            TE.profile.modified_fields = true;
        }
    }
};
</script>
