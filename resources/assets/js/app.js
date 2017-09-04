
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');


import Vue from 'vue'
import VueRouter from 'vue-router'
import App from './components/App'

import router from './routes'
import axios from 'axios'
import isLoading from 'is-loading';
import VeeValidate from 'vee-validate';


Vue.use(VueRouter)
Vue.use(VeeValidate)


axios.interceptors.request.use(function (config) {
	isLoading().loading();
	return config;
}, function (error) {
	return Promise.reject(error);
});

axios.interceptors.response.use(function (response) {
  isLoading().remove();
    return response;
}, function (error) {
    return Promise.reject(error);
});


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */


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
