var defaultErrorToast = function () {
    jQuery.toast({
        text : 'An error happened, administrators have been notified and this issue will be fixed soon, please try later.',
        showHideTransition : 'fade',
        bgColor : '#bf433c',
        textColor : '#FFFFFF',
        allowToastClose : true,
        hideAfter : false,
        stack : false,
        loader: false,
        textAlign : 'center',
        position : 'top-center'
    })
};

export var defaultErrorToast = defaultErrorToast;
