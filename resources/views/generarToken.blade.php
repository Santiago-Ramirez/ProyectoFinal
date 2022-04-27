<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://js.pusher.com/5.0/pusher.min.js"></script>
<html>
    <body>

        @include('sweetalert::alert')




            <div class="container">
                <div class="row mt-3">
                    <div class="col-6 offset-3">
                        <div class="card">
                            <div class="card-header">
                                Tokens de seguridad
                            </div>

                            <div class="card-body">
        <center>                        Bienvenido <b style="color:red;">{{ auth()->user()->nombre }}</b>
        </center>                        {{-- <div class="form-group">
                                    <input type="text" class="form-control" placeholder="token" id="name" name="user">
                                </div> --}}

                                <div class="form-group" id="data-message">

                                </div>
                                <p id="myList"></p>

                                <div class="form-group">
                                    <textarea rows="10" cols="50" id="message" class="form-control" placeholder="Message" name="message">{{ $tok }}</textarea>
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
            </div>








    </body>
</html>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

