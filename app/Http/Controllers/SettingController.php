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
use App\Models\Usuario_Empresa;

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
                                'emp.nombre_empresa',
                                'emp.descripcion_booking',
                                'emp.temp_contratada',
                                'emp.created_at',
                            )
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
            'admin' => $request->admin,
            'admin_madurador' => $request->admin_mad,
            'correo' => $request->correo,
            'contraseña' => $request->pass,
        ]);

        $usuario_all = Usuario::all();
        return $usuario_all; 
    }
    public function borrarUsuario(Request $request)
    {
        $usuario = Usuario::where('id',$request->id_usuario)->delete();
        $usuario_all = Usuario::all();
        return $usuario_all; 
    }

    public function nuevaEmpresa(Request $request)
    {
        // return $request; 
        $empresa_existe = Empresa::where('nombre_empresa',$request->nombre_empresa)->get();
        if (count($empresa_existe) > 0) {
            return 'empresa_existe'; 
        }
        $empresa = Empresa::create([
            'nombre_empresa' => $request->nombre_empresa,
            'descripcion_booking' => $request->booking,
            'temp_contratada' => $request->booking_temp,
        ]);
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
        return $empresas;
    }
    public function asignarContenedor(Request $request)
    {
        // return $request; 
        $contenedor_existe = Contenedor::where('empresa_id',$request->asig_empresa)->where('id',$request->asig_contenedor)->get();
        if (count($contenedor_existe) > 0) {
            return 'asignacion_existe'; 
        }
        
        $contenedor = Contenedor::where('id',$request->asig_contenedor)
                        ->update(['empresa_id'=>$request->asig_empresa]);
        return $contenedor;
    }
    public function filtrar_contenedoresXempresas(Request $request)
    {
        // return $request; 
        $contenedores_filt= Contenedor::from('contenedores as con')
                            ->select()
                            ->where('empresa_id',$request->id_empresa)
                            ->get(); 
        return $contenedores_filt; 
    }
    
    public function nuevoContenedor(Request $request)
    {
        // return $request; 
        $contenedor_existe = Contenedor::where('nombre_contenedor',$request->nuevo_contenedor)->get();
        if (count($contenedor_existe) > 0) {
            return 'contenedor_existe'; 
        }
        $contenedor = Contenedor::create([
            'nombre_contenedor' => $request->nuevo_contenedor,
            'tipo' => $request->nuevo_tipo_contenedor,
            'encendido' => 1,
            'booking' => $request->nuevo_booking_contenedor,
            'booking_temp' => $request->nuevo_booking_temp_contenedor
        ]);
        return Contenedor::all();
    }
    public function cambiarEstadoContenedor(Request $request)
    {
        // return $request; 
        $contenedor = Contenedor::find($request->id_contenedor);
        $contenedor->encendido = !$contenedor->encendido;
        $contenedor->save();
        return Contenedor::all();
    }
    public function obtener_usuario_empresa(Request $request)
    {
        // return $request; 
        $usuario_empresa = Usuario::from('usuarios as us')
                            ->select(
                                'us.usuario',
                                'us.id',
                            )
                            ->join('usuario_empresa', 'usuario_empresa.usuario_id', 'us.id')
                            ->where('usuario_empresa.empresa_id',$request->id_empresa)
                            ->get();
        return $usuario_empresa;
    }
    public function asignar_usuario_empresa(Request $request)
    {
        // return $request; 
        $usuario_empresa = Usuario_empresa::create([
            'usuario_id' => $request->id_usuario,
            'empresa_id' => $request->id_empresa,
        ]);
        return Usuario_empresa::all();
    }
}