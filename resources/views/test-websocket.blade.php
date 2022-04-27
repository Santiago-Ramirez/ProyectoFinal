<!DOCTYPE html>
<head>
  <title>Pusher Test</title>
  <script src="https://js.pusher.com/5.0/pusher.min.js"></script>
  <script>

    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;
    var PUSHER_APP_KEY = "7eb4fd7d4f7d603dec81"
    var pusher = new Pusher(PUSHER_APP_KEY, {
      cluster: 'mt1',
      forceTLS: true
    });

    var channel = pusher.subscribe('channel-tutofox');
    channel.bind('event-pusher', function(data) {
      // alert(JSON.stringify(data));
      console.log(data.data)
      const message = data.data
      var node = document.createElement("LI");
      var textnode = document.createTextNode(message.user+"=>"+message.message);
      node.appendChild(textnode);
      document.getElementById("myList").appendChild(node);

    });
  </script>
</head>
<body>
  <h1>Pusher Test</h1>
  <p>
    Intenta publicar un evento en el canal <code>mi-canal</code>
    con nombre del evento <code>mi-evento</code>.
  </p>

  <ul id="myList">
    <li>Primer mensaje</li>
  </ul>

</body>
