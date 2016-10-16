conditionizr.add('android', /android/i.test(navigator.userAgent));
conditionizr.config({
    tests: {
        'ios': ['class'],
        'android': ['class'],
    }
});

window.onload = function(){
    var counter = Doom({
        targetDate: '02/28/2017'
    });

    counter.doom();
};
