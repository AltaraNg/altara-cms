window.$ = window.jQuery = require('jquery');
window.Popper = require('popper.js').default; // default is very important.
require('bootstrap');

import Vue from 'vue'
import App from './App.vue'
import router from './router'

const app = new Vue({
	el: '#root',
	template: `<app></app>`,
	components: { App },
	router
})