import http from './http';

var NudgesResource = {
    get: () => {
        return http.get('nudges');
    }
};

export const nudgesResource = NudgesResource;
