
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');


import Vue from 'vue'
import VueRouter from 'vue-router'
import App from './components/App.vue' 

import router from './routes'
import axios from 'axios'
import isLoading from 'is-loading';
import vi from 'vee-validate/dist/locale/vi';
import VeeValidate, { Validator } from 'vee-validate';
import vueTopprogress from 'vue-top-progress'

Vue.use(vueTopprogress)

Vue.use(VueRouter)

// Add locale helper.
Validator.addLocale(vi);

Vue.use(VeeValidate, {'locale': 'vi'})

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
axios.interceptors.request.use(function (config) {
	this.$refs.topProgress.start()
	return config;
}, function (error) {
	return Promise.reject(error);
});

axios.interceptors.response.use(function (response) {
	this.$refs.topProgress.done()
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
})