import Vue from 'vue';
import VueResource from 'vue-resource';
import _ from 'lodash';

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
import Studies from './components/profile/student/Studies.vue';
import Trainings from './components/profile/student/Trainings.vue';
import Languages from './components/profile/student/Languages.vue';
import Experiences from './components/profile/student/Experiences.vue';
import AlertButton from './components/common/AlertButton.vue';


new Vue({
    el: '.v-container',
    components: {
        Search, Alerts, Validators, StudentsValidation,
        SelectForm, TextAreaForm, TextBoxForm, PersonalSkillsForm, FileForm, DateForm,
        Studies, Trainings, Languages, Experiences,
        AlertButton },
})
