
/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the body of the page. From here, you may begin adding components to
 * the application, or feel free to tweak this setup for your needs.
 */

const VueMaterial = require('vue-material');

Vue.use(VueMaterial);
Vue.material.theme.registerAll({
  default: {
    primary: 'teal',
    accent: 'pink',
  },
});
Vue.component('example', require('./components/Example.vue'));
Vue.component('team-members', require('./components/team-members.vue'));

const app = new Vue({
    el: '#app',
});
