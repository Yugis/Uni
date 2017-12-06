require('./bootstrap');

// Vue.component('example', require('./components/Example.vue'));
Vue.component('follow-status', require('./components/follow-status.vue'));
Vue.component('notification', require('./components/Notification.vue'));
// Vue.component('unread', require('./components/UnreadNots.vue'));
Vue.component('posting', require('./components/Posting.vue'));
Vue.component('feed', require('./components/Feed.vue'));
// Vue.component('edit-profile-modal', require('./components/EditProfileModal.vue'));

import { store } from './store'

const app = new Vue({
    el: '#app',
    store,

    data: {
        // showModal: false
      }
});
