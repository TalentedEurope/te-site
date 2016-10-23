import http from './http';

var ProfileResource = {
    put: (data) => {
        return http.put('profile', data);
    }
};

var StudentProfileResource = {
    get: () => {
        return http.get('profile/student');
    }
};

var CompanyProfileResource = {
    get: () => {
        return http.get('profile/company');
    }
};

var ValidatorProfileResource = {
    get: () => {
        return http.get('profile/validator');
    }
};

export const profileResource = ProfileResource;
export const studentProfileResource = StudentProfileResource;
export const companyProfileResource = CompanyProfileResource;
export const validatorProfileResource = ValidatorProfileResource;
