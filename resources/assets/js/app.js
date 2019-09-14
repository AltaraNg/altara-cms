window.$ = window.jQuery = require('jquery'); // <-- main, not 'slim'
window.Popper = require('popper.js').default;
require('bootstrap');

import Vue from 'vue'
import App from './App.vue'
import router from './router'

const app = new Vue({
    el: '#root',
    template: `<app></app>`,
    components: {App},
    router
});