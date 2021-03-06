
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
window.select2 = require('select2');


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('pagination', require('./components/Pagination.vue'));
Vue.component('select2', require('./components/Select2.vue'));

Vue.component('shopindex', require('./components/ShopIndex.vue'));

const app = new Vue({
    el: '#app'
});
