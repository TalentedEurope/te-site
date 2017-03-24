var defaultErrorToast = function () {
    jQuery.toast({
        text : TE.translations['error-page']['an_error_happened'],
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
