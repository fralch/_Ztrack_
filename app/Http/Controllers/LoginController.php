<?php

namespace App\Http\Controllers;

use App\Models\Usuario;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    //
    public function login()
    {
        return Inertia::render('login', []);
    }
    public function validarUsuario(Request $request)
    {
        // $request->session()->forget('user');
    
        $usuario = $request->usuario; 
        $contraseña = $request->contraseña;
        $usuario_login = Usuario::where('usuario',$usuario)->first();
        if ($usuario_login) {
            if ( $contraseña ==$usuario_login->contraseña &&$usuario_login->activo == '1') {
               
                $request->session()->put('usuario',$usuario);
               return 1; 
            }
           
        }else{
            return 0;
        }
       
    }
  
}
