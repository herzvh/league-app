import Vue from "vue";
import App from "./components/App";
import axios from 'axios'
import VueAxios from 'vue-axios'

require('./bootstrap');

Vue.component('app', App);

axios.defaults.baseURL = process.env.MIX_API_BASE_URL
Vue.use(VueAxios, axios);

const app = new Vue({
    el: '#app'
});
