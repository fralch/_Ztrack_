<?php

namespace App\Http\Controllers\Paneles;

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

class PanelController extends Controller
{
  
    
    public function board()
    {
        date_default_timezone_set("America/Lima");
        $usuario = []; 
        if (session()->get('usuario') == null) {
            return redirect('/');
        }
        $actualizado =  Usuario::where('usuario',session()->get('usuario'))->update(['ultimo_acceso'=>date('Y-m-d H:i:s')]);
        if ($actualizado == 1) {
            $usuario = Usuario::where('usuario',session()->get('usuario'))->get();
        }
        if (count($usuario) != 0) {

            $empresaXusuario = Empresa::where('usuario_id',$usuario[0]->id)->get();
            $contenedores_todos = Empresa_contenedore::select('contenedores.id as contenedores_id', 'contenedores.nombre_contenedor', 
                                        'contenedores.tipo', 'contenedores.encendido', 'empresas.id', 'empresas.usuario_id', 
                                        'empresas.nombre_empresa', 'empresas.descripcion_booking', 'empresas.temp_contratada')
                                        ->join('contenedores', 'contenedores.id', 'empresas_contenedores.contenedor_id')
                                        ->join('empresas', 'empresas.id', 'empresas_contenedores.empresa_id')
                                        ->get();
        //    $contenedores_encendidos = Empresa_contenedore::select('contenedores.id as contenedores_id', 'contenedores.nombre_contenedor', 
        //                                 'contenedores.tipo', 'contenedores.encendido', 'empresas.id', 'empresas.usuario_id', 
        //                                 'empresas.nombre_empresa', 'empresas.descripcion_booking', 'empresas.temp_contratada')
        //                                 ->join('contenedores', 'contenedores.id', 'empresas_contenedores.contenedor_id')
        //                                 ->join('empresas', 'empresas.id', 'empresas_contenedores.empresa_id')
        //                                 ->where('contenedores.encendido','encendido')
        //                                 ->get();
            
             $contenedores_encendidos =Contenedor::select(
                                            'contenedores.id', 
                                            'contenedores.id as contenedores_id', 
                                            'contenedores.nombre_contenedor', 
                                            'contenedores.tipo', 
                                            'contenedores.encendido', 
                                            // 'contenedores.created_at',
                                            'registro_diario_reefers.set_point', 
                                            'registro_diario_reefers.temp_supply', 
                                            'registro_diario_reefers.temp_return', 
                                            'registro_diario_reefers.re_hume', 
                                            'registro_diario_reefers.temp_supply',
                                            'registro_diario_reefers.temp_return',
                                            'registro_diario_reefers.re_hume',
                                            'registro_diario_reefers.fuel_level',
                                            'registro_diario_reefers.vdc',
                                            'registro_diario_reefers.rpm',
                                            'registro_diario_reefers.freq',
                                            'registro_diario_reefers.vac',
                                            'registro_diario_reefers.latitud',
                                            'registro_diario_reefers.longitud',
                                            'registro_diario_reefers.temp_motor',
                                            'registro_diario_reefers.status',
                                            'registro_diario_reefers.speed',
                                            'registro_diario_reefers.ecopower',
                                            'registro_diario_reefers.horometro',
                                            'registro_diario_reefers.modelo',
                                            'registro_diario_reefers.created_at',
                                            'registro_diario_reefers.updated_at',
                                            'registro_diario_reefers.id as reefer_id',

                                                )
                                                ->join('registro_diario_reefers', 'registro_diario_reefers.contenedor_id', 'contenedores.id')
                                                ->latest()
                                                ->take(1)
                                                ->get();

            return Inertia::render('Panel/board', [
                'usuario_logeado' => $usuario,
                'empresa_logeado' => $empresaXusuario,
                'contenedores_todos' => $contenedores_todos,
                'contenedores_encendidos' => $contenedores_encendidos,
            ]);
        }
        
    }
    public function faker_datos()
    {
        # code...
        Registro_diario_generadores::create([
            'contenedor_id' => 2,
            'nombre_contenedor' => 'generador',
            'set_point' => rand((1*10),(100*10))/10,
            'temp_supply' => rand((1*10),(100*10))/10,
            'temp_return' => rand((1*10),(100*10))/10,
            're_hume' => rand((1*10),(100*10))/10,
            're_c_o2' => rand((1*10),(100*10))/10,
            're_o2' => rand((1*10),(100*10))/10,
            'alv' => rand(10,100),
            'latitud'=> -12.014386,
            'longitud' =>-75.230926,
            'status' => 'on',
            'modelo' => 'ThermoKing',
        ]);

        Registro_diario_reefers::create([
            'contenedor_id' => 1,
            'nombre_contenedor' => 'reefer',
            'set_point' => rand((1*10),(100*10))/10,
            'temp_supply' => rand((1*10),(100*10))/10,
            'temp_return' => rand((1*10),(100*10))/10,
            're_hume' => rand((1*10),(100*10))/10,
            'fuel_level' => rand(10,100),
            'vdc' => rand(10,100),
            'rpm' => rand(10,100),
            'freq' => rand(10,100),
            'vac' => rand(10,100),
            'latitud'=> -12.014386,
            'longitud' =>-76.230926,
            'temp_motor' => rand((1*10),(100*10))/10,
            'status' => 'on',
            'speed' => rand(10,100),
            'ecopower' => 'on',
            'horometro' => rand(10,100),
            'alarma_id' =>rand(1,24),
            'evento_id' => rand(1,25),
            'modelo' => 'ThermoKing',
        ]);
    }

    public function obtener_datos_contenedor(Request $request)
    {
        // return $request; 
        $id_contenedor = $request->id;
        $tipo_contenedor = $request->tipo;
        
        if ($tipo_contenedor == 'Generador') {
            return Registro_diario_reefers::from('registro_diario_reefers as rdr')
                    ->select(
                        'rdr.set_point', 
                        'rdr.temp_supply', 
                        'rdr.temp_return', 
                        'rdr.re_hume', 
                        'rdr.re_c_o2', 
                        'rdr.re_o2', 
                        'rdr.alv', 
                        'rdr.latitud', 
                        'rdr.longitud', 
                        'rdr.status', 
                        'rdr.modelo',
                        'rdr.created_at',
                        'rdr.updated_at',
                        'c.nombre_contenedor',
                        'rdr.contenedor_id',
                        )
                    ->join('contenedores as c', 'c.id', 'rdr.contenedor_id')
                    ->where('contenedor_id',$id_contenedor)
                    ->latest()
                    ->take(30)
                    ->get();
        }
        if ($tipo_contenedor == 'Reefer') {
            return Registro_diario_generadores::from('registro_diario_generadores as rdg')
            ->select(
                'rdg.set_point', 
                'rdg.temp_supply', 
                'rdg.temp_return', 
                'rdg.re_hume', 
                'rdg.temp_supply',
                'rdg.temp_return',
                'rdg.re_hume',
                'rdg.fuel_level',
                'rdg.vdc',
                'rdg.rpm',
                'rdg.freq',
                'rdg.vac',
                'rdg.latitud',
                'rdg.longitud',
                'rdg.temp_motor',
                'rdg.status',
                'rdg.speed',
                'rdg.ecopower',
                'rdg.horometro',
                'rdg.modelo',
                'rdg.created_at',
                'rdg.updated_at',
                'c.nombre_contenedor',
                'al.nombre_alarma',
                'e.nombre_evento',
                'rdg.contenedor_id',
            )
            ->join('contenedores as c', 'c.id', 'rdg.contenedor_id')
            ->join('alarmas as al', 'al.id', 'rdg.alarma_id')
            ->join('eventos as e', 'e.id', 'rdg.evento_id')
            ->where('contenedor_id',$id_contenedor)
            ->latest()
            ->take(30)
            ->get();
        }
    }

    public function get_alarma_evento(Request $request)
    {
        // return $request; 
        if ($request->tipo == 'Generador') {
            return 0 ; 
        }
        if ($request->tipo == 'Reefer') {
            $cantidad_alarma =Registro_diario_generadores::from('registro_diario_generadores as rdg')
            ->select(
                'al.nombre_alarma',       
                DB::raw('count(rdg.alarma_id) as cantidad_alarma'),
            )
            ->join('alarmas as al', 'al.id', 'rdg.alarma_id')
            ->where('contenedor_id',$request->id)
            ->groupBy('al.nombre_alarma')
            ->take(5)
            ->get();

            $cantidad_evento =Registro_diario_generadores::from('registro_diario_generadores as rdg')
            ->select(
                'e.nombre_evento',       
                DB::raw('count(rdg.evento_id) as cantidad_evento'),
            )
            ->join('eventos as e', 'e.id', 'rdg.evento_id')
            ->where('contenedor_id',$request->id)
            ->groupBy('e.nombre_evento')
            ->take(5)
            ->get();
             
            return $arreglo_alarma_evento = [
                'alarma' => $cantidad_alarma,
                'evento' => $cantidad_evento,
            ];
        }
    }
    // -------------- APIS --------------
    public function api_reefer(Request $request)
    { 
        return $request; 
    }
}




//http://162.248.55.24/trace/AWS981GHABT2X/ZGRU101342-0?setpoint=4.10&tsupply=23.50&treturn=23.50&rehume=32766&reco2=3276.70&reo2=3276.70&avl=32767&latitude=-08.5&longitude=-79.5&status=off&model=ThermoKing
    /* DATOS ENVIADOS POR GENERADOR
    trace
    AWS981GHABT2X
    ZGRU101342-0
    setpoint=4.10 
    tsupply=23.50
    treturn=23.50
    rehume=32766
    reco2=3276.70
    reo2=3276.70
    avl=32767
    latitude=-08.5
    longitude=-79.5
    status=
    model=ThermoKing
    */
    //http://162.248.55.24/trace/AWS981GHABT2X/ZGUU205301-0?setpoint=0.00&tsupply=0.00&treturn=0.00&rehume=0.00&fuel=0.00&vdc=0.00&rpm=0&freq=0&vac=0&latitude=&longitude=&tmotor=0.00&status=off&speed=low&ecopower=off&horometro=0&alarma.0=&event.0=&model=thermoking"
    /* DATOS ENVIADOS POR REEFER
    trace
    AWS981GHABT2X
    ZGUU205301-0
    setpoint=0.00
    tsupply=0.00
    treturn=0.00
    rehume=0.00
    fuel=0.00
    vdc=0.00
    rpm=0
    freq=0
    vac=0
    latitude=
    longitude=
    tmotor=0.00
    status=off
    speed=low
    ecopower=off
    horometro=0
    alarma.0=
    event.0=
    model=thermoking
    */