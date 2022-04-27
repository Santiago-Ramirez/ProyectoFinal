<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="{{ URL::to('css/login.css') }}">
    <link
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
  rel="stylesheet"
/>
<!-- Google Fonts -->
<link
  href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
  rel="stylesheet"
/>
 <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<!-- MDB -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.2/mdb.min.css"
  rel="stylesheet"
/>
    <title>Iniciar Sesión</title>
    <style>

body {
  margin: 0;
  padding: 0;
  background: #eeeeee;
  height: 100vh;
}
#login .container #login-row #login-column #login-box {
  margin-top: 120px;
  max-width: 600px;
  height: 320px;
  border: 1px solid #9C9C9C;
  background-color: #EAEAEA;
}
#login .container #login-row #login-column #login-box #login-form {
  padding: 20px;
}
#login .container #login-row #login-column #login-box #login-form #register-link {
  margin-top: -85px;
}
    </style>

{!! NoCaptcha::renderJs() !!}

</head>
<body>
    @include('sweetalert::alert')
    <div id="login">
        <h3 class="text-center text-dark pt-5">Iniciar Sesión MenyUba</h3>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="login" method="POST">
                        @csrf
                            <h3 class="text-center text-info">Login</h3>
                            <div class="form-group">
                                <label for="username" class="text-info">Correo Electronico:</label><br>
                                <input type="email" id="typeEmailX" class="form-control form-control-lg" name="email" required>
                            </div>
                            <span style="color:red;">@error('email')
                        {{$message}}
                        @enderror
                    </span>
                            <div class="form-group">
                                <label for="password" class="text-info">Contraseña:</label><br>
                                <input class="form-control" type="password" id="typePasswordX" name="password" required>
                            </div>
                            <span style="color:red;">@error('password')
                        {{$message}}
                        @enderror
                    </span>
                    <div class="form-group">

                        {!! NoCaptcha::display() !!}
                    </div>

                            <div class="form-group">
                                <button type="submit" name="submit" class="btn btn-info btn-md">Entrar</button>



                            <div id="register-link" class="text-right">
                                <a href="register" class="text-info">Registrate aquí</a>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

<br><br><br>
      </section>

<script
    type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.2/mdb.min.js"
></script>
</body>
</html>
