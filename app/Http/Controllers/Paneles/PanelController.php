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
        $actualizado =  Usuario::where('usuario', session()->get('usuario'))->update(['ultimo_acceso' => date('Y-m-d H:i:s')]);
        if ($actualizado == 1) {
            $usuario = Usuario::where('usuario', session()->get('usuario'))->get();
        }
        if (count($usuario) != 0) {

            $empresaXusuario = Empresa::where('usuario_id', $usuario[0]->id)->get();
            $contenedores_todos = Contenedor::count();

            $contenedores_encendidos_reefer = Contenedor::select()->where([['encendido', 1], ['tipo', 'Reefer']])->count();

            $contenedores_encendidos_gen = Contenedor::select()->where([['encendido', 1], ['tipo', 'Generador']])->count();

            return Inertia::render('Panel/new_board', [
                'usuario_logeado' => $usuario,
                'empresa_logeado' => $empresaXusuario,
                'contenedores_todos_length' => $contenedores_todos,
                'contenedores_encendidos_reefer_length' => $contenedores_encendidos_reefer,
                'contenedores_encendidos_gen_length' => $contenedores_encendidos_gen,
            ]);
        }
    }
    public function obtenerContendor(Request $request)
    {
        if ($request->tipo == 'reefer') {
            return $contenedores_encendidos_reefer = Contenedor::select()->where([['encendido', 1], ['tipo', 'Reefer']])->get();
        }
            return $contenedores_encendidos_gen = Contenedor::select()->where([['encendido', 1], ['tipo', 'Generador']])->get();
    }
    public function resumen_contenedores(Request $request)
    {
        // return $request; 
        $id_contenedor = $request->id_contenedor;
        $tipo_contenedor = $request->tipo_contenedor;
        if ($tipo_contenedor == 'reefer') {
            return $ultimo_dato_contenedor = Registro_diario_reefers::where('contenedor_id', $id_contenedor)->orderBy('id', 'desc')->first();
        }
        if ($tipo_contenedor == 'genset') {
            return $ultimo_dato_contenedor = Registro_diario_generadores::select()
                ->join('alarmas as al', 'al.id', 'registro_diario_generadores.alarma_id')
                ->join('eventos as e', 'e.id', 'registro_diario_generadores.evento_id')
                ->where('registro_diario_generadores.contenedor_id', $id_contenedor)
                ->orderBy('registro_diario_generadores.id', 'desc')
                ->first();
        }
    }

    public function faker_datos()
    {
        # code...
        Registro_diario_generadores::create([
            'contenedor_id' => rand(2, 5),
            'battery_voltage' => rand((1 * 1), (10 * 10)) / 10,
            'water_temp' => rand((1 * 1), (10 * 10)) / 10,
            'running_frequency' => rand((1 * 1), (10 * 10)) / 10,
            'fuel_level' => rand((1 * 1), (10 * 10)) / 10,
            'voltage_measure' => rand((1 * 1), (10 * 10)) / 10,
            'rotor_current' => rand((1 * 1), (10 * 10)) / 10,
            'fiel_current' => rand((1 * 1), (10 * 10)) / 10,
            'speed' => rand(0, 1),
            'eco_power' => rand(0, 1),
            'rpm' => rand(0, 10),
            'unit_mode' => 'starting',
            'horometro' => rand(0, 10),
            'alarma_id' => 1,
            'evento_id' => rand(1, 25),
            'modelo' => 'sg',
            'latitud' => -12.014386,
            'longitud' => -75.230926,
            'engine_state' => 'start',
            'reefer_conected' => 'Zgru2245761',
            'set_point' => rand(0, 10),
            'temp_supply_1' => rand(0, 10),
            'return_air'  => rand(0, 10),
        ]);

        Registro_diario_reefers::create([
            'contenedor_id' => 1,

            'set_point' => rand((1 * 1), (10 * 10)) / 10,
            'temp_supply_1' => rand((1 * 1), (10 * 10)) / 10,
            'temp_supply_2' => rand((1 * 1), (10 * 10)) / 10,
            'return_air' => rand((1 * 1), (10 * 10)) / 10,
            'evaporation_coil' => rand((1 * 1), (10 * 10)) / 10,
            'condensation_coil' => rand((1 * 1), (10 * 10)) / 10,
            'compress_coil_1' => rand((1 * 1), (10 * 10)) / 10,
            'compress_coil_2' => rand((1 * 1), (10 * 10)) / 10,
            'ambient_air' => rand((1 * 1), (10 * 10)) / 10,
            'cargo_1_temp' => rand((1 * 1), (10 * 10)) / 10,
            'cargo_2_temp' => rand((1 * 1), (10 * 10)) / 10,
            'cargo_3_temp' => rand((1 * 1), (10 * 10)) / 10,
            'cargo_4_temp' => rand((1 * 1), (10 * 10)) / 10,
            'relative_humidity' => rand(0, 10),
            'avl' => rand(0, 10),
            'suction_pressure' => rand((1 * 1), (10 * 10)) / 10,
            'discharge_pressure' => rand((1 * 1), (10 * 10)) / 10,
            'line_voltage'  => rand(0, 10),
            'line_frequency' => rand(0, 10),
            'consumption_ph_1' => rand((1 * 1), (10 * 10)) / 10,
            'consumption_ph_2' => rand((1 * 1), (10 * 10)) / 10,
            'consumption_ph_3' => rand((1 * 1), (10 * 10)) / 10,
            'co2_reading' => rand((1 * 1), (10 * 10)) / 10,
            'o2_reading' => rand((1 * 1), (10 * 10)) / 10,
            'evaporator_speed'  => rand(0, 10),
            'condenser_speed'  => rand(0, 10),
            'battery_voltage' => rand((1 * 1), (10 * 10)) / 10,
            'power_kwh' => rand((1 * 1), (10 * 10)) / 10,
            'power_trip_reading' => rand((1 * 1), (10 * 10)) / 10,
            'power_trip_duration'  => rand(0, 10),
            'suction_temp' => rand((1 * 1), (10 * 10)) / 10,
            'discharge_temp' => rand((1 * 1), (10 * 10)) / 10,
            'supply_air_temp' => rand((1 * 1), (10 * 10)) / 10,
            'return_air_temp' => rand((1 * 1), (10 * 10)) / 10,
            'dl_battery_temp' => rand((1 * 1), (10 * 10)) / 10,
            'dl_battery_charge' => rand((1 * 1), (10 * 10)) / 10,
            'power_consumption' => rand((1 * 1), (10 * 10)) / 10,
            'power_consumption_avg' => rand((1 * 1), (10 * 10)) / 10,
            'alarm_present'  => rand(0, 1),
            'capacity_load'  => rand(0, 10),
            'power_state'  => '0xff',
            'controlling_mode'  => 'optimized',
            'humidity_control'  => rand(0, 1),
            'humidity_set_point'  => rand(0, 10),
            'fresh_air_ex_mode'  => rand(0, 10),
            'fresh_air_ex_rate'  => rand(0, 10),
            'fresh_air_ex_delay'  => rand(0, 10),
            'set_point_o2'  => rand(0, 10),
            'set_point_co2'  => rand(0, 10),
            'defrost_term_temp' => rand((1 * 1), (10 * 10)) / 10,
            'defrost_interval'  => rand(0, 10),
            'water_cooled_conde'  => rand(0, 1),
            'usda_trip'  => rand(0, 1),
            'evaporator_exp_valve'  => rand(0, 10),
            'suction_mod_valve'  => rand(0, 10),
            'hot_gas_valve'  => rand(0, 10),
            'economizer_valve'  => rand(0, 10),
            'modelo'  => 'thermoking',
            'latitud' => -12.024386,
            'longitud' => -75.210926,

        ]);
    }

    public function obtener_datos_contenedor(Request $request)
    {
        // return $request; 
        $id_contenedor = $request->id;
        $tipo_contenedor = $request->tipo;

        if ($tipo_contenedor == 'Generador') {
            return Registro_diario_generadores::from('registro_diario_generadores')
                ->select()
                ->where('contenedor_id', $id_contenedor)
                ->latest()
                ->take(30)
                ->get();
        }
        if ($tipo_contenedor == 'Reefer') {
            return Registro_diario_reefers::from('registro_diario_reefers')
                ->select()
                ->where('contenedor_id', $id_contenedor)
                ->latest()
                ->take(30)
                ->get();
        }
    }
    public function obtenerLatLong(Request $request)
    {
        $id_registro = $request->id;
        $tipo_contenedor = $request->tipo;

        if ($tipo_contenedor == 'Generador') {
            return Registro_diario_generadores::from('registro_diario_generadores')
                ->select()
                ->where('id', $id_registro)
                ->latest()
                ->get()[0];
        }
        if ($tipo_contenedor == 'Reefer') {
            return Registro_diario_reefers::from('registro_diario_reefers')
                ->select()
                ->where('id', $id_registro)
                ->latest()
                ->get()[0];
        }
    }

    public function get_alarma_evento(Request $request)
    {
        // return $request; 
        $cantidad_alarma = Registro_diario_generadores::from('registro_diario_generadores as rdg')
            ->select(
                'al.nombre_alarma',
                DB::raw('count(rdg.alarma_id) as cantidad_alarma'),
            )
            ->join('alarmas as al', 'al.id', 'rdg.alarma_id')
            ->where('contenedor_id', $request->id)
            ->groupBy('al.nombre_alarma')
            ->take(5)
            ->get();

        $cantidad_evento = Registro_diario_generadores::from('registro_diario_generadores as rdg')
            ->select(
                'e.nombre_evento',
                DB::raw('count(rdg.evento_id) as cantidad_evento'),
            )
            ->join('eventos as e', 'e.id', 'rdg.evento_id')
            ->where('contenedor_id', $request->id)
            ->groupBy('e.nombre_evento')
            ->take(5)
            ->get();

        return $arreglo_alarma_evento = [
            'alarma' => $cantidad_alarma,
            'evento' => $cantidad_evento,
        ];
    }
    // -------------- APIS --------------
    public function api_contendedores(Request $request)
    {
        // return $request; 
        // exit();
        if ($request->tipo == 'Generador') {

            $id_r = Contenedor::select()->where([['nombre_contenedor', $request->nombre_contenedor]])->get()->last()['id'];
            Registro_diario_generadores::create([
                'contenedor_id' => $id_r,
                'battery_voltage' => $request->battery_voltage,
                'water_temp' => $request->water_temp,
                'running_frequency' => $request->running_frequency,
                'fuel_level' => $request->fuel_level,
                'voltage_measure' => $request->voltage_measure,
                'rotor_current' => $request->rotor_current,
                'fiel_current' => $request->fiel_current,
                'speed' => $request->speed,
                'eco_power' => $request->eco_power,
                'rpm' => $request->rpm,
                'unit_mode' => $request->unit_mode,
                'horometro' => $request->horometro,
                'alarma_id' => 1,
                'evento_id' => 1,
                'modelo' => $request->modelo,
                'latitud' =>     $request->latitud,
                'longitud' => $request->longitud,
                'engine_state' => $request->engine_state,
                'reefer_conected' => $request->reefer_conected,
                'set_point' => $request->set_point,
                'temp_supply_1' => $request->temp_supply_1,
                'return_air' => $request->return_air,
            ]);
            if ($request->reefer_conected != '-') {
                $id_rc = Contenedor::select()->where([['nombre_contenedor', $request->reefer_conected]])->get()->last()['id'];
                Registro_diario_reefers::create([
                    'contenedor_id' => $id_rc,
                    'set_point' => $request->set_point,
                    'temp_supply_1' => $request->temp_supply_1,
                    'return_air' => $request->return_air,
                    'latitud' =>    $request->latitud,
                    'longitud' =>   $request->longitud,

                ]);
                return "genset y reefer guardado guardado ;D";
            }
            return "genset guardado ;D";
        }
        if ($request->tipo == 'Reefer') {
            $id_g = Contenedor::select()->where([['nombre_contenedor', $request->nombre_contenedor]])->get()->last()['id'];
            Registro_diario_reefers::create([
                'contenedor_id' => $id_g,
                'set_point' => $request->set_point,
                'temp_supply_1' => $request->temp_supply_1,
                'temp_supply_2' => $request->temp_supply_2,
                'return_air' => $request->return_air,
                'evaporation_coil' => $request->evaporation_coil,
                'condensation_coil' => $request->condensation_coil,
                'compress_coil_1' => $request->compress_coil_1,
                'compress_coil_2' => $request->compress_coil_2,
                'ambient_air' => $request->ambient_air,
                'cargo_1_temp' => $request->cargo_1_temp,
                'cargo_2_temp' => $request->cargo_2_temp,
                'cargo_3_temp' => $request->cargo_3_temp,
                'cargo_4_temp' => $request->cargo_4_temp,
                'relative_humidity' => $request->relative_humidity,
                'avl' => $request->avl,
                'suction_pressure' => $request->suction_pressure,
                'discharge_pressure' => $request->discharge_pressure,
                'line_voltage'  => $request->line_voltage,
                'line_frequency' => $request->line_frequency,
                'consumption_ph_1' => $request->consumption_ph_1,
                'consumption_ph_2' => $request->consumption_ph_2,
                'consumption_ph_3' => $request->consumption_ph_3,
                'co2_reading' => $request->co2_reading,
                'o2_reading' => $request->o2_reading,
                'evaporator_speed'  => $request->evaporator_speed,
                'condenser_speed'  => $request->condenser_speed,
                'battery_voltage' => $request->battery_voltage,
                'power_kwh' => $request->power_kwh,
                'power_trip_reading' => $request->power_trip_reading,
                'power_trip_duration'  => $request->power_trip_duration,
                'suction_temp' => $request->suction_temp,
                'discharge_temp' => $request->discharge_temp,
                'supply_air_temp' => $request->supply_air_temp,
                'return_air_temp' => $request->return_air_temp,
                'dl_battery_temp' => $request->dl_battery_temp,
                'dl_battery_charge' => $request->dl_battery_charge,
                'power_consumption' => $request->power_consumption,
                'power_consumption_avg' => $request->power_consumption_avg,
                'alarm_present'  => $request->alarm_present,
                'capacity_load'  => $request->capacity_load,
                'power_state'  => $request->power_state,
                'controlling_mode'  => $request->controlling_mode,
                'humidity_control'  => $request->humidity_control,
                'humidity_set_point'  => $request->humidity_set_point,
                'fresh_air_ex_mode'  => $request->fresh_air_ex_mode,
                'fresh_air_ex_rate'  => $request->fresh_air_ex_rate,
                'fresh_air_ex_delay'  => $request->fresh_air_ex_delay,
                'set_point_o2'  => $request->set_point_o2,
                'set_point_co2'  => $request->set_point_co2,
                'defrost_term_temp' => $request->defrost_term_temp,
                'defrost_interval'  => $request->defrost_interval,
                'water_cooled_conde'  => $request->water_cooled_conde,
                'usda_trip'  => $request->usda_trip,
                'evaporator_exp_valve'  => $request->evaporator_exp_valve,
                'suction_mod_valve'  => $request->suction_mod_valve,
                'hot_gas_valve'  => $request->hot_gas_valve,
                'economizer_valve'  =>  $request->economizer_valve,
                'modelo'  => $request->modelo,
                'latitud' =>    $request->latitud,
                'longitud' =>   $request->longitud,

            ]);
            return "reefer guardado ;D";
        }
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