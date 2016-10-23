import Vue from 'vue';
import VueResource from 'vue-resource';
import _ from 'lodash';

import Search from './components/search/Main.vue';
import Nudges from './components/nudges/Main.vue';
import Validators from './components/validators/Main.vue';
import StudentsValidation from './components/students-validation/Main.vue';
import CompanyProfileView from './components/profile/company/view/Main.vue';
import StudentProfileView from './components/profile/student/view/Main.vue';
import ValidatorProfileView from './components/profile/validator/view/Main.vue';
import SelectForm from './components/profile/SelectForm.vue';
import TextAreaForm from './components/profile/TextAreaForm.vue';
import TextBoxForm from './components/profile/TextBoxForm.vue';
import PersonalSkillsForm from './components/profile/PersonalSkillsForm.vue';


new Vue({
    el: '.v-container',
    components: {
        Search, Nudges, StudentsValidation, Validators,
        CompanyProfileView, StudentProfileView, ValidatorProfileView,
        SelectForm, TextAreaForm, TextBoxForm, PersonalSkillsForm },
})
