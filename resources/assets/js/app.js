
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
        Echo.private('chat')
            .listen('MessageSent', (e) => {
                //console.log("Esta es la respuesta de la e",e);
                this.messages.push({
                    message: e.message.message,
                    user: e.user,
                    path: e.message.path,
                    type: e.message.type,
                    loading:true,
                });
            });
    },

    methods: {
        fetchMessages() {
            axios.get('/messages').then(response => {
                console.log("------------------------");
                console.log(this.messages);
                console.log("------------------------");
                this.messages = response.data;
                //this.loading = true;
            });
        },
        addMessage(message) {
            var loading = true;
            //console.log("...................");
            //console.log(message);
            //console.log("...................");
            //this.messages.push(loading);
            this.messages.push(message);
            axios.post('/messages', message).then(response => {
                console.log("===========================");
                console.log(this.messages);
                console.log("===========================");
            });
        }
    }
});
