require('./bootstrap');

window.Vue = require('vue');
import VueObserveVisibility from 'vue-observe-visibility'

Vue.use(VueObserveVisibility)
var VueExpandableImage = require('vue-expandable-image')
Vue.use(VueExpandableImage)

Vue.component('main-page', require('./Sections/MainPage.vue').default);
Vue.component('login-page', require('./Sections/Login.vue').default);
Vue.component('upload-page', require('./Sections/UploadPage.vue').default);
Vue.component('approve-page', require('./Sections/ApprovePage.vue').default);
Vue.component('favorite-page', require('./Sections/FavoritePage.vue').default);

const app = new Vue({
    el: '#app',
});
