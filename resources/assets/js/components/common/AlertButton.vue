<template>
    <div v-if="showAlertButton()">
        <button class="btn btn-primary btn-alert btn-lg" @click="sendAlert()">
            <i class="fa fa-bell" aria-hidden="true"></i> I'm here!
        </button>
        <button class="btn btn-primary btn-tooltip btn-lg" data-toggle="tooltip" :data-placement="placement" title="" data-original-title="Tell the company that you may be interested to work for them"> ? </button>
    </div>
</template>

<script>
import { alertsResource } from '../../resources/alerts';

export default {
    props: ['companyId', 'placement'],
    data() {
        return {
            sending: false,
        }
    },
    mounted: function () {
        $(this.$el).find('[data-toggle="tooltip"]').tooltip();
    },
    methods: {
        showAlertButton: function () {
            return $("meta[id='user_type']").attr('content') == 'student';
        },
        sendAlert: function () {
            if (this.sending) {
                return;
            }
            this.sending = true;
            alertsResource.post(this.companyId)
                .then((response) => {
                    console.log(response);
                }, (response) => {
                    if (response.status == 429) {
                        alert("too many requests");
                    }
                    console.log(response);
                })
                .finally(() => {
                    this.sending = false;
                });
        }
    }
}
</script>

<style lang="sass" scope>
@import "resources/assets/sass/variables";

.btn-alert .fa {
    padding-right: 5px;
}
.btn-tooltip {
    border-radius: 40px;
    width: 30px;
    height: 30px;
    line-height: 30px;
    background: $yellow;
    font-weight: bold;
    font-size: 18px;
    padding: 0;
    border: none;
    margin-left: 10px;

    &:hover, &:focus, &:active {
        background: $yellow-light;
    }
}
</style>
