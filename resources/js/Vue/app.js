import Vue from 'vue';
import App from './App.vue';
import router from './routes';
import VueRouter from 'vue-router';
import VueTableDynamic from 'vue-table-dynamic';
import store from './store'

window.Vue = require('vue');

//Toaster
// import Toaster from 'v-toaster'
// import 'v-toaster/dist/v-toaster.css';
// Vue.use(Toaster, {timeout: 5000});

Vue.component('pagination', require('laravel-vue-pagination')).default;
import VueToast from 'vue-toast-notification';
//import 'vue-toast-notification/dist/theme-default.css';
import 'vue-toast-notification/dist/theme-sugar.css';
Vue.use(VueToast);



// Vue Router
Vue.use(VueRouter);
Vue.use(VueTableDynamic);

const app = new Vue({
    el: '#app',
    router,
    store,
    render: h => h(App)
});
