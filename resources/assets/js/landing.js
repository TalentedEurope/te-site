conditionizr.add('android', /android/i.test(navigator.userAgent));
conditionizr.config({
    tests: {
        'ios': ['class'],
        'android': ['class'],
    }
});

$(document).ready(function(){
    var search = function () {
        var search_type = document.getElementById('search-type').value || 'students';
        var url = '/search/' + search_type + '/';

        var search_text = document.getElementById('search-text').value;
        if (search_text) {
            url += '?search=' + search_text;
        }
        window.location = url;
    }

    $('#search-text').keypress(function(event) {
        if (event.which == 13) {
            event.preventDefault();
            search();
        }
    });

    $('#search-button').click(function() {
        search();
    });


    // CAROUSEL OF LOGOS
    var carousel_settings = {
        infinite: true,
        slidesToShow: 6,
        slidesToScroll: 6,
        responsive: [
            {
                breakpoint: 900,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                }
            },
            {
                breakpoint: 560,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 400,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    };
    $('.companies-logos').slick(carousel_settings);
    $('.institutions-logos').slick(carousel_settings);
});
