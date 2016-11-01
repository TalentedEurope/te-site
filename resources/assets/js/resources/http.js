import Vue from 'vue';
import VueResource from 'vue-resource';
import { defaultErrorToast } from 'errors-handling.js';

Vue.use(VueResource);

var token = $("meta[id='token']").attr('content');

Vue.http.options.root = '/api';
Vue.http.options.headers = {
    Authorization: `Bearer ${token}`,
}

Vue.http.interceptors.push((request, next) => {
    next((response) => {
        if (response.status === 404) {
            defaultErrorToast();
        }
    });
});

const http = Vue.http;
export default http;
