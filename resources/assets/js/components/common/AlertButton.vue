<template>
    <div v-show="show_alert_button" v-bind:class="{ 'disabled': disabled }">
        <button class="btn btn-disabled btn-alert btn-lg" @click="sendAlert()" :disabled="disabled" v-bind:class="{ 'btn-primary': !disabled }">
            <i class="fa fa-bell" aria-hidden="true"></i> {{ $t('reg-profile.im_here') }}
        </button>
        <button class="btn btn-primary btn-tooltip btn-lg" data-toggle="tooltip" :data-placement="placement" title="" :data-original-title="tooltip_text"> ? </button>
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
            disabled: !this.alertable,
            tooltip_text: '',
            profile_is_filled: TE.profile_is_filled
        }
    },
    ready: function () {
        this.setTooltipText();

        $(this.$el).find('[data-toggle="tooltip"]').tooltip();

        this.$on('disableAlerts', () => {
            this.disabled = true;
        });
    },
    methods: {
        setTooltipText: function () {
            if (this.disabled) {
                this.tooltip_text = this.$t('reg-profile.cannot_send_more_alerts_to_this_company_today');
            } else {
                this.tooltip_text = this.$t('reg-profile.tell_the_company_that_you_be_interested');
            }
        },
        sendAlert: function () {
            if (!this.profile_is_filled) {
                this.showToastCantSendAlertsUntilProfileIsFilled();
                return;
            }

            if (this.sending) {
                return;
            }
            this.sending = true;
            alertsResource.post(this.companyId)
                .then((response) => {
                    this.disabled = true;
                    this.showToastAlertSentSuccessfully();
                    EventBus.$emit('onAlert', '');
                }, (errorResponse) => {
                    if (errorResponse.status == 429) {
                        this.disabled = true;
                        this.showToastAlreadySentAlertToThisCompany()
                    } else if (errorResponse.status == 403) {
                        this.showToastCantSendAlertsUntilProfileIsFilled()
                    } else {
                        defaultErrorToast();
                    }
                })
                .finally(() => {
                    this.sending = false;
                });
        },
        showToastCantSendAlertsUntilProfileIsFilled: function () {
            $.toast({
                text : this.$t('reg-profile.cant_send_alerts_until_you_fill_the_profile'),
                showHideTransition : 'fade',
                bgColor : '#d87135',
                textColor : '#FFFFFF',
                allowToastClose : true,
                hideAfter : false,
                stack : false,
                loader: false,
                textAlign : 'center',
                position : 'top-center'
            });
        },
        showToastAlertSentSuccessfully: function () {
            $.toast({
                text : this.$t('reg-profile.alert_sent_successfully'),
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
        },
        showToastAlreadySentAlertToThisCompany: function () {
            $.toast({
                text : this.$t('reg-profile.you_have_already_sent_an_alert_to_this_company'),
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
        }
    },
    watch: {
        disabled: function (value) {
            this.setTooltipText();
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
