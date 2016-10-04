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
                full_name: 'John Doe',
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
                name: 'John Doe LLC.',
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


var NudgesResource = {
    get: () => {
        return new Promise((resolve, reject) => {
            var nudge = {
                id: 1,
                student: 'John Doe',
                country: 'Spain',
                study_level: 'Bachelor’s or equivalent',
                when_nudged: 'One days ago'
            };
            resolve([nudge, nudge, nudge, nudge]);
        })
    }
};


var ValidatorsResource = {
    get: () => {
        return new Promise((resolve, reject) => {
            resolve([{
                full_name: 'John Doe',
                email: 'johndoe@gmail.com',
                department: 'Information Technology',
                position: 'Teacher',
                active: false
            }, {
                full_name: 'John Doe',
                email: 'johndoe@gmail.com',
                department: 'Information Technology',
                position: 'Teacher',
                active: true
            }, {
                full_name: 'John Doe',
                email: 'johndoe@gmail.com',
                department: 'Information Technology',
                position: 'Teacher',
                active: true
            }]);
        })
    }
};


var StudentsValidationResource = {
    get: () => {
        return new Promise((resolve, reject) => {
            resolve([{
                full_name: 'Pol Cámara Solé',
                date_of_request: 'Two days ago',
                status: 'Pending'
            }, {
                full_name: 'Pol Cámara Solé',
                date_of_request: 'Two days ago',
                status: 'Validated'
            }, {
                full_name: 'Pol Cámara Solé',
                date_of_request: 'Two days ago',
                status: 'Not validated'
            }]);
        })
    }
};

var StudentResource = {
    get: () => {
        return new Promise((resolve, reject) => {
            resolve({
                id: 1,
                full_name: 'John Doe',
                studied: 'Doctorate in Lorem ipsum dolor sit amet Consectetuor',
                lives_in: 'Puerto de la Cruz, Spain',
                nationality: 'United Kingdom',
                studied_in: 'IES Puerto de la Cruz Telesforo Bravo',
                born_on: '17 september 1993',
                my_talent: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ut arcu sed odio vestibulum rhoncus et vel est. Ut id odio eu lorem iaculis posuere quis a elit. Nunc dictum placerat eros, eget pulvinar felis tristique eget. Curabitur fermentum purus vel lorem blandit fringilla. Mauris',
                skills: [
                    {name: 'Lorem ipsum', important: true},
                    {name: 'Dolor sit amet', important: false},
                    {name: 'Consectetur adipiscing elit', important: false}],
                languages: ['Spanish', 'English', 'French'],
                photo: 'http://placekitten.com/g/150/150',
                validated: true,
                email: 'john@doe.com',
                phone: '317-456-2564',
                address: '32 Reading rd, Birmingham B26 3QJ, United Kingdom',
                twitter: 'http://twitter.com'
            })
        })
    }
};

var CompanyResource = {
    get: () => {
        return new Promise((resolve, reject) => {
            resolve({
                id: 1,
                name: 'John Doe',
                sector: 'Company sector',
                we_are_in: 'Santa Cruz de Tenerife, Spain.',
                talent_is: 'Jelly apple pie icing. Jelly cupcake tiramisu jelly beans marzipan. Cheesecake jelly-o jelly tootsie roll biscuit chocolate macaroon marshmallow. Jelly-o marshmallow tart donut brownie chocolate topping chocolate cake.',
                skills: [
                    {name: 'Lorem ipsum'},
                    {name: 'Dolor sit amet'},
                    {name: 'Consectetur adipiscing elit'}],
                photo: 'http://placebear.com/g/150/150',
                email: 'john@doe.com',
                phone: '317-456-2564',
                address: '32 Reading rd, Birmingham B26 3QJ, United Kingdom',
                twitter: 'http://twitter.com'
            })
        })
    }
};

var ValidatorResource = {
    get: () => {
        return new Promise((resolve, reject) => {
            resolve({
                id: 1,
                full_name: 'John Doe',
                institution_name: 'Institution name',
                validated_students: [
                    {full_name: 'Lorem ipsum dolor sit amet'},
                    {full_name: 'Lorem ipsum dolor sit amet'},
                    {full_name: 'Lorem ipsum dolor sit amet'},
                    {full_name: 'Lorem ipsum dolor sit amet'},
                ],
            })
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

export const nudgesResource = NudgesResource;

export const validatorsResource = ValidatorsResource;

export const studentsValidationResource = StudentsValidationResource;

export const studentResource = StudentResource;
export const companyResource = CompanyResource;
export const validatorResource = ValidatorResource;
