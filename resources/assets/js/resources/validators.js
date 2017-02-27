import http from './http';

var ValidatorsResource = {
    get: () => {
        return http.get('validators');
    },
    put: (validator_id) => {
        return http.put('validators{/id}', null, {params: {id: validator_id}});
    },
    delete: (delete_url) => {
        return http.get(delete_url, null);
    }
};

export const validatorsResource = ValidatorsResource;
