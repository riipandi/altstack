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
    methods: {
        toggleClass: function(className, obj) {
            let target = document.getElementById(obj);
            if (!target.classList.contains(className)) {
                target.classList.add(className);
            } else {
              target.classList.toggle(className);
            }
        }
    }
});

/**
 * This is method for switching sidebar.
 * Set status sidebar, collapsed or expanded?
 */
let sidebarButton = document.getElementById('sidebarCollapse'); 
let sidebar = document.getElementById('sidebar');
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
