<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::middleware('guest')->group(function (){
  Route::get('login', function (Request $request) {
    session(['IPVPN' => $request->ip()]);
    if($request->ip() == '192.168.20.3'){

        return view('login-view');
    }
    else{
        return "NECESITA ENTRAR POR VPN AMIGO";
    }
    })->name('login');
});


// Route::get('/generarToken', function () {
//     if($request->ip() == '"IP VPN"'){

//         return view('generarToken');
//     }
//     else{
//         return "A CHINGAR A SU MADRE PUTO";

//     }
// });

// Route::get('/generarToken', function () {
//         return view('generarToken');
//     });
Route::post('generarToken', [AuthController::class, 'GenerarTocken'])->middleware('auth');
Route::post('/tokenUser', [AuthController::class, 'tokenSendUserLow'])->middleware('auth');
Route::get('/register', function () {
    return view('register-view')>middleware('auth');
})->middleware('auth');
Route::get('home', [AuthController::class, 'index2'])->middleware('auth');
Route::get('code/{email}', function ($email) {
     return view('code-view')->with('email', $email);
})->name('code');
Route::fallback(function () {
    return redirect('/login');
})->middleware('auth');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth');
Route::get('/tokenLogout', [AuthController::class, 'logoutDos'])->middleware('auth');
Route::post('/register', [AuthController::class, 'register'])->middleware('auth');
Route::post('code/login-with-code', [AuthController::class, 'loginWithCode']);
Route::get('editarUser/{id}', [AuthController::class, 'vistaEditar'])->middleware('auth');
Route::get('editarUserBajo/{id}', [AuthController::class, 'vistaEditarDos'])->middleware('auth');
Route::post('/tokenUserLow', [AuthController::class, 'tokenSendUserLow'])->middleware('auth');
Route::get('tokeneliminar/{id}', [AuthController::class, 'vistaEliminarDos'])->middleware('auth');
Route::post('/EliminarToken', [AuthController::class, 'tokenEliminar'])->middleware('auth');
Route::put('/Editar', [AuthController::class, 'update'])->middleware('auth');
Route::delete('/Eliminar', [AuthController::class, 'eliminar'])->middleware('auth');
Route::post('/sendToken', [AuthController::class, 'tokenSocket'])->middleware('auth');
Route::get('/pruebaAlerta', [AuthController::class, 'alertaPrueba'])->middleware('auth');
Route::post('/message', function (Request $request) {
    $message = [
        'user'=>auth()->user()->nombre,
        'message'=>$request->input('message'),    ];

    $success = event(new App\Events\EnviarToken($message));
    return $success;
})->middleware('auth');


// Route::post('/sendMeToken', [AuthController::class, 'otroMetodo']);


// Route::get('/register', function () {
//     return view('login')->with('user', Auth::user());
// })->middleware('auth');


