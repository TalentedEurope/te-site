import Vue from 'vue';
import VueResource from 'vue-resource';

Vue.use(VueResource);

Vue.http.options.root = '/api';
Vue.http.options.headers = {
    Authorization: 'Basic TMPYXBpOnBhc3N3b3Jk'
}

Vue.http.interceptors.push((request, next) => {
    next((response) => {
        if (response.status === 404) {
            console.log("Handle 404");
        }
    });
});

const http = Vue.http;
export default http;
