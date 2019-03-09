require('./bootstrap');

// Laravel Passport components.
// Vue.component('passport-client', require('./components/passport/Clients.vue').default);
// Vue.component('passport-token', require('./components/passport/PersonalAccessTokens.vue').default);
// Vue.component('passport-authorized', require('./components/passport/AuthorizedClients.vue').default);

// // Other components.
// Vue.component('update-check', require('./components/UpdateCheck.vue').default);

/**
 * Next, we will create a fresh Vue application
 * instance and attach it to the page.
 */
const app = new Vue({
    el: '#app',
});

// Disable form autocomplete
var form = document.getElementsByTagName('form')[0];
if (typeof (form) != 'undefined' && form != null) {
    form.setAttribute('autocomplete', 'off');
}
