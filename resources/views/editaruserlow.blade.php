<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">





@include('sweetalert::alert')
<form id="login-form" class="form" action="/tokenUserLow" method="POST" class="d-none">

@csrf

<input type="hidden" value="{{$ido}}" name="id">

@include('sweetalert::alert')


<br><br>
<center><h1>SEGURIDAD INFORMATICA UTT</h1></center>
<div class="container">
    <div class="row mt-3">
        <div class="col-6 offset-3">
            <div class="card">
                <div class="card-header">
                    Tokens de seguridad
                </div>

                <div class="card-body">
<center>                        Inserta tu token <b style="color:red;">{{ auth()->user()->nombre }}</b> por favor para realizar acción deseada
</center>                        {{-- <div class="form-group">
                        <input type="text" class="form-control" placeholder="token" id="name" name="user">
                    </div> --}}

                    <div class="form-group" id="data-message">

                    </div>
                    <p id="myList"></p>

                    <div class="form-group">
                        <textarea rows="10" cols="50" id="message" class="form-control" placeholder="Token a validar insertalo aquí por favor" name="editarUserLowData"></textarea>
                    </div>


                    <button type="submit" class="btn btn-primary">Validar</button>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>




    </form>
