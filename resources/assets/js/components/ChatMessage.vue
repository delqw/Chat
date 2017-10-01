<template>
  <div class="message">
    <div class="author">{{message.name}}</div>
    <div class="text">{{message.text}}</div>
  </div>  
</template>

<script>
export default {
  props: [ 'message' ]
}
</script>


<style>
  .author {
    color: #42aaff;
    font-size: 9pt;
  }

  .message {
    padding: 5px;
    word-wrap: break-word;
  }
</style>

