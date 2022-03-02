<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Models\Alarma;
use App\Models\Contenedor;
use App\Models\Empresa_contenedore;
use App\Models\Empresa;
use App\Models\Eventos;
use App\Models\Registro_diario_generadores;
use App\Models\Registro_diario_reefers;

use App\Http\Controllers\Controller;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SettingController extends Controller
{
    public function verSetting()
    {
        date_default_timezone_set("America/Lima");

        if (session()->get('usuario') == null) {
            return redirect('/');
        }
        $actualizado =  Usuario::where('usuario',session()->get('usuario'))->update(['ultimo_acceso'=>date('Y-m-d H:i:s')]);
        if ($actualizado == 1) {
            $usuario = Usuario::where('usuario',session()->get('usuario'))->get();
        }
        if (count($usuario) != 0) {
            $usuario_todos= Usuario::all();
           $contenedores =  Contenedor::all(); 
            $empresas = Empresa::from('empresas as emp')
                            ->select(
                                'emp.id',
                                'emp.usuario_id',
                                'emp.nombre_empresa',
                                'emp.descripcion_booking',
                                'emp.temp_contratada',
                                'emp.created_at',
                                'us.usuario',
                                'us.apellidos',
                                'us.nombres',
                                'us.activo',
                                'us.admin',
                                'us.correo',

                            )
                            ->join('usuarios as us', 'us.id', 'emp.usuario_id')
                            ->get();
            return Inertia::render('setting', [
                'usuario_logeado' => $usuario,
                'empresas' => $empresas,
                'contenedores' => $contenedores,
                'usuario_todos' => $usuario_todos,
            ]);
        }
    }
    public function nuevoUsuario(Request $request)
    {
        // return $request; 
        $usuario_existe = Usuario::where('usuario',$request->usuario)->get();
        if (count($usuario_existe) > 0) {
            return 'usuario_existe'; 
        }
        $usuario = Usuario::create([
            'usuario' => $request->usuario,
            'apellidos' => $request->apellidos,
            'nombres' => $request->nombres,
            'activo' => 1,
            'admin' => 0,
            'correo' => $request->correo,
            'contraseña' => '12345',
        ]);
        return $usuario->id;
    }
}