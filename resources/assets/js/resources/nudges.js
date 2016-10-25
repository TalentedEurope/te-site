import http from './http';

var NudgesResource = {
    get: () => {
        return http.get('alert');
    }
};

export const nudgesResource = NudgesResource;
