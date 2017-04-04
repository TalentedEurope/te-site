<template>
    <div class="remove-account-wrapper">
        <button type="button" class="btn btn-remove-account" @click="openConfirm()">
            <i class="fa fa-times" aria-hidden="true"></i> {{ $t('reg-profile.remove_account_button') }}
        </button>
    </div>
</template>

<script>
export default {
    methods: {
        openConfirm: function () {
            $.confirm({
                title: null,
                content: TE.translations['reg-profile']['remove_account_confirm'],
                backgroundDismiss: true,
                buttons: {
                    remove_account_button_cancel: {
                        text: TE.translations['reg-profile']['remove_account_button_cancel'],
                        action: function() {
                            return true;
                        }
                    },
                    remove_account_button_ok: {
                        text: TE.translations['reg-profile']['remove_account_button_ok'],
                        btnClass: 'btn-info',
                        action: function() {
                            location.href = '/profile/quit';
                        }
                    },
                }
            });
        }
    }
};
</script>

<style lang="sass" scoped>
.remove-account-wrapper {
    margin-top: 15px;
}
.btn-remove-account {
    background: transparent;
    border: 0;
    color: #887c7c;

    &:hover, &:focus {
        color: rgb(231, 76, 60);
    }

    i {
        margin-right: 3px;
    }
}

@media (min-width: 480px) {
    .remove-account-wrapper {
        float: right;
        margin-top: 0;
    }
}
</style>
