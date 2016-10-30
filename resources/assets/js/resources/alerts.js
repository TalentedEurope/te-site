import http from './http';

var AlertsResource = {
    get: (page) => {
        return http.get(`alerts?page=${page}`);
    },
    post: (company_id) => {
        return http.post('alerts', {company: company_id});
    }
};

export const alertsResource = AlertsResource;
