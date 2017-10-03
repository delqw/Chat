<template>
  <div class="user">
    <div class="name">{{user.name}}</div>
  </div>  
</template>

<script>
export default {
  props: [ 'user' ]
}
</script>


<style>
  .name {
    padding: 5px;
    word-wrap: break-word;
  }
</style>

