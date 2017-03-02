<template>
    <div v-show="show_alert_button" v-bind:class="{ 'disabled': disabled }">
        <button class="btn btn-disabled btn-alert btn-lg" @click="sendAlert()" :disabled="disabled" v-bind:class="{ 'btn-primary': !disabled }">
            <i class="fa fa-bell" aria-hidden="true"></i> I'm here!
        </button>
        <button class="btn btn-primary btn-tooltip btn-lg" :disabled="disabled" data-toggle="tooltip" :data-placement="placement" title="" data-original-title="Tell the company that you may be interested to work for them"> ? </button>
    </div>
</template>

<script>
import { alertsResource } from '../../resources/alerts';
import { defaultErrorToast } from 'errors-handling.js';
import EventBus from 'event-bus.js';

export default {
    props: ['companyId', 'alertable', 'placement'],
    data() {
        return {
            sending: false,
            show_alert_button: $("meta[id='user_type']").attr('content') == 'student',
            disabled: !this.alertable
        }
    },
    ready: function () {
        $(this.$el).find('[data-toggle="tooltip"]').tooltip();

        this.$on('disableAlerts', () => {
            this.disabled = true;
        });
    },
    methods: {
        sendAlert: function () {
            if (this.sending) {
                return;
            }
            this.sending = true;
            alertsResource.post(this.companyId)
                .then((response) => {
                    this.disabled = true;
                    $.toast({
                        text : 'Alert sent successfully to the company',
                        showHideTransition : 'fade',
                        bgColor : '#31B47D',
                        textColor : '#FFFFFF',
                        allowToastClose : false,
                        hideAfter : 2500,
                        stack : false,
                        loader: false,
                        textAlign : 'center',
                        position : 'top-center'
                    });
                    EventBus.$emit('onAlert', '');
                }, (errorResponse) => {
                    if (errorResponse.status == 429) {
                        this.disabled = true;
                        $.toast({
                            text : 'You have already sent an alert to this company',
                            showHideTransition : 'fade',
                            bgColor : '#bf433c',
                            textColor : '#FFFFFF',
                            allowToastClose : true,
                            hideAfter : false,
                            stack : false,
                            loader: false,
                            textAlign : 'center',
                            position : 'top-center'
                        });
                    } else {
                        defaultErrorToast();
                    }
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

.disabled {
    .btn-tooltip {
        &, &:hover, &:focus, &:active {
            background: $dark-gray;
        }
    }
}
</style>
