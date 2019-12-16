
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
window.axios = require('axios')

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

//Solution
//Vue.component('solution', require('./components/Solution/solution.vue').default);
//Vue.component('sview', require('./components/Solution/view.vue').default);
//Vue.component('screate', require('./components/Solution/create.vue').default);

//Forum
//Vue.component('forum', require('./components/Forum/forum.vue').default);
//Vue.component('fview', require('./components/Forum/view.vue').default);
//Vue.component('fcreate', require('./components/Forum/create.vue').default);

//Post
Vue.component('posts', require('./components/Posts/posts.vue').default);
Vue.component('pview', require('./components/Posts/view.vue').default);
Vue.component('pcreate', require('./components/Posts/create.vue').default);

//Sale
Vue.component('addsale', require('./components/Sale/addsale.vue').default);
Vue.component('vsale', require('./components/Sale/vsale.vue').default);
Vue.component('editsale', require('./components/Sale/editsale.vue').default);

//Program
Vue.component('addpro', require('./components/Program/addpro.vue').default);
Vue.component('vpro', require('./components/Program/vpro.vue').default);
Vue.component('editpro', require('./components/Program/editpro.vue').default);

//Staff
Vue.component('vstaff', require('./components/Staff/vstaff.vue').default);
Vue.component('addstaff', require('./components/Staff/addstaff.vue').default);
Vue.component('editstaff', require('./components/Staff/editstaff.vue').default);

//Company
Vue.component('vcompany', require('./components/Company/vcompany.vue').default);
Vue.component('addcompany', require('./components/Company/addcompany.vue').default);
Vue.component('editcompany', require('./components/Company/editcompany.vue').default);

//Department
Vue.component('vdep', require('./components/Department/vdep.vue').default);
Vue.component('adddep', require('./components/Department/adddep.vue').default);
Vue.component('editdep', require('./components/Department/editdep.vue').default);





//testvue
Vue.component('testvue', require('./components/Testvue/testvue.vue').default);
Vue.component('tvcreate', require('./components/Testvue/create.vue').default);
Vue.component('tvedit', require('./components/Testvue/edit.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app'
});

const app2 = new Vue({
    el: '#app2'
});



