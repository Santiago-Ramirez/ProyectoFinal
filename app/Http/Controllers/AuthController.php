<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Token;
use App\Mail\TestEmail;
use App\Mail\CodeConfirm;
use App\Mail\VerifyEmail;
use App\Events\EnviarToken;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Database\Eloquent\Model;
use RealRashid\SweetAlert\Facades\Alert;
use SebastianBergmann\Environment\Console;


class AuthController extends Controller
{


    public function index()
    {
        Mail::to('ubaldo_desantiago@hotmail.com')->send(new TestEmail());
    }

    public function login(Request $request){
            $request->validate([
                'email' => 'required|email',
                'password' => 'required'
            ]);

            $email = $request->input('email');
            $password = $request->input('password');
            if($user = User::where('email', $request->input('email'))->first()){
                session(['idCarrito' => $user->id_role]);
                    if($user->id_role == 1){
                    if(Auth::loginUsingId($user->id)){
                        $request->session()->regenerate();
                        return redirect()->intended('home');
                    }
                }

                else{
                if($user->email_verified_at == null){
                    return back()->withErrors([
                        'email' => 'Tu correo todavía no ha sido verificado, verificalo por favor.',
                    ]);
                }
                if(Hash::check($password, $user->password)){
                    $url = URL::temporarySignedRoute('code', now()->addMinutes(10), ['email' => $user->email]);
                    Mail::to($user->email)->send(new CodeConfirm($user->one_time_code));
                    return redirect($url);
                }
                return back()->withErrors([
                    'password' => 'Contraseña incorrecta.',
                ]);
            }
            return back()->withErrors([
                'email' => 'Las credenciales proporcionadas no coinciden con nuestros registros.',
            ]);
    }

    }


    public function loginWithCode(Request $request){
        $request->validate([
            'code' => 'required|numeric'
        ]);
        $code = $request->input('code');
        error_log($code);
        if($user = User::where('email', $request->input('email'))->first()){
            error_log($user->one_time_code);
            if($user->one_time_code == $code){
                if(Auth::loginUsingId($user->id)){
                    $request->session()->regenerate();
                    $user->one_time_code = rand(100000, 999999);
                    $user->save();

                    if($user->id_role == 3)
                    {
                        // return "AQUI VA TODO EL CODIGO DE LOS SOCKETS";
                        return view('tercer-Metodo');
                    }
                    else
                    {
                        return redirect()->intended('home');
                    }


                }
                error_log('yes');
            }
            return back()->withErrors([
                'code' => 'El código proporcionado es incorrecto.',
            ]);
        }

    }



    public function logoutDos(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        Alert::success('Sesión Finalizada','Nos vemos pronto');
        return redirect('/login');
    }



    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        Alert::success('Sesión Finalizada','Nos vemos pronto');
        return redirect('/login');
    }

    public function register(Request $request){

        $request->validate([
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed',
        ]);


        $code = rand(100000, 999999);
        $email = $request->input('email');
        $user = new User();
        $user->nombre = $request->input('nombre');
        $user->email = $request->input('email');
        $user->one_time_code = $code;
        $user->password = Hash::make($request->input('password'));
        $user->id_role = $request->input('select');

        if($user->save()){
            $this->sendVerificationEmail($email);
            return redirect('/login')->with('success', 'Por favor revise su correo electrónico para verificar su cuenta');
        }
        return response()->json(['message' => 'No se pudo crear el usuario'], 500);
    }

    public function sendVerificationEmail($email="ubaldo_desantiago@hotmail.com"){
        $url = URL::temporarySignedRoute('verifyEmail', now()->addMinutes(30), ['email' => $email]);
        Mail::to($email)->send(new VerifyEmail($url));
        print_r($url);
    }

    public function verifyEmail(Request $request){
        if (! $request->hasValidSignature()) {
            return abort(401);
        }
        try{
            $user = User::where('email', $request->input('email'))->first();
            if($user->email_verified_at != null){
                return redirect('/login')->with('success', 'Tu cuenta ya está verificada');
            }
            $user->email_verified_at = now();
            $user->save();
            return redirect('/login')->with('success', 'Tu cuenta ha sido verificada');
        }catch (\Exception $e){
            return response()->json(['message' => 'El usuario no pudo ser verificado'], 500);
        }
        //return redirect('/login')->with('success', 'Your email has been verified');

    }

    public function index2(Request $request)
   {
    $usuarios = User::get();

    $ok = 0;

    if($request->ip()=='127.0.0.1')
    {
        $ok = 1;
    }
    return view('home-view')->with(compact('usuarios','ok'));
    }



    public function update(Request $request)
    {
        // $usuarios = User::get();
        $ok = 0;
        if($request->ip()=='127.0.0.1')
        {
            $ok = 1;
        }

        $usuario1 = User::find($request->input('id'));
        $usuario1->nombre = $request->input('nombre');
        $usuario1->email = $request->input('email');
        // $user->one_time_code = $code;
        $usuario1->password = Hash::make($request->input('password'));
        $usuario1->id_role = $request->input('select');
        $usuario1->save();
        $usuarios = User::get();
         return view('home-view')->with(compact('usuarios', 'ok'));
        // return "chinga tu madre";

    }

    public function vistaEditar(Request $request, $id)
    {
        $usuarios = User::get();

        $ok = 0;

        if($request->ip()=='127.0.0.1')
        {
            $ok = 1;
        }


        return view('editar', ["ido" => $id], ["ok" => $ok]);
    }


    public function vistaEditarDos($id)
    {

        return view('editaruserlow', ["ido" => $id]);
    }


    public function eliminar(Request $id){

        if(session('idCarrito') == 3)
        {
        $usuario = User::find($id->id);
        $usuario->delete();
        Alert::success('Usuario','Eliminado correctamente');
        $usuarios = User::get();
        return redirect('/home')->with(compact('usuarios'));
                    }
                else
                    {
            return view('tokenInvalido');
                    }
    }

    public function GenerarTocken()
    {
        $token = new Token();
        $tok = Str::uuid();
        $token->tocken = $tok;
        $token->uso = null;
        $token->save();
        return view('generarToken')->with(compact('tok'));
    }

    public function tokenSocket()
    {
        return view('chat-token');
    }

    public function otroMetodo(Request $request)
    {
        //  $request->validate([
        //     'name'=>'required',
        //     'message'=>'required'
        // ]);
        $message = [
            'name'=>$request->name,
            'message'=>$request->message,
        ];
        event(new App\Events\EnviarToken($message));
    }





    public function tokenSendUserLow(Request $request)
    {
        // $email = $request->input('tokenValueUbaldin');
        // return dd($email);
        $id = $request->input('id');
        $valoorsito =  $request->input('editarUserLowData');
        $Token = Token::where("tocken", $valoorsito)->get();
        if (COUNT($Token) > 0)
        {
            if($Token[0]->uso == null){
                $Token[0]->uso = date('y-m-d');
                $Token[0]->save();
                $ok = 0;
                if($request->ip()=='127.0.0.1')
                {
                    $ok = 1;
                }
                return view('editar', ["ido" => $id], ["ok" => $ok]);
            }
            else
            {
                  //Alert::error('AQUI ESTOY EN EL ELSE','Necesitas un token');
                 //  return view('editar', ["ido" => $id]);
                 //return redirect('/Editar');
                return "si funciona puto";
            }
        }
        else
        {
            return view('tokenInvalido');
        }
    }

    public function tokenEliminar(Request $request)
    {
        $id = $request->input('id');
        $valoorsito =  $request->input('TokTok');
        $Token = Token::where("tocken", $valoorsito)->get();
        if (COUNT($Token) > 0)
        {
            if($Token[0]->uso == null){
                $Token[0]->uso = date('y-m-d');
                $Token[0]->save();
                //return view('editar', ["ido" => $id]);
                $usuario = User::find($id);
                $usuario->delete();
                Alert::success('Usuario','Eliminado correctamente');
                $usuarios = User::get();
                return redirect('/home')->with(compact('usuarios'));
            }
            else
            {
                return view('tokenInvalido');
            }
        }
        else
        {
            return view('tokenInvalido');
        }
    }



    public function vistaEliminarDos($id)
    {
        return view('otherviewEdit', ["ido" => $id]);
    }
}


