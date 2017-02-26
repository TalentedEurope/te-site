import http from './http';

var ProfileResource = {
    put: (data) => {
        return http.put('profile', data);
    }
};

var InstitutionResource = {
    get: (country_code) => {
        return http.get(`institutions/${country_code}`);
    }
};

var RefereeResource = {
    get: (institution_id) => {
        return http.get(`institutions/${institution_id}/validators`);
    }
};

export const profileResource = ProfileResource;
export const institutionResource = InstitutionResource;
export const refereeResource = RefereeResource;
