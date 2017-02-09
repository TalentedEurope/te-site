import Vue from 'vue';
import VueI18n from 'vue-i18n';
import SearchBar from './components/search/SearchBar.vue';


Vue.use(VueI18n);
Vue.config.lang = 'en';
Vue.locale('en', TE.translations.en);

if (document.querySelector('.v-container')) {
    new Vue({
        el: '.v-container',
        components: {
            'search-bar': SearchBar,
        }
    })
}


conditionizr.add('android', /android/i.test(navigator.userAgent));
conditionizr.config({
    tests: {
        'ios': ['class'],
        'android': ['class'],
    }
});


$(document).ready(function(){
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
