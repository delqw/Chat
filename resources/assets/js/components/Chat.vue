<template>
    <div class="col-md-8 chat-col">
        <div class="panel panel-default chat">
            <div class="panel-heading">Чат</div>
            <div class="panel-body chat-body">
                <chat-message v-for="message in messages" :message="message" :key="message.id"></chat-message>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: [ 'messages' ]
    }
</script>

<style>
  .chat {
    border-radius: 0;
    height: 90vh;
    margin-bottom: 0;
  }

  .chat-col { 
    padding-right: 0;
    padding-bottom: 0;
  }

  .chat-body {
    overflow: auto;
    height: 90%;
  }
</style>

