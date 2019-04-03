require('./bootstrap');

// Load Laravel Passport components.
Vue.component('passport-clients', require('./components/passport/Clients.vue').default);
Vue.component('passport-authorized-clients', require('./components/passport/AuthorizedClients.vue').default);
Vue.component('passport-personal-access-tokens', require('./components/passport/PersonalAccessTokens.vue').default);

// Vue.component('update-check', require('./components/UpdateCheck.vue').default);
Vue.component('toastr-component', require('./components/Toastr.vue').default);

/**
 * Next, we will create a fresh Vue application
 * instance and attach it to the page.
 */
const app = new Vue({
    el: '#app',
    mounted: function () {
        console.log('Application mounted.')
    },
    methods: {
        toggleClass: function(className, obj) {
            let target = document.getElementById(obj);
            if (!target.classList.contains(className)) {
                target.classList.add(className);
            } else {
                target.classList.toggle(className);
            }
        },
        showToastr: function (type, title, msg) {
            this.$toastr('add', {
                type: type,
                title: title,
                msg: msg,
                position: 'toast-top-right',
                clickClose: true,
                timeout: 7200
            })
        }
    }
});

/**
 * This is method for switching sidebar.
 * Set status sidebar, collapsed or expanded?
 */
let sidebar = document.getElementById('sidebar');

if (typeof (sidebar) != 'undefined' && sidebar != null) {

    // This is for sidebar toggle.
    var sidebarButton = document.getElementById('sidebarCollapse');
    if (Boolean(sessionStorage.getItem('sidebarCollapse'))) {
        sidebar.classList.toggle('hidden');
    }
    sidebarButton.addEventListener('click',function(event){
        event.preventDefault();
        document.getElementById('sidebar').classList.toggle('hidden');
        if (Boolean(sessionStorage.getItem('sidebarCollapse'))) {
            sessionStorage.setItem('sidebarCollapse', '');
        } else {
            sessionStorage.setItem('sidebarCollapse', '1');
        }
    });

    // This for toastr position fix.
    var toastrObj = document.querySelector('.toast-container');
    toastrObj.classList.add('toast-top-right-override');
}
