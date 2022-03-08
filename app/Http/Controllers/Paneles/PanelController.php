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
            'contenedor_id' =>rand(1,2),
            
            'battery_voltage' => rand((1*1),(10*10))/10,
            'water_temp' => rand((1*1),(10*10))/10,
            'running_frequency' => rand((1*1),(10*10))/10,
            'fuel_level' => rand((1*1),(10*10))/10,
            'voltage_measure' => rand((1*1),(10*10))/10,
            'rotor_current' => rand((1*1),(10*10))/10,
            'fiel_current' => rand((1*1),(10*10))/10,
            'speed' => rand(0,1),
            'eco_power' => rand(0,1),
            'rpm' => rand(0,10),
            'unit_mode' => 'starting',
            'horometro' => rand(0,10),
            'alarma_id' =>rand(1,24),
            'evento_id' => rand(1,25),
            'modelo' => 'sg',
            'latitud'=> -12.014386,
            'longitud' =>-75.230926,
            'engine_state' => 'start',
        ]);

        Registro_diario_reefers::create([
            'contenedor_id' => rand(1,3),

            'set_point' => rand((1*1),(10*10))/10,
            'temp_supply_1' => rand((1*1),(10*10))/10,
            'temp_supply_2' => rand((1*1),(10*10))/10,
            'return_air' => rand((1*1),(10*10))/10,
            'evaporation_coil' => rand((1*1),(10*10))/10,
            'condensation_coil' => rand((1*1),(10*10))/10,
            'compress_coil_1' => rand((1*1),(10*10))/10,
            'compress_coil_2' => rand((1*1),(10*10))/10,
            'ambient_air' => rand((1*1),(10*10))/10,
            'cargo_1_temp' => rand((1*1),(10*10))/10,
            'cargo_2_temp' => rand((1*1),(10*10))/10,
            'cargo_3_temp' => rand((1*1),(10*10))/10,
            'cargo_4_temp' => rand((1*1),(10*10))/10,
            'relative_humidity' => rand(0,10),
            'avl' => rand(0,10),
            'suction_pressure' => rand((1*1),(10*10))/10,
            'discharge_pressure' => rand((1*1),(10*10))/10,
            'line_voltage'  => rand(0,10),
            'line_frequency' => rand(0,10),
            'consumption_ph_1' => rand((1*1),(10*10))/10,
            'consumption_ph_2' => rand((1*1),(10*10))/10,
            'consumption_ph_3' => rand((1*1),(10*10))/10,
            'co2_reading' => rand((1*1),(10*10))/10,
            'o2_reading' => rand((1*1),(10*10))/10,
            'evaporator_speed'  => rand(0,10),
            'condenser_speed'  => rand(0,10),
            'battery_voltage' => rand((1*1),(10*10))/10,
            'power_kwh' => rand((1*1),(10*10))/10,
            'power_trip_reading' => rand((1*1),(10*10))/10,
            'power_trip_duration'  => rand(0,10),
            'suction_temp' => rand((1*1),(10*10))/10,
            'discharge_temp' => rand((1*1),(10*10))/10,
            'supply_air_temp' => rand((1*1),(10*10))/10,
            'return_air_temp' => rand((1*1),(10*10))/10,
            'dl_battery_temp' => rand((1*1),(10*10))/10,
            'dl_battery_charge' => rand((1*1),(10*10))/10,
            'power_consumption' => rand((1*1),(10*10))/10,
            'power_consumption_avg' => rand((1*1),(10*10))/10,
            'alarm_present'  => rand(0,1),
            'capacity_load'  => rand(0,10),
            'power_state'  => '0xff',
            'controlling_mode'  => 'optimized',
            'humidity_control'  => rand(0,1),
            'humidity_set_point'  => rand(0,10),
            'fresh_air_ex_mode'  => rand(0,10),
            'fresh_air_ex_rate'  => rand(0,10),
            'fresh_air_ex_delay'  => rand(0,10),
            'set_point_o2'  => rand(0,10),
            'set_point_co2'  => rand(0,10),
            'defrost_term_temp' => rand((1*1),(10*10))/10,
            'defrost_interval'  => rand(0,10),
            'water_cooled_conde'  => rand(0,1),
            'usda_trip'  => rand(0,1),
            'evaporator_exp_valve'  => rand(0,10),
            'suction_mod_valve'  => rand(0,10),
            'hot_gas_valve'  => rand(0,10),
            'economizer_valve'  => rand(0,10),
            'modelo'  => 'thermoking',
            'latitud'=> -12.024386,
            'longitud' =>-75.210926,
            
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