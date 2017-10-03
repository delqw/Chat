
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example', require('./components/Example.vue'));
Vue.component('chat', require('./components/Chat.vue'));
Vue.component('chat-message', require('./components/ChatMessage.vue'));
Vue.component('chat-users', require('./components/ChatUsers.vue'));
Vue.component('chat-input', require('./components/ChatInput.vue'));
Vue.component('chat-user', require('./components/ChatUser.vue'));

const app = new Vue({
    el: '#app',
    data: {
        messages: [],
        users: []
    },
    methods: {
        pushMessage(message) {
            axios.post('/message', message);
            this.messages.push(message);
        },
        subscribe() {
            Echo.join('chat')
                .here(this.here)
                .joining(this.joining)
                .leaving(this.leaving)
                .listen('MessageEvent', this.messageEventListner);
        },
        here(users) {
            this.users = users.filter((el) => el.id !== 0);
        },
        joining(user) {
            if (user.id === 0) return;
            this.users.push(user);
        },
        leaving(user) {
            if (user.id === 0) return;
            const userIndex = this.users.indexOf(user);
            if (userIndex !== -1) this.users.splice(userIndex, 1);
        },
        messageEventListner(e) {
            this.messages.push(e.message);
        }
    },
    created() {
        axios.get('/messages').then((data) => {
            let messages = data.data.map((el) => {
                return { id: el.id, name: el.user.name, text: el.text }
            });
            this.messages = messages;
        });
        this.subscribe();
    },
    updated() {
        let chat = document.getElementsByClassName('chat-body')[0];
        chat.scrollTop = chat.scrollHeight;
    }
});
