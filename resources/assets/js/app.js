
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('chat-messages', require('./components/ChatMessages.vue'));
Vue.component('chat-form', require('./components/ChatForm.vue'));

const app = new Vue({
    el: '#app',
    
    data: {
        messages: [],
        loading:false
    },


    created() {
        this.fetchMessages();
        var dateTime = new Date();
        var getDateTime = dateTime.getFullYear()+'-'+dateTime.getMonth()+'-'+dateTime.getDate()+' '+dateTime.getHours()+':'+dateTime.getMinutes()+':'+dateTime.getSeconds();
        Echo.private('chat')
            .listen('MessageSent', (e) => {
                this.messages.push({
                    message: e.message.message,
                    user: e.user,
                    path: e.message.path,
                    type: e.message.type,
                    loading:true,
                    created_at:getDateTime
                });
            });
    },

    methods: {
        fetchMessages() {
            axios.get('/messages').then(response => {
                this.messages = response.data;
            });
        },
        addMessage(message) {
            var loading = true;
            this.messages.push(message);
            axios.post('/messages', message).then(response => {
            });
        }
    }
});
