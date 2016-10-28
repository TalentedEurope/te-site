import http from './http';

var AlertsResource = {
    get: () => {
        return http.get('alerts');
    },
    post: (company_id) => {
        return http.post('alerts', {company: company_id});
    }
};

export const alertsResource = AlertsResource;
