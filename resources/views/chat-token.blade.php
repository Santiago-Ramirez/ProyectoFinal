<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://js.pusher.com/5.0/pusher.min.js"></script>
    <script>

      // Enable pusher logging - don't include this in production
      Pusher.logToConsole = true;
      var PUSHER_APP_KEY = "7eb4fd7d4f7d603dec81"
      var pusher = new Pusher(PUSHER_APP_KEY, {
        cluster: 'mt1',
        forceTLS: true
      });


    var channel = pusher.subscribe('channel-ubaldin');
    channel.bind('event-ubameny', function(data) {
      // alert(JSON.stringify(data));
      console.log(data.data)
      const message = data.data
      var node = document.createElement("p");
      var textnode = document.createTextNode(message.user+": "+message.message);
      node.appendChild(textnode);
      document.getElementById("myList").appendChild(node);

    });
  </script>


        <title>Document</title>
</head>
<body>
    @include('sweetalert::alert')


    <div class="container">
        <div class="row mt-3">
            <div class="col-6 offset-3">
                <div class="card">
                    <div class="card-header">
                        Chat de Seguridad
                    </div>

                    <div class="card-body">
                        @if (auth()->user()->id_role == 3)
<center>                        Bienvenido <b style="color:red;">{{ auth()->user()->nombre }} (USUARIO ALTO)</b>
</center>
@else
<center>                        Bienvenido <b style="color:blue;">{{ auth()->user()->nombre }} (USUARIO BAJO)</b>
</center>
@endif
{{-- <div class="form-group">
                            <input type="text" class="form-control" placeholder="token" id="name" name="user">
                        </div> --}}

                        <div class="form-group" id="data-message">

                        </div>
                        @if (auth()->user()->id_role == 3)
                   <p id="myList" style="color:red;"></p>
                      @else
                        <p id="myList" style="color:blue;"></p></p>
                        @endif
                        <div class="form-group">
                            <textarea id="message" class="form-control" placeholder="Message" name="message"></textarea>
                        </div>

                        <div class="form-group">
                            <button class="btn btn-block btn-primary">Enviar Mensaje</button>


                        </div>

                        <div class="form-group">
                            <a   class="btn btn-block btn-primary"  href="{{ URL('home') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">

                                    Volver al inicio
                                </a>
                                <form id="logout-form" action="{{ URL('home') }}" method="GET" class="d-none">
                                    @csrf
                                </form>
                        </div>


                        <div class="form-group">
                            <a   class="btn btn-block btn-primary"  href="{{ URL('sendToken') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form1').submit();">

                                    Limpiar chat
                                </a>
                                <form id="logout-form1" action="{{ URL('sendToken') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>



    {{-- <div class="col-6">
        <div class="col-6 offset-3">
            <div class="card">
                <div class="card-header">
                    Tokens de seguridad
                </div>

                <div class="card-body">
<center>                        Bienvenido <b style="color:red;">{{ auth()->user()->nombre }}</b>
</center>
                    <div class="form-group" id="data-message">

                    </div>
                    <p id="myList"></p>

                    <div class="form-group">
                        <textarea id="message" class="form-control" placeholder="Message" name="message">{{ auth()->user()->$tok }}</textarea>
                    </div>

                    <div class="form-group">
                        <a   class="btn btn-block btn-primary"  href="{{ URL('generarToken') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form1').submit();">

                                Generar nuevo token
                            </a>
                            <form id="logout-form1" action="{{ URL('generarToken') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                    </div>

                    <div class="form-group">
                        <a   class="btn btn-block btn-primary"  href="{{ URL('home') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">

                                Volver al inicio
                            </a>
                            <form id="logout-form" action="{{ URL('home') }}" method="GET" class="d-none">
                                @csrf
                            </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div> --}}

</div>


</body>
</html>



<script type="text/javascript" src="{{url('js/app.js')}}"></script>




<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>


<script>


    $(function(){

        const Http = window.axios;
        const Echo = window.Echo;
        const name = $('#name');
        const message = $('#message');

        $("input, textarea").keyup(function(){
            $(this).removeClass('is-invalid');
        });



        $('button').click(function(){
            if(name.val() == '')
            {
                name.addClass('is-invalid');
            }
            else if (message.val() == '')
            {
                message.addClass('is-invalid');
            }
            else {
                Http.post("{{ URL('/message') }}", {
                    'name' : name.val(),
                    'message' : message.val()
                }).then(()=>{
                    message.val('');
                });
            }
        });


        let channel = Echo.channel('channel-chat');
        channel.listen('EnviarToken', function(data){
            $('#data-message')
            .append(`<strong>$(data.message.name)</strong> : $(data.message.message) <br>`);
        });

    });


    </script>
