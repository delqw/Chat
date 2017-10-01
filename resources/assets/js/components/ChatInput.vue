<template>
  <div class="col-md-12 chat-input-col">
        <div class="panel panel-default chat-input">
            <div class="panel-body">
                <div class="input-group" v-if="!isAuth">
                  <input type="text" class="form-control" placeholder="Введите ваше имя..." v-model="name" v-on:keyup.enter="login">
                  <span class="input-group-btn">
                    <button class="btn btn-secondary" type="button" v-on:click="login">Войти</button>
                  </span>
                </div>
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
      isAuth: !!localStorage.getItem('name')
    }
  },
  methods: {
    login() {
      localStorage.setItem('name', this.name);
      this.isAuth = true;
    },
    sendMessage() {
      this.$emit('newmessage', {
        name: this.name,
        text: this.message
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
</style>
