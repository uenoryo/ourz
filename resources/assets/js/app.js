
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
Vue.http.interceptors.push((request, next) => {
  request.headers.set('X-CSRF-TOKEN', Laravel.csrfToken);

  next();
});

const VueMaterial = require('vue-material');

Vue.use(VueMaterial);
Vue.material.theme.registerAll({
  default: {
    primary: 'teal',
    accent: 'pink',
  },
});
Vue.component('example', require('./components/Example.vue'));

const app = new Vue({
  el: '#app',
  showModal: false,
  components: {
    'create-document': require('./components/button/create-document.vue'),
    'team-members': require('./components/team-members.vue'),
  },
});
