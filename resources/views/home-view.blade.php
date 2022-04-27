<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>UbaMeny</title>
<link href="https://fonts.googleapis.com/css?family=Merienda+One" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

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
      var hola = 1;
      var node = document.createElement("span");
      var textnode = document.createTextNode(hola);
       node.appendChild(textnode);
      document.getElementById("myList").appendChild(node);
      var numero1 = document.getElementById("myList");

    });
  </script>

<style>
	body {
		background: #eeeeee;
	}
    .form-inline {
        display: inline-block;
    }
	.navbar {
		background: #fff;
		padding-left: 16px;
		padding-right: 16px;
		border-bottom: 1px solid #d6d6d6;
		box-shadow: 0 0 4px rgba(0,0,0,.1);
	}
	.nav img {
		border-radius: 50%;
		width: 36px;
		height: 36px;
		margin: -8px 0;
		float: left;
		margin-right: 10px;
	}
	.navbar .navbar-brand {
		color: #555;
		padding-left: 0;
		padding-right: 50px;
		font-family: 'Merienda One', sans-serif;
	}
	.navbar .navbar-brand i {
		font-size: 20px;
		margin-right: 5px;
	}
	.search-box {
        position: relative;
    }
    .search-box input {
		box-shadow: none;
        padding-right: 35px;
        border-radius: 3px !important;
    }
	.search-box .input-group-addon {
        min-width: 35px;
        border: none;
        background: transparent;
        position: absolute;
        right: 0;
        z-index: 9;
        padding: 7px;
		height: 100%;
    }
    .search-box i {
        color: #a0a5b1;
		font-size: 19px;
    }
	.navbar ul li i {
		font-size: 18px;
	}
	.navbar .dropdown-menu i {
		font-size: 16px;
		min-width: 22px;
	}
	.navbar .dropdown.open > a {
		background: none !important;
	}
	.navbar .dropdown-menu {
		border-radius: 1px;
		border-color: #e5e5e5;
		box-shadow: 0 2px 8px rgba(0,0,0,.05);
	}
	.navbar .dropdown-menu li a {
		color: #777;
		padding: 8px 20px;
		line-height: normal;
	}
	.navbar .dropdown-menu li a:hover, .navbar .dropdown-menu li a:active {
		color: #333;
	}
	.navbar .dropdown-menu .material-icons {
		font-size: 21px;
		line-height: 16px;
		vertical-align: middle;
		margin-top: -2px;
	}
	.navbar .badge {
		background: #f44336;
		font-size: 11px;
		border-radius: 20px;
		position: absolute;
		min-width: 10px;
		padding: 4px 6px 0;
		min-height: 18px;
		top: 5px;
	}
	.navbar ul.nav li a.notifications, .navbar ul.nav li a.messages {
		position: relative;
		margin-right: 10px;
	}
	.navbar ul.nav li a.messages {
		margin-right: 20px;
	}
	.navbar a.notifications .badge {
		margin-left: -8px;
	}
	.navbar a.messages .badge {
		margin-left: -4px;
	}
	.navbar .active a, .navbar .active a:hover, .navbar .active a:focus {
		background: transparent !important;
	}
	@media (min-width: 1200px){
		.form-inline .input-group {
			width: 300px;
			margin-left: 30px;
		}
	}
	@media (max-width: 1199px){
		.form-inline {
			display: block;
			margin-bottom: 10px;
		}
		.input-group {
			width: 100%;
		}
	}
</style>
</head>
<body>
    @include('sweetalert::alert')
<nav class="navbar navbar-default">
	<div class="navbar-header">
		<a class="navbar-brand" href="#"><i class="fa fa-cube"></i>Uba<b>Meny</b></a>
		<button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
			<span class="navbar-toggler-icon"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
	</div>
	<!-- Collection of nav links, forms, and other content for toggling -->
	<div id="navbarCollapse" class="collapse navbar-collapse">
		{{-- <ul class="nav navbar-nav">
			<li class="active"><a href="#">Home</a></li>
			<li><a href="#">About</a></li>
			<li class="dropdown">
				<a data-toggle="dropdown" class="dropdown-toggle" href="#">Services <b class="caret"></b></a>
				<ul class="dropdown-menu">
					<li><a href="#">Web Design</a></li>
					<li><a href="#">Web Development</a></li>
					<li><a href="#">Graphic Design</a></li>
					<li><a href="#">Digital Marketing</a></li>
				</ul>
			</li>
			<li><a href="#">Blog</a></li>
			<li><a href="#">Contact</a></li>
		</ul> --}}
		{{-- <form class="navbar-form form-inline"> --}}
			{{-- <div class="input-group search-box">
				{{-- <input type="text" id="search" class="form-control" placeholder="Search by Name">
				{{-- <span class="input-group-addon"><i class="material-icons">&#xE8B6;</i></span>
			</div> --}}
		{{-- </form> --}}
		<ul class="nav navbar-nav navbar-right">
            {{-- <li><a href="#" class="notifications"><i class="fa fa-envelope-o"></i><span class="badge" id="myList"></span></a></li> --}}
 <li><a  href="{{ URL('sendToken') }}" class="notifications" onclick="event.preventDefault(); document.getElementById('logout-form10').submit();"><i class="fa fa-envelope-o"></i><span class="badge" id="myList"></span></a></li>

            {{-- <li><a href="#" class="messages"><i class="fa fa-envelope-o"></i><span class="badge">10</span></a></li> --}}
			<li class="dropdown">
				<a href="#" data-toggle="dropdown" class="dropdown-toggle user-action">{{ auth()->user()->nombre }}<b class="caret"></b></a>
				<ul class="dropdown-menu">
					{{-- <li><a href="#"><i class="fa fa-user-o"></i> Profile</a></li> --}}
					{{-- <li><a href="#"><i class="fa fa-calendar-o"></i> Calendar</a></li> --}}
                    @if(auth()->user()->id_role == 3)
                    <li><a href="register"><i class="fa fa-user-o"></i> Registrar Usuarios</a></li>
                    @endif

                        @if($ok == 1  && auth()->user()->id_role == 3)
                        <li>
                            <a  href="{{ URL('generarToken') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form7').submit();">
                                <i class="fa fa-user-o"></i>
                                Generar Token
                            </a>
                        </li>
                        <form id="logout-form7" action="{{ URL('generarToken') }}" method="POST" class="d-none">
                            @csrf
                        </form>

                            <li>
                                <a  href="{{ URL('/sendToken') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form4').submit();">
                                    <i class="fa fa-user-o"></i>
                                    Enviar Token
                                </a>
                            </li>
                            <form id="logout-form4" action="{{ URL('/sendToken') }}" method="POST" class="d-none">
                                @csrf
                            </form>

                        @else
                        <li>
                            <a  href="{{ URL('/sendToken') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form5').submit();">
                                <i class="fa fa-user-o"></i>
                                Pedir Token
                            </a>
                        </li>
                        <form id="logout-form5" action="{{ URL('/sendToken') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                        @endif

					<li class="divider"></li>
                            <li>
                                <a  href="{{ URL('logout') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    <i class="material-icons">&#xE8AC;</i>
                                    Logout
                                </a>
                            </li>
                            <form id="logout-form" action="{{ URL('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>

{{-- FORM DEL MENSAJE --}}
<form id="logout-form10" action="{{ URL('sendToken') }}" method="POST" class="d-none">
    @csrf
    </form>
				</ul>
			</li>
		</ul>
	</div>
</nav>

<CENTER><h1>USUARIOS</h1></CENTER>
<div class="container">
    <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Email</th>
            <th scope="col">Fecha de registro</th>
            <th scope="col">Fecha de actualización</th>
            <th scope="col">Rol</th>

            <th scope="col">Accion</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            @foreach ($usuarios as $usuario)
            @if(auth()->user()->nombre != $usuario->nombre)

            <td>{!! $usuario->nombre !!}</td>
            <td>{!! $usuario->email !!}</td>
            <td>{!! $usuario->created_at !!}</td>
            <td>{!! $usuario->updated_at !!}</td>
            <td>{!! $usuario->id_role !!}</td>

            @if(auth()->user()->id_role == 3)
            <td>
			<form id="logout-form2" action="editarUser/{{$usuario->id}}" method="GET" class="d-none">
			<input type="submit" value="EDITAR ADMIN" class="btn btn-success Sbtn-sm ">
		     </form>
		    </td>
			<td>
			 <form id="logout-form3" action="/Eliminar" method="POST" class="d-none">
             @method("delete")
			 <input type="hidden" name="id" value="{{$usuario->id}}">
			 @csrf
			 <input type="submit" value="ELIMINAR ADMIN" class="btn btn-danger btn-sm" >
		     </form>
		    </td>
            @endif
            @if(auth()->user()->id_role < 3)

<td>
    <form id="logout-form24" action="editarUserBajo/{{$usuario->id}}" method="GET" class="d-none">
        <input type="submit" value="EDITAR BAJO" class="btn btn-success btn-sm ">
         </form>
</td>

<td>
                <form id="logout-form3" action="tokeneliminar/{{$usuario->id}}" method="GET" class="d-none">
                <input type="hidden" name="id" value="{{$usuario->id}}">
                <input type="submit" value="ELIMINAR user bajo" class="btn btn-danger btn-sm" >
                </form>
    </td>
                @endif
          </tr>
        </tbody>
        @endif
        @endforeach
      </table>
</div>

</body>
</html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
{{--
<script type='text/javascript'>
	document.oncontextmenu = function(){return false}

</script> --}}
