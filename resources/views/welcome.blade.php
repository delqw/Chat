<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="css/app.css">
  <title>Чат</title>
</head>
<body>
  <div id="app">
    <div class="container">
        <div class="row">
            <chat v-bind:messages="messages"></chat>
            <chat-users v-on:connectuser="pushUser" v-on:disconnectuser="pullUser" v-bind:users="users"></chat-users>
            <chat-input v-on:newmessage="pushMessage"></chat-input>
        </div>
    </div>
  </div>
  <script src="js/app.js" charset="utf8"></script>
</body>
</html>