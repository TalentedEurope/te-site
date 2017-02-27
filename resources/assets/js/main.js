import Vue from 'vue';
import VueI18n from 'vue-i18n';
import VueResource from 'vue-resource';
import _ from 'lodash';

require('jquery-toast-plugin/dist/jquery.toast.min.css');
require('jquery-toast-plugin/dist/jquery.toast.min.js');

require('jquery-confirm/dist/jquery-confirm.min.css');
require('jquery-confirm/dist/jquery-confirm.min.js');

require('flatpickr/dist/flatpickr.min.css');
var Flatpickr = require('flatpickr/dist/flatpickr.min.js');
Flatpickr.l10n.firstDayOfWeek = 1;

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
import ProfessionalSkills from './components/profile/student/ProfessionalSkills.vue';
import Studies from './components/profile/student/Studies.vue';
import Trainings from './components/profile/student/Trainings.vue';
import Languages from './components/profile/student/Languages.vue';
import Experiences from './components/profile/student/Experiences.vue';
import FindYourSchool from './components/profile/student/FindYourSchool.vue';
import AlertButton from './components/common/AlertButton.vue';


Vue.use(VueI18n);
Vue.config.lang = 'en';
Vue.locale('en', TE.translations.en);

if (document.querySelector('.v-container')) {
    new Vue({
        el: '.v-container',
        components: {
            Search, Alerts, Validators, StudentsValidation,
            SelectForm, TextAreaForm, TextBoxForm, PersonalSkillsForm, FileForm, DateForm,
            ProfessionalSkills, Studies, Trainings, Languages, Experiences, FindYourSchool,
            AlertButton },
    })
}
