import http from './http';

var getFormattedParams = function (page=1, filters={}, search_text) {
    var _filters = _.clone(filters);

    if (page) {
        _filters["page"] = page;
    }

    if (search_text) {
        _filters["search_text"] = search_text;
    }

    return decodeURIComponent($.param(_filters));
}

var StudentsResultsResource = {
    get: (page, filters, search_text) => {
        var params = getFormattedParams(page, filters, search_text);
        return http.get(`search/students?${params}`);
    }
};

var CompaniesResultsResource = {
    get: (page, filters, search_text) => {
        var params = getFormattedParams(page, filters, search_text);
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
