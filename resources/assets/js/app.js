
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');


import Vue from 'vue'
import App from './components/App.vue'

import router from './routes'
import axios from 'axios'
import isLoading from 'is-loading';
import vi from 'vee-validate/dist/locale/vi';
import VeeValidate, { Validator } from 'vee-validate';
import vueTopprogress from 'vue-top-progress'
import VueClipboard from 'vue-clipboard2'
import VModal from 'vue-js-modal'
Vue.use(VueClipboard)
Vue.use(vueTopprogress)
Vue.use(VModal, {dialog: true})


// Add locale helper.
Validator.addLocale(vi);

Vue.use(VeeValidate, {'locale': 'vi'})

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
axios.interceptors.request.use(function (config) {
	NProgress.start();
	return config;
}, function (error) {
	return Promise.reject(error);
});

axios.interceptors.response.use(function (response) {
	NProgress.done();
    return response;
}, function (error) {
    return Promise.reject(error);
});



const app = new Vue({
    el: '#app',
    router,
    render: h => h(App)
});

Vue.nextTick(function () {
	require('./assets/js/jquery.min.js')
	require('./assets/js/bootstrap.min.js')
	require('./assets/js/metisMenu.min.js')
	require('./assets/js/jquery.slimscroll.js')
	require('./assets/js/jquery.core.js')
	require('./assets/js/jquery.app.js')
});


