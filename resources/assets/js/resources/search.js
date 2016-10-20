import http from './http';

var StudentsResultsResource = {
    get: (filters={}, search_text) => {
        var params = '';
        if (search_text) {
            filters["search_text"] = search_text;
        }
        params = decodeURIComponent($.param(filters));

        return http.get(`search/students?${params}`);
    }
};

var CompaniesResultsResource = {
    get: (filters={}, search_text) => {
        var params = '';
        if (search_text) {
            filters["search_text"] = search_text;
        }
        params = decodeURIComponent($.param(filters));

        return http.get(`search/companies?${params}`);
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
