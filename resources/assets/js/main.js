import Vue from 'vue/dist/vue';
import VueResource from 'vue-resource';
import Search from './components/search/Main.vue';

window.TE = {};
window.TE["students_page"] = location.search.indexOf("company") == -1;
window.TE["companies_page"] = location.search.indexOf("company") > -1;


Vue.use(VueResource);

new Vue({
    el: '.v-container',
    components: { Search }
})
