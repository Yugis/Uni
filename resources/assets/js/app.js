require('./bootstrap');

Vue.component('timer', require('./components/CountdownTimer.vue'));
Vue.component('manager-course-table', require('./components/ManagerCourseTable.vue'));

const app = new Vue({
    el: '#app',
});
