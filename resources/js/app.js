require('./bootstrap');

window.Vue = require('vue');
var VueExpandableImage = require('vue-expandable-image')
Vue.use(VueExpandableImage)

Vue.component('main-page', require('./components/MainPage.vue').default);
Vue.component('login-page', require('./components/Login.vue').default);
Vue.component('upload-page', require('./components/UploadPage.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
