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
use App\Models\Registro_diario_madurador;
use App\Models\Madurador_points;
use App\Models\Usuario_Empresa;

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
        // return $usuario[0]->id; 
        if (count($usuario) != 0) {
            $admin = Usuario::where('usuario', session()->get('usuario'))->where('admin', 1)->get();
            if (count($admin) != 0) {
                $empresaXusuario = Empresa::join('usuario_empresa as ue', 'ue.empresa_id', 'empresas.id')->where('ue.usuario_id', $usuario[0]->id)->get();
                $contenedores_todos = Contenedor::count();
                $contenedores_encendidos_reefer = Contenedor::select()->where([['encendido', 1], ['tipo', 'Reefer']])->get();
                $contenedores_encendidos_gen = Contenedor::select()->where([['encendido', 1], ['tipo', 'Generador']])->get();
                $contenedores_encendidos_mad = Contenedor::select()->where([['encendido', 1], ['tipo', 'Madurador']])->get();
            } else {
                $empresaXusuario = Empresa::join('usuario_empresa as ue', 'ue.empresa_id', 'empresas.id')->where('ue.usuario_id', $usuario[0]->id)->get();
                $contenedores_todos = Contenedor::where('empresa_id', $empresaXusuario[0]->empresa_id)->count();

                $contenedores_encendidos_reefer = Contenedor::where([['empresa_id', $empresaXusuario[0]->empresa_id], ['encendido', 1], ['tipo', 'Reefer']])->get();
                $contenedores_encendidos_gen = Contenedor::where([['empresa_id', $empresaXusuario[0]->empresa_id], ['encendido', 1], ['tipo', 'Generador']])->get();
                $contenedores_encendidos_mad = Contenedor::where([['empresa_id', $empresaXusuario[0]->empresa_id], ['encendido', 1], ['tipo', 'Madurador']])->get();
            }


            return Inertia::render('Panel/new_board', [
                'usuario_logeado' => $usuario,
                'empresa_logeado' => $empresaXusuario,
                'contenedores_todos_length' => $contenedores_todos,
                'contenedores_encendidos_reefer' => $contenedores_encendidos_reefer,
                'contenedores_encendidos_gen' => $contenedores_encendidos_gen,
                'contenedores_encendidos_mad' => $contenedores_encendidos_mad,
            ]);
        }
    }
    public function obtenerContendor(Request $request)
    {
        if ($request->tipo == 'reefer') {
            $contenedores_encendidos_reefer = Contenedor::select()->where([['encendido', 1], ['tipo', 'Reefer']])->get();
            $reefer_completo = [];
            foreach ($contenedores_encendidos_reefer as $contendor) {
                $datos_r = $this->getDatosResumen($contendor, 'reefer');
                if ($datos_r) {
                    $reefer_completo[] = $datos_r;
                }
            }
            return $reefer_completo;
        }
        if ($request->tipo == 'genset') {
            $contenedores_encendidos_gen = Contenedor::select()
                                            ->where([['encendido', 1], ['tipo', 'Generador']])
                                            ->get();
            $genset_completo = [];
            foreach ($contenedores_encendidos_gen as $contendor) {
                $datos_g = $this->getDatosResumen($contendor, 'genset');
                if ($datos_g) {
                    $genset_completo[] = $datos_g;
                }
            }
            return $genset_completo;
        }
        if ($request->tipo == 'madurador') {
            $contenedores_encendidos_mad = Contenedor::select()->where([['encendido', 1], ['tipo', 'Madurador']])->get();
            $mad_completo = [];
            foreach ($contenedores_encendidos_mad as $contendor) {
                $datos_m = $this->getDatosResumen($contendor, 'madurador');
                if ($datos_m) {
                    $mad_completo[] = $datos_m;
                }
            }
            return $mad_completo;
        }
        
    }
    public function getDatosResumen($contenedor, $tipo)
    {
        if ($tipo == 'genset') {
            $array_contenedor = [
                'id' => $contenedor->id,
                'nombre_contenedor' => $contenedor->nombre_contenedor,
                'tipo' => $contenedor->tipo,
                'encendido' => $contenedor->encendido,
                'booking' => $contenedor->booking,
                'booking_temp' => $contenedor->booking_temp,
                'empresa_id' => $contenedor->empresa_id,
            ];

            $datos = Registro_diario_generadores::select(
                // 'registro_diario_generadores.id',
                'registro_diario_generadores.contenedor_id',
                'registro_diario_generadores.battery_voltage',
                'registro_diario_generadores.water_temp',
                'registro_diario_generadores.running_frequency',
                'registro_diario_generadores.fuel_level',
                'registro_diario_generadores.voltage_measure',
                'registro_diario_generadores.rotor_current',
                'registro_diario_generadores.fiel_current',
                'registro_diario_generadores.speed',
                'registro_diario_generadores.eco_power',
                'registro_diario_generadores.rpm',
                'registro_diario_generadores.unit_mode',
                'registro_diario_generadores.horometro',
                'registro_diario_generadores.engine_state',
                'registro_diario_generadores.reefer_conected',
                'registro_diario_generadores.set_point',
                'registro_diario_generadores.temp_supply_1',
                'registro_diario_generadores.return_air',
                'registro_diario_generadores.created_at',
                'registro_diario_generadores.latitud',
                'registro_diario_generadores.longitud',
                'al.nombre_alarma',
                'e.nombre_evento',
            )
                ->join('alarmas as al', 'al.id', 'registro_diario_generadores.alarma_id')
                ->join('eventos as e', 'e.id', 'registro_diario_generadores.evento_id')
                ->where('registro_diario_generadores.contenedor_id', $contenedor->id)
                ->orderBy('registro_diario_generadores.id', 'desc')
                ->first();

            if ($datos != null) {
                $datos_ = $datos->toArray(); // ** debes usar toArray para convertir la coleccion que bota elocuent a un array natural
                $obj_merged = (object) array_merge($array_contenedor, $datos_); // uniendo los dos arrays
                return $obj_merged;
            }
        }
        if ($tipo == 'reefer') {
            $array_contenedor = [
                'id' => $contenedor->id,
                'nombre_contenedor' => $contenedor->nombre_contenedor,
                'tipo' => $contenedor->tipo,
                'encendido' => $contenedor->encendido,
                'booking' => $contenedor->booking,
                'booking_temp' => $contenedor->booking_temp,
                'empresa_id' => $contenedor->empresa_id,
            ];
            $datos = Registro_diario_reefers::select(
                'registro_diario_reefers.contenedor_id as id',
                'registro_diario_reefers.set_point',
                'registro_diario_reefers.temp_supply_1',
                'registro_diario_reefers.temp_supply_2',
                'registro_diario_reefers.return_air',
                'registro_diario_reefers.evaporation_coil',
                'registro_diario_reefers.condensation_coil',
                'registro_diario_reefers.compress_coil_1',
                'registro_diario_reefers.compress_coil_2',
                'registro_diario_reefers.ambient_air',
                'registro_diario_reefers.cargo_1_temp',
                'registro_diario_reefers.cargo_2_temp',
                'registro_diario_reefers.cargo_3_temp',
                'registro_diario_reefers.cargo_4_temp',
                'registro_diario_reefers.relative_humidity',
                'registro_diario_reefers.avl',
                'registro_diario_reefers.suction_pressure',
                'registro_diario_reefers.discharge_pressure',
                'registro_diario_reefers.line_voltage',
                'registro_diario_reefers.line_frequency',
                'registro_diario_reefers.consumption_ph_1',
                'registro_diario_reefers.consumption_ph_2',
                'registro_diario_reefers.consumption_ph_3',
                'registro_diario_reefers.co2_reading',
                'registro_diario_reefers.o2_reading',
                'registro_diario_reefers.evaporator_speed',
                'registro_diario_reefers.condenser_speed',
                'registro_diario_reefers.battery_voltage',
                'registro_diario_reefers.power_kwh',
                'registro_diario_reefers.power_trip_reading',
                'registro_diario_reefers.power_trip_duration',
                'registro_diario_reefers.suction_temp',
                'registro_diario_reefers.discharge_temp',
                'registro_diario_reefers.supply_air_temp',
                'registro_diario_reefers.return_air_temp',
                'registro_diario_reefers.dl_battery_temp',
                'registro_diario_reefers.dl_battery_charge',
                'registro_diario_reefers.power_consumption',
                'registro_diario_reefers.power_consumption_avg',
                'registro_diario_reefers.alarm_present',
                'registro_diario_reefers.capacity_load',
                'registro_diario_reefers.power_state',
                'registro_diario_reefers.controlling_mode',
                'registro_diario_reefers.humidity_control',
                'registro_diario_reefers.humidity_set_point',
                'registro_diario_reefers.fresh_air_ex_mode',
                'registro_diario_reefers.fresh_air_ex_rate',
                'registro_diario_reefers.fresh_air_ex_delay',
                'registro_diario_reefers.set_point_o2',
                'registro_diario_reefers.set_point_co2',
                'registro_diario_reefers.defrost_term_temp',
                'registro_diario_reefers.defrost_interval',
                'registro_diario_reefers.water_cooled_conde',
                'registro_diario_reefers.usda_trip',
                'registro_diario_reefers.evaporator_exp_valve',
                'registro_diario_reefers.suction_mod_valve',
                'registro_diario_reefers.hot_gas_valve',
                'registro_diario_reefers.economizer_valve',
                'registro_diario_reefers.modelo',
                'registro_diario_reefers.latitud',
                'registro_diario_reefers.longitud',

            )
                ->where('registro_diario_reefers.contenedor_id', $contenedor->id)
                ->orderBy('registro_diario_reefers.id', 'desc')
                ->first();
            if ($datos != null) {
                $datos_ = $datos->toArray(); // ** debes usar toArray para convertir la coleccion que bota elocuent a un array natural
                $obj_merged = (object) array_merge($array_contenedor, $datos_);
                return $obj_merged;
            }
        }
        if ($tipo == 'madurador') {
            $array_contenedor = [
                'id' => $contenedor->id,
                'nombre_contenedor' => $contenedor->nombre_contenedor,
                'tipo' => $contenedor->tipo,
                'encendido' => $contenedor->encendido,
                'booking' => $contenedor->booking,
                'booking_temp' => $contenedor->booking_temp,
                'empresa_id' => $contenedor->empresa_id,
            ];

            $datos = Registro_diario_madurador::select(
                'registro_diario_madurador.contenedor_id as id',
                'registro_diario_madurador.set_point',
                'registro_diario_madurador.temp_supply_1',
                'registro_diario_madurador.temp_supply_2',
                'registro_diario_madurador.return_air',
                'registro_diario_madurador.evaporation_coil',
                'registro_diario_madurador.condensation_coil',
                'registro_diario_madurador.compress_coil_1',
                'registro_diario_madurador.compress_coil_2',
                'registro_diario_madurador.ambient_air',
                'registro_diario_madurador.cargo_1_temp',
                'registro_diario_madurador.cargo_2_temp',
                'registro_diario_madurador.cargo_3_temp',
                'registro_diario_madurador.cargo_4_temp',
                'registro_diario_madurador.relative_humidity',
                'registro_diario_madurador.avl',
                'registro_diario_madurador.suction_pressure',
                'registro_diario_madurador.discharge_pressure',
                'registro_diario_madurador.line_voltage',
                'registro_diario_madurador.line_frequency',
                'registro_diario_madurador.consumption_ph_1',
                'registro_diario_madurador.consumption_ph_2',
                'registro_diario_madurador.consumption_ph_3',
                'registro_diario_madurador.co2_reading',
                'registro_diario_madurador.o2_reading',
                'registro_diario_madurador.evaporator_speed',
                'registro_diario_madurador.condenser_speed',
                'registro_diario_madurador.battery_voltage',
                'registro_diario_madurador.power_kwh',
                'registro_diario_madurador.power_trip_reading',
                'registro_diario_madurador.power_trip_duration',
                'registro_diario_madurador.suction_temp',
                'registro_diario_madurador.discharge_temp',
                'registro_diario_madurador.supply_air_temp',
                'registro_diario_madurador.return_air_temp',
                'registro_diario_madurador.dl_battery_temp',
                'registro_diario_madurador.dl_battery_charge',
                'registro_diario_madurador.power_consumption',
                'registro_diario_madurador.power_consumption_avg',
                'registro_diario_madurador.alarm_present',
                'registro_diario_madurador.capacity_load',
                'registro_diario_madurador.power_state',
                'registro_diario_madurador.controlling_mode',
                'registro_diario_madurador.humidity_control',
                'registro_diario_madurador.humidity_set_point',
                'registro_diario_madurador.fresh_air_ex_mode',
                'registro_diario_madurador.fresh_air_ex_rate',
                'registro_diario_madurador.fresh_air_ex_delay',
                'registro_diario_madurador.set_point_o2',
                'registro_diario_madurador.set_point_co2',
                'registro_diario_madurador.defrost_term_temp',
                'registro_diario_madurador.defrost_interval',
                'registro_diario_madurador.water_cooled_conde',
                'registro_diario_madurador.usda_trip',
                'registro_diario_madurador.evaporator_exp_valve',
                'registro_diario_madurador.suction_mod_valve',
                'registro_diario_madurador.hot_gas_valve',
                'registro_diario_madurador.economizer_valve',
                'registro_diario_madurador.modelo',
                'registro_diario_madurador.latitud',
                'registro_diario_madurador.longitud',
                'registro_diario_madurador.ethylene',
                'registro_diario_madurador.stateProcess',
                'registro_diario_madurador.stateInyection',
                'registro_diario_madurador.timerOfProcess',

            )
                ->where('registro_diario_madurador.contenedor_id', $contenedor->id)
                ->orderBy('registro_diario_madurador.id', 'desc')
                ->first();
            if ($datos != null) {
                $datos_ = $datos->toArray(); // ** debes usar toArray para convertir la coleccion que bota elocuent a un array natural
                $obj_merged = (object) array_merge($array_contenedor, $datos_);
                return $obj_merged;
            }
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

        // Registro_diario_reefers::create([
        //     'contenedor_id' => 1,

        //     'set_point' => rand((1 * 1), (10 * 10)) / 10,
        //     'temp_supply_1' => rand((1 * 1), (10 * 10)) / 10,
        //     'temp_supply_2' => rand((1 * 1), (10 * 10)) / 10,
        //     'return_air' => rand((1 * 1), (10 * 10)) / 10,
        //     'evaporation_coil' => rand((1 * 1), (10 * 10)) / 10,
        //     'condensation_coil' => rand((1 * 1), (10 * 10)) / 10,
        //     'compress_coil_1' => rand((1 * 1), (10 * 10)) / 10,
        //     'compress_coil_2' => rand((1 * 1), (10 * 10)) / 10,
        //     'ambient_air' => rand((1 * 1), (10 * 10)) / 10,
        //     'cargo_1_temp' => rand((1 * 1), (10 * 10)) / 10,
        //     'cargo_2_temp' => rand((1 * 1), (10 * 10)) / 10,
        //     'cargo_3_temp' => rand((1 * 1), (10 * 10)) / 10,
        //     'cargo_4_temp' => rand((1 * 1), (10 * 10)) / 10,
        //     'relative_humidity' => rand(0, 10),
        //     'avl' => rand(0, 10),
        //     'suction_pressure' => rand((1 * 1), (10 * 10)) / 10,
        //     'discharge_pressure' => rand((1 * 1), (10 * 10)) / 10,
        //     'line_voltage'  => rand(0, 10),
        //     'line_frequency' => rand(0, 10),
        //     'consumption_ph_1' => rand((1 * 1), (10 * 10)) / 10,
        //     'consumption_ph_2' => rand((1 * 1), (10 * 10)) / 10,
        //     'consumption_ph_3' => rand((1 * 1), (10 * 10)) / 10,
        //     'co2_reading' => rand((1 * 1), (10 * 10)) / 10,
        //     'o2_reading' => rand((1 * 1), (10 * 10)) / 10,
        //     'evaporator_speed'  => rand(0, 10),
        //     'condenser_speed'  => rand(0, 10),
        //     'battery_voltage' => rand((1 * 1), (10 * 10)) / 10,
        //     'power_kwh' => rand((1 * 1), (10 * 10)) / 10,
        //     'power_trip_reading' => rand((1 * 1), (10 * 10)) / 10,
        //     'power_trip_duration'  => rand(0, 10),
        //     'suction_temp' => rand((1 * 1), (10 * 10)) / 10,
        //     'discharge_temp' => rand((1 * 1), (10 * 10)) / 10,
        //     'supply_air_temp' => rand((1 * 1), (10 * 10)) / 10,
        //     'return_air_temp' => rand((1 * 1), (10 * 10)) / 10,
        //     'dl_battery_temp' => rand((1 * 1), (10 * 10)) / 10,
        //     'dl_battery_charge' => rand((1 * 1), (10 * 10)) / 10,
        //     'power_consumption' => rand((1 * 1), (10 * 10)) / 10,
        //     'power_consumption_avg' => rand((1 * 1), (10 * 10)) / 10,
        //     'alarm_present'  => rand(0, 1),
        //     'capacity_load'  => rand(0, 10),
        //     'power_state'  => '0xff',
        //     'controlling_mode'  => 'optimized',
        //     'humidity_control'  => rand(0, 1),
        //     'humidity_set_point'  => rand(0, 10),
        //     'fresh_air_ex_mode'  => rand(0, 10),
        //     'fresh_air_ex_rate'  => rand(0, 10),
        //     'fresh_air_ex_delay'  => rand(0, 10),
        //     'set_point_o2'  => rand(0, 10),
        //     'set_point_co2'  => rand(0, 10),
        //     'defrost_term_temp' => rand((1 * 1), (10 * 10)) / 10,
        //     'defrost_interval'  => rand(0, 10),
        //     'water_cooled_conde'  => rand(0, 1),
        //     'usda_trip'  => rand(0, 1),
        //     'evaporator_exp_valve'  => rand(0, 10),
        //     'suction_mod_valve'  => rand(0, 10),
        //     'hot_gas_valve'  => rand(0, 10),
        //     'economizer_valve'  => rand(0, 10),
        //     'modelo'  => 'thermoking',
        //     'latitud' => -12.024386,
        //     'longitud' => -75.210926,

        // ]);

        Registro_diario_madurador::create([
            'contenedor_id' => 17,

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
            'latitud' => -10.024386,
            'longitud' => -71.210926,

            'ethylene' => 145.6,
            'stateProcess' =>  "Run",
            'stateInyection' => "Inyecting",
            'timerOfProcess' => 12,

        ]);
    }

    public function obtener_datos_contenedor(Request $request)
    {
        // return $request; 
        $id_contenedor = $request->id;
        $tipo_contenedor = $request->tipo;

        if ($tipo_contenedor == 'genset') {
            return Registro_diario_generadores::from('registro_diario_generadores')
                ->select()
                ->where('contenedor_id', $id_contenedor)
                ->latest()
                ->take(30)
                ->get();
        }
        if ($tipo_contenedor == 'reefer') {
            return Registro_diario_reefers::from('registro_diario_reefers')
                ->select()
                ->where('contenedor_id', $id_contenedor)
                ->latest()
                ->take(30)
                ->get();
        }
        if ($tipo_contenedor == 'madurador') {
            return Registro_diario_madurador::from('registro_diario_madurador')
                ->select()
                ->where('contenedor_id', $id_contenedor)
                ->latest()
                ->take(30)
                ->get();
        }
    }
    public function datos_contenedor_mapa(Request $request)
    {
        // return $request; 
        $id_contenedor = $request->id;
        $tipo_contenedor = $request->tipo;

        if ($tipo_contenedor == 'genset') {
            return Registro_diario_generadores::from('registro_diario_generadores')
                ->select(
                    'contenedores.nombre_contenedor', 
                    'registro_diario_generadores.created_at',
                    'registro_diario_generadores.set_point',
                    'registro_diario_generadores.battery_voltage',
                    'registro_diario_generadores.running_frequency',
                    'registro_diario_generadores.fuel_level',
                    'registro_diario_generadores.voltage_measure',
                    'registro_diario_generadores.rpm',
                    'registro_diario_generadores.temp_supply_1',
                    'registro_diario_generadores.return_air',
                    )
                ->join('contenedores', 'contenedores.id', 'registro_diario_generadores.contenedor_id')
                ->where('contenedor_id', $id_contenedor)
                ->latest()
                ->take(1)
                ->get();
        }
        if ($tipo_contenedor == 'reefer') {
            return Registro_diario_reefers::from('registro_diario_reefers')
                ->select(
                    'contenedores.nombre_contenedor', 
                    'registro_diario_reefers.created_at',
                    'registro_diario_reefers.set_point',
                    'registro_diario_reefers.co2_reading',
                    'registro_diario_reefers.relative_humidity',
                    'registro_diario_reefers.avl',
                    'registro_diario_reefers.temp_supply_1',
                    'registro_diario_reefers.return_air_temp',
                )
                ->join( 'contenedores', 'contenedores.id', 'registro_diario_reefers.contenedor_id')
                ->where('contenedor_id', $id_contenedor)
                ->latest()
                ->take(1)
                ->get();
        }
        if ($tipo_contenedor == 'madurador') {
            return Registro_diario_madurador::from('registro_diario_madurador')
                ->select(
                    'contenedores.nombre_contenedor', 
                    'registro_diario_madurador.created_at',
                    'registro_diario_madurador.set_point',
                    'registro_diario_madurador.co2_reading',
                    'registro_diario_madurador.relative_humidity',
                    'registro_diario_madurador.ethylene',
                    'registro_diario_madurador.avl',
                )
                ->join( 'contenedores', 'contenedores.id', 'registro_diario_madurador.contenedor_id')
                ->where('contenedor_id', $id_contenedor)
                ->latest()
                ->take(1)
                ->get();
        }
    }
    public function obtener_datos_contenedor_graficos(Request $request)
    {
        // return $request; 
        $id_contenedor = $request->id;
        $tipo_contenedor = $request->tipo;

        if ($request->desde != null) {
            $desde = $request->desde;
            $hasta = date("Y-m-d", strtotime($request->hasta . "+ 1 days"));
    
            if ($tipo_contenedor == 'genset') {
                return Registro_diario_generadores::from('registro_diario_generadores')
                    ->select()
                    ->where('contenedor_id', $id_contenedor)
                    ->whereBetween('registro_diario_generadores.created_at', [$desde, $hasta])
                    ->get();
            }
            if ($tipo_contenedor == 'reefer') {
                return Registro_diario_reefers::from('registro_diario_reefers')
                    ->select()
                    ->where('contenedor_id', $id_contenedor)
                    ->whereBetween('registro_diario_reefers.created_at', [$desde, $hasta])
                    ->get();
            }
            if ($tipo_contenedor == 'madurador') {
                return Registro_diario_madurador::from('registro_diario_madurador')
                    ->select()
                    ->where('contenedor_id', $id_contenedor)
                    ->whereBetween('registro_diario_madurador.created_at', [$desde, $hasta])
                    ->get();
            }
        }else{
            if ($tipo_contenedor == 'genset') {
                return Registro_diario_generadores::from('registro_diario_generadores')
                    ->select()
                    ->where('contenedor_id', $id_contenedor)
                    ->latest()
                    ->take(30)
                    ->get();
            }
            if ($tipo_contenedor == 'reefer') {
                return Registro_diario_reefers::from('registro_diario_reefers')
                    ->select()
                    ->where('contenedor_id', $id_contenedor)
                    ->latest()
                    ->take(30)
                    ->get();
            }
            if ($tipo_contenedor == 'madurador') {
                return Registro_diario_madurador::from('registro_diario_madurador')
                    ->select()
                    ->where('contenedor_id', $id_contenedor)
                    ->latest()
                    ->take(30)
                    ->get();
            }
        }
        
    }
    public function datos_contenedor(Request $request)
    {
        // return $request; 
        $id_contenedor = $request->id;

        return Contenedor::from('contenedores')
        ->select()
        ->where('id', $id_contenedor)
        ->get();
        
    }
    public function obtener_datos_contenedor_fecha(Request $request)
    {
        // return $request; 
        $id_contenedor = $request->id;
        $tipo_contenedor = $request->tipo;
        $desde = $request->desde;
        // $hasta = $request->hasta;
        $hasta = date("Y-m-d", strtotime($request->hasta . "+ 1 days"));


        if ($tipo_contenedor == 'genset') {
            return Registro_diario_generadores::from('registro_diario_generadores')
                ->select()
                ->where('contenedor_id', $id_contenedor)
                ->whereBetween('registro_diario_generadores.created_at', [$desde, $hasta])
                ->get();
        }
        if ($tipo_contenedor == 'reefer') {
            return Registro_diario_reefers::from('registro_diario_reefers')
                ->select()
                ->where('contenedor_id', $id_contenedor)
                ->whereBetween('registro_diario_reefers.created_at', [$desde, $hasta])
                ->get();
        }
        if ($tipo_contenedor == 'madurador') {
            return Registro_diario_madurador::from('registro_diario_madurador')
                ->select()
                ->where('contenedor_id', $id_contenedor)
                ->whereBetween('registro_diario_madurador.created_at', [$desde, $hasta])
                ->get();
        }
    }
    public function obtenerLatLong(Request $request)
    {
        $id_registro = $request->id;
        $tipo_contenedor = $request->tipo;

        if ($tipo_contenedor == 'genset') {
            return Registro_diario_generadores::from('registro_diario_generadores')
                ->select()
                ->where('id', $id_registro)
                ->latest()
                ->get()->toArray();
        }
        if ($tipo_contenedor == 'reefer') {
            return Registro_diario_reefers::from('registro_diario_reefers')
                ->select()
                ->where('id', $id_registro)
                ->latest()
                ->get()->toArray();
        }
        if ($tipo_contenedor == 'madurador') {
            return Registro_diario_madurador::from('registro_diario_madurador')
                ->select()
                ->where('id', $id_registro)
                ->latest()
                ->get()->toArray();
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
    public function get_points_madurador(Request $request)
    {
        // return $request; 
        $contenedores = Madurador_points::where('contenedor_id', $request->id_contenedor)->get();
        if ($contenedores->count() > 0) {
            return $contenedores;
        } else {
            $new_m = Madurador_points::create([
                'contenedor_id' => $request->id_contenedor,
                'temperatura' => 1,
                'co2' => 1,
                'humedad' => 1,
                'etileno' => 1,
                'tiempo_proceso' => 1,
                'etileno_minimo' => 1,
                'tiempo_inyeccion' => 1,
                'estado' => 'Q',
            ]);
            return [$new_m];
        }
    }
    public function set_points_madurador(Request $request)
    {
        // return $request; 
        //update_madurador_points
        $up_m = Madurador_points::where('contenedor_id', $request->id_contenedor)
            ->update([
                'temperatura' => $request->temperatura,
                'co2' => $request->co2,
                'humedad' => $request->humedad,
                'etileno' => $request->etileno,
                'tiempo_proceso' => $request->tiempo_proceso,
                'etileno_minimo' => $request->etileno_minimo,
                'tiempo_inyeccion' => $request->tiempo_inyeccion,
                'estado' => $request->estado
            ]);
        // return $request->id_contenedor;
        return $up_m;
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
                'co2_reading' => $request->co2_reading == 25.5 ? null : $request->co2_reading,
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
        if ($request->tipo == 'Madurador') {
            $id_g = Contenedor::select()->where([['nombre_contenedor', $request->nombre_contenedor]])->get()->last()['id'];
            Registro_diario_madurador::create([
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
                'co2_reading' =>  $request->co2_reading == 25.5 ? null : $request->co2_reading,
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

                'ethylene' => $request->ethylene,
                'stateProcess' =>  $request->stateProcess,
                'stateInyection' => $request->stateInyection,
                'timerOfProcess' => $request->timerOfProcess,
            ]);
            return "madurador guardado ;D";
        }
    }
    public function api_get_madurador_points(Request $request)
    {
        // return $request; 
        $id_m = Contenedor::select('id')->where([['nombre_contenedor', $request->nombre_contenedor]])->get()->last()['id'];
        $madurador_point = Madurador_points::where('contenedor_id', $id_m)
            ->get();
        $madurador_point = $madurador_point->toArray();
        $cadena_respuesta = 'K,' . '2,' .
            $madurador_point[0]['temperatura'] . ',' .
            $madurador_point[0]['co2'] . ',' .
            $madurador_point[0]['humedad'] . ',' .
            $madurador_point[0]['etileno'] . ',' .
            $madurador_point[0]['tiempo_proceso'] . ',' .
            $madurador_point[0]['etileno_minimo'] . ',' .
            $madurador_point[0]['tiempo_inyeccion'] . ',' .
            '$' . $madurador_point[0]['estado'];



        return $cadena_respuesta;
    }
    public function ComprobarConexion(Request $request)
    {
        return "conexion exitosa";
    }
}
