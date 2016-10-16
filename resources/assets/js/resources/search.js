import http from './http';

var StudentsResultsResource = {
    get: (filters) => {
        var filters_params = '';
        if (filters) {
            filters_params = decodeURIComponent($.param(filters));
        }
        return http.get(`search/students?${filters_params}`);
    }
};

var CompaniesResultsResource = {
    get: (filters) => {
        var filters_params = '';
        if (filters) {
            filters_params = decodeURIComponent($.param(filters));
        }
        return http.get(`search/companies?${filters_params}`);
    }
};

var StudentsFiltersResource = {
    get: () => {
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
