import Vue from 'vue';
import VueResource from 'vue-resource';

Vue.use(VueResource);

Vue.http.options.root = '/api';
Vue.http.options.headers =  {
    Authorization: 'Basic TMPYXBpOnBhc3N3b3Jk'
};

Vue.http.interceptors.push((request, next) => {
    next((response) => {
        if (response.status === 404) {
            console.log("Handle 404");
        }
    });
});

var StudentsResultsResource = {
    get: (filters) => {
        return Vue.http.get('search/students');
    }
};

var CompaniesResultsResource = {
    get: () => {
        return Vue.http.get('search/companies');
    }
};

var StudentsFiltersResource = {
    get: (filters) => {
        return Vue.http.get('search/students/filters');
    }
};

var CompaniesFiltersResource = {
    get: () => {
        return Vue.http.get('search/companies/filters');
    }
};


var NudgesResource = {
    get: () => {
        return Vue.http.get('nudges');
    }
};


var ValidatorsResource = {
    get: () => {
        return Vue.http.get('validators');
    },
    put: (validator_id) => {
        return Vue.http.put('validators{/id}', null, {params: {id: validator_id}});
    }
};

var StudentsValidationResource = {
    get: () => {
        return Vue.http.get('validation');
    }
};

var StudentProfileResource = {
    get: () => {
        return Vue.http.get('profile/student');
    }
};

var CompanyProfileResource = {
    get: () => {
        return Vue.http.get('profile/company');
    }
};

var ValidatorProfileResource = {
    get: () => {
        return Vue.http.get('profile/validator');
    }
};

export const studentsResultsResource = StudentsResultsResource;
export const companiesResultsResource = CompaniesResultsResource;

export const studentsFiltersResource = StudentsFiltersResource;
export const companiesFiltersResource = CompaniesFiltersResource;


export const nudgesResource = NudgesResource;

export const validatorsResource = ValidatorsResource;

export const studentsValidationResource = StudentsValidationResource;

export const studentProfileResource = StudentProfileResource;
export const companyProfileResource = CompanyProfileResource;
export const validatorProfileResource = ValidatorProfileResource;
