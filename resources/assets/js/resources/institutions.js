import http from './http';

var InstitutionsResource = {
    get: () => {
        return http.get('profile/institutions');
    }
};

export const institutionsResource = InstitutionsResource;
