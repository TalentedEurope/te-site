import http from './http';

var StudentsResultsResource = {
    get: (filters) => {
        return http.get('search/students');
    }
};

var CompaniesResultsResource = {
    get: () => {
        return http.get('search/companies');
    }
};

var StudentsFiltersResource = {
    get: (filters) => {
        return http.get('search/students/filters');
    }
};

var CompaniesFiltersResource = {
    get: () => {
        return http.get('search/companies/filters');
    }
};


export const studentsResultsResource = StudentsResultsResource;
export const companiesResultsResource = CompaniesResultsResource;

export const studentsFiltersResource = StudentsFiltersResource;
export const companiesFiltersResource = CompaniesFiltersResource;
