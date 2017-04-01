import Vue from 'vue';
import VueI18n from 'vue-i18n';
import VueResource from 'vue-resource';
import _ from 'lodash';

require('jquery-toast-plugin/dist/jquery.toast.min.css');
require('jquery-toast-plugin/dist/jquery.toast.min.js');

require('jquery-confirm/dist/jquery-confirm.min.css');
require('jquery-confirm/dist/jquery-confirm.min.js');

import moment from 'moment';
window.moment = moment;
moment.locale(TE.locale);

require('./libs/combodate-1.1.0/combodate.js');

require('flatpickr/dist/flatpickr.min.css');
var Flatpickr = require('flatpickr/dist/flatpickr.min.js');

import {es as Spanish} from 'flatpickr/dist/l10n/es.js';
import {it as Italian} from 'flatpickr/dist/l10n/it.js';
import {de as German} from 'flatpickr/dist/l10n/de.js';
import {fr as French} from 'flatpickr/dist/l10n/fr.js';
import {sk as Slovak} from './helpers/flatpickr.l10n.sk.js';

Flatpickr.l10ns.en.firstDayOfWeek = 1;

var locales = {'es': Spanish, 'it': Italian, 'de': German, 'fr': French, 'sk': Slovak}
if (TE.locale in locales) {
    Flatpickr.localize(locales[TE.locale]);
}

import Search from './components/search/Main.vue';
import Alerts from './components/alerts/Main.vue';
import Validators from './components/validators/Main.vue';
import StudentsValidation from './components/students-validation/Main.vue';
import SelectForm from './components/profile/common/SelectForm.vue';
import TextAreaForm from './components/profile/common/TextAreaForm.vue';
import TextBoxForm from './components/profile/common/TextBoxForm.vue';
import PersonalSkillsForm from './components/profile/common/PersonalSkillsForm.vue';
import FileForm from './components/profile/common/FileForm.vue';
import DateForm from './components/profile/common/DateForm.vue';
import BirthdateForm from './components/profile/student/BirthdateForm.vue';
import ProfessionalSkills from './components/profile/student/ProfessionalSkills.vue';
import Studies from './components/profile/student/Studies.vue';
import Trainings from './components/profile/student/Trainings.vue';
import Languages from './components/profile/student/Languages.vue';
import Experiences from './components/profile/student/Experiences.vue';
import RequestValidation from './components/profile/student/RequestValidation.vue';
import AlertButton from './components/common/AlertButton.vue';


Vue.use(VueI18n);
Vue.config.lang = 'translations';
Vue.locale('translations', TE.translations);

if (document.querySelector('.v-container')) {
    new Vue({
        el: '.v-container',
        components: {
            Search, Alerts, Validators, StudentsValidation,
            SelectForm, TextAreaForm, TextBoxForm, PersonalSkillsForm, FileForm, DateForm, BirthdateForm,
            ProfessionalSkills, Studies, Trainings, Languages, Experiences, RequestValidation,
            AlertButton },
    })
}

$(function() {
    var get_confirm_config = function (form) {
        return {
            title: TE.translations['students-validation']['confirm_validation'],
            content: TE.translations['students-validation']['are_you_sure_you_want_to_finish_refereeing'],
            backgroundDismiss: true,
            buttons: {
                yes: {
                    text: TE.translations['global']['yes'],
                    btnClass: 'btn-info',
                    action: function() {
                        form.submit();
                        return true;
                    }
                },
                no: {
                    text: TE.translations['global']['no'],
                }
            }
        }
    };
    $('.finish-validation-button').on('click', function () {
        var confirm_config = get_confirm_config($(this).parents('form'));
        $.confirm(confirm_config);
    });
});
