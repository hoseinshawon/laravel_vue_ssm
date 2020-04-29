import Vue from 'vue'
import App from './App.vue'
import vuetify from './plugins/vuetify';
import router from './router';

import './assets/app.scss';

import 'bootstrap';

import jQuery from 'jquery';
window.$ = window.jQuery = jQuery;


//import 'popper.js';

import helper from './helper';


Vue.config.productionTip = false

new Vue({
  vuetify,
  router,
  helper,
  jQuery,
  render: h => h(App)
}).$mount('#app')
