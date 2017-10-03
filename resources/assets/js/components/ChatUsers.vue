<template>
  <div class="col-md-4 col-sm-4 col-xs-4 chat-users-col">
        <div class="panel panel-default chat-users">
            <div class="panel-heading">Пользователи</div>
            <div class="panel-body chat-users-body">
              <chat-user v-for="user in users" :user="user" :key="user.id"></chat-user>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
      props: [ 'users' ]
    }
</script>

<style>
  .chat-users {
    border-radius: 0;
    height: 90vh;
    margin-bottom: 0;
    border-left: none;
  }

  .chat-users-col { 
    padding-left: 0;
    padding-bottom: 0;
  }

  .chat-users-body {
    overflow: auto;
    height: 90%;
  }
</style>
