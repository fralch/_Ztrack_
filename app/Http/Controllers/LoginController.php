<?php

namespace App\Http\Controllers;

use App\Models\User;

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
    
        $user = $request->user; 
        $password = $request->password;
        $user_login = User::where('user', $user)->first();
        if ($user_login) {
            if ( $password == $user_login->password && $user_login->activo == '1') {
               
                $request->session()->put('user', $user);
               return 1; 
            }
           
        }else{
            return 0;
        }
       
    }
  
}
