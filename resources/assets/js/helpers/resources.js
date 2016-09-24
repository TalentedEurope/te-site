import Vue from 'vue';
import VueResource from 'vue-resource';

const API_BASE = 'http://te-site.dev';

Vue.use(VueResource);

Vue.http.options = {
    root: API_BASE
};

Vue.http.interceptors.push((request, next) => {
    next((response) => {
        if (response.status === 404) {
            console.log("Handle 404");
        }
    });
});

var StudentsResultsResource = {
    get: () => {
        return new Promise((resolve, reject) => {
            var student = {
                title: 'John Doe',
                lives_in: 'Spain',
                studied: 'Doctorate in Lorem ipsum dolor sit amet Consectetuor',
                studied_in: 'IES Puerto de la Cruz Telesforo Bravo',
                skills: [
                    {name: 'Lorem ipsum', important: true},
                    {name: 'Dolor sit amet', important: false},
                    {name: 'Consectetur adipiscing elit', important: false}],
                languages: ['Spanish', 'English', 'French'],
                photo: 'http://placekitten.com/g/150/150',
                validated: true
            }
            resolve([student, student, student, student]);
        })
    }
};

var CompaniesResultsResource = {
    get: () => {
        return new Promise((resolve, reject) => {
            var company = {
                title: 'John Doe LLC.',
                info: 'Company Sector',
                we_are_in: 'Santa Cruz de Tenerife, Spain.',
                talent_is: 'Jelly apple pie icing. Jelly cupcake tiramisu jelly beans marzipan. Cheesecake jelly-o jelly tootsie roll biscuit chocolate macaroon marshmallow. Jelly-o marshmallow tart donut brownie chocolate topping chocolate cake.',
                skills: [
                    {name: 'Lorem ipsum'},
                    {name: 'Dolor sit amet'},
                    {name: 'Consectetur adipiscing elit'}],
                photo: 'http://placebear.com/g/150/150',
            }
            resolve([company, company, company, company]);
        })
    }
};

var LevelOfStudiesResource = {
    get: () => {
        return new Promise((resolve, reject) => {
            resolve([
                {code: '1', name: 'Study level 1'},
                {code: '2', name: 'Study level 2'},
                {code: '3', name: 'Study level 3'},
            ]);
        })
    }
};

var FieldOfStudiesResource = {
    get: () => {
        return new Promise((resolve, reject) => {
            resolve([
                {code: '1', name: 'Field of studies 1'},
                {code: '2', name: 'Field of studies 2'},
                {code: '3', name: 'Field of studies 3'},
            ]);
        })
    }
};

var ActivitiesResource = {
    get: () => {
        return new Promise((resolve, reject) => {
            resolve([
                {code: '1', name: 'Activity 1'},
                {code: '2', name: 'Activity 2'},
                {code: '3', name: 'Activity 3'},
            ]);
        })
    }
};

var LanguagesResource = {
    get: () => {
        return new Promise((resolve, reject) => {
            resolve([
                {code: 'spanish', name: 'Spanish'},
                {code: 'english', name: 'English'},
                {code: 'french', name: 'French'},
                {code: 'italian', name: 'Italian'},
                {code: 'slovak', name: 'Slovak'}
            ]);
        })
    }
};

var CountriesResource = {
    get: () => {
        return new Promise((resolve, reject) => {
            resolve([
                {code: 'spain', name: 'Spain'},
                {code: 'united_kingdom', name: 'United Kingdom'},
                {code: 'france', name: 'France'},
                {code: 'italy', name: 'Italy'},
                {code: 'slovenia', name: 'Slovenia'}
            ]);
        })
    }
};


export const studentsResultsResource = StudentsResultsResource;
export const companiesResultsResource = CompaniesResultsResource;
export const levelOfStudiesResource = LevelOfStudiesResource;
export const fieldOfStudiesResource = FieldOfStudiesResource;
export const activitiesResource = ActivitiesResource;
export const languagesResource = LanguagesResource;
export const countriesResource = CountriesResource;
