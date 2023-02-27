/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

// require('./bootstrap');
import { createApp } from 'vue';
// import { createStore } from 'vuex';



// window.Vue = require('vue').default;

import router from './router';
import App from "./App.vue";


// import i18n from './i18n'

let app = createApp(App);



    app.use(router);
    router.app = app;

    app.config.globalProperties.window = window;
    app.mount('#app');

