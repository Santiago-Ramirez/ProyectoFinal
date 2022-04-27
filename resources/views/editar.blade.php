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
<!-- MDB -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.2/mdb.min.css"
  rel="stylesheet"
/>


<style>
    body {
      margin: 0;
      padding: 0;
      background: #eeeeee;
      height: 100vh;
    }
    #login .container #login-row #login-column #login-box {
      margin-top: 120px;
      max-width: 950px;
      height: 515px;
      border: 1px solid #9C9C9C;
      background-color: #EAEAEA;
    }
    #login .container #login-row #login-column #login-box #login-form {
      padding: 40px;
    }
    #login .container #login-row #login-column #login-box #login-form  {
      margin-top: -15px;
    }

    #register-link {
        margin-top: -35px;
        margin-left:300px;
    }
</style>



@include('sweetalert::alert')



<div id="login">
    <h3 class="text-center text-dark pt-5">Editar Usuario</h3>
    <div class="container">
        <div id="login-row" class="row justify-content-center align-items-center">
            <div id="login-column" class="col-md-6">
                <div id="login-box" class="col-md-12">
                    <form id="login-form" class="form" action="/Editar" method="POST">
                        @method("PUT")
                        @csrf
        <div class="form-group">
            <label for="nombre" class="text-info">Nombre:</label><br>
            <input type="hidden" value="{{$ido}}" name="id">
            <input type="text" id="typeEmailX" class="form-control form-control-lg" name="nombre" required>
        </div>
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
            <label for="password" class="text-info">Confirmar contraseña:</label><br>
            <input type="password" id="typePasswordX" class="form-control" name="password_confirmation" required/>
        </div>
<br>
        <div class="form-group">
        <!-- The second value will be selected initially -->
        <select name="select" class="form-control form-control-lg" aria-label=".form-select-lg example">
            <option selected>Eligue un privilegio</option>
            <option value="1">Bajo privilegio</option>
            <option value="2">Medio Privilegio</option>
            <option value="3">Alto Privilegio</option>
          </select>
</div>


        <span style="color:red;">@error('password')
        {{$message}}
        @enderror
    </span>
<br><br>
    <button type="submit" name="submit" class="btn btn-info btn-md">Editar Usuario</button>
</form>



</div>
</div>
</div>



<h1 style="color: #eeeeee;">wf</h1>
<h1 style="color: #eeeeee;">wf</h1>
<h1 style="color: #eeeeee;">wf</h1>


</body>
</html>


<script
    type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.2/mdb.min.js"

></script>
