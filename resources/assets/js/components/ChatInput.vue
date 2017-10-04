<template>
  <div class="col-md-12 col-sm-12 col-xs-12 chat-input-col">
        <div class="panel panel-default chat-input">
            <div class="panel-body">
                <div class="input-group" v-if="!isAuth">
                  <input type="text" class="form-control" placeholder="Введите ваше имя..." v-model="name" v-on:keyup.enter="login" v-on:keyup="validate">
                  <span class="input-group-btn">
                    <button class="btn btn-secondary" type="button" v-on:click="login">Войти</button>
                  </span>
                </div>
                <div class="wrong-name" v-show="wrongName">Имя должно быть не менее трёх символов</div>
                <div class="input-group" v-if="isAuth">
                  <input type="text" class="form-control" placeholder="Напишите сообщение..." v-model="message" v-on:keyup.enter="sendMessage">
                  <span class="input-group-btn">
                    <button class="btn btn-secondary" type="button" v-on:click="sendMessage">Отправить</button>
                  </span>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
  data() {
    return {
      message: '',
      name: localStorage.getItem('name'),
      isAuth: window.isAuth,
      wrongName: false
    }
  },
  methods: {
    login() {
      if (this.name.length < 3) return this.wrongName = true;
      localStorage.setItem('name', this.name);
      axios.post('/login', { name: this.name }).then((res) => {
        if (res.data && res.data.name) {
          this.isAuth = true;
          localStorage.setItem('name', res.data.name);
          Echo.leave('chat');
          this.$emit('login');
        }
      });
    },
    validate() {
      if (this.name && this.name.length < 3) return this.wrongName = true;
      this.wrongName = false;
    },
    sendMessage() {
      this.$emit('newmessage', {
        text: this.message,
        name: this.name
       });
      this.message = '';
    }
  }
}
</script>


<style>
  .chat-input {
    border-radius: 0;
    margin-bottom: 0;
    margin-top: -1px;
  }

  .chat-input-col { 
    padding-bottom: 0;
  }

  .wrong-name {
    color: #ff0000;
  }
</style>
