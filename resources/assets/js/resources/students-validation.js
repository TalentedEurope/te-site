import http from './http';

var StudentsValidationResource = {
    get: () => {
        return http.get('validation');
    }
};

export const studentsValidationResource = StudentsValidationResource;
