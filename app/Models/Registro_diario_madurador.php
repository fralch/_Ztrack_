<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registro_diario_madurador extends Model
{
    use HasFactory;
    protected $table = 'registro_diario_madurador';
    protected $fillable = [
        'id',
        'contenedor_id',

        'set_point', //Temperature SET point
        'temp_supply_1', //Supply 1 
        'temp_supply_2', //Supply 2
        'return_air', //Return air
        'evaporation_coil', //Evaporation coil
        'condensation_coil', //Condensation coil
        'compress_coil_1', //Compressor coil 1
        'compress_coil_2', //Compressor coil 2
        'ambient_air', //Ambient air
        'cargo_1_temp', //Cargo 1 temperature
        'cargo_2_temp', //Cargo 2 temperature
        'cargo_3_temp', //Cargo 3 temperature
        'cargo_4_temp', //Cargo 4 temperature
        'relative_humidity', //Relative humidity
        'avl', //AVL
        'suction_pressure', //Suction pressure
        'discharge_pressure', //Discharge pressure
        'line_voltage', //Line voltage
        'line_frequency', //Line frequency
        'consumption_ph_1', //Current Consumption PH 1
        'consumption_ph_2', //Current Consumption PH 2
        'consumption_ph_3', //Current Consumption PH 3
        'co2_reading', //CO2 reading
        'o2_reading', //O2 reading
        'evaporator_speed', //Evaporator fan speed
        'condenser_speed', //Condenser fan speed
        'battery_voltage', //Data logger Battery Voltage
        'power_kwh', //Power meter reading (kWh)
        'power_trip_reading', //Power meter trip reading
        'power_trip_duration', // Power meter trip duration
        'suction_temp', //Suction temperature
        'discharge_temp', //Discharge temperature
        'supply_air_temp', //Supply air temperature
        'return_air_temp', //Return air temperature
        'dl_battery_temp', //Data logger Battery Temperature
        'dl_battery_charge', //Data logger Battery Charge Current
        'power_consumption', //Power consumption
        'power_consumption_avg', //Power consumption AVG
        'alarm_present', //Alarm present
        'capacity_load', //Capacity load
        'power_state', //Power state
        'controlling_mode', //Controlling mode
        'humidity_control', //Humidity control
        'humidity_set_point', //Humidity set point
        'fresh_air_ex_mode', //Fresh air exchange mode
        'fresh_air_ex_rate', //Fresh air exchange rate
        'fresh_air_ex_delay', //Fresh air exchange delay
        'set_point_o2', //O2 set point
        'set_point_co2', //CO2 set point
        'defrost_term_temp', //Defrost termination temperature
        'defrost_interval', //Defrost interval
        'water_cooled_conde', //Water cooled condenser
        'usda_trip', //USDA trip
        'evaporator_exp_valve', //Evaporator expansion valve
        'suction_mod_valve', //Suction modulation valve
        'hot_gas_valve', //Hot gas valve
        'economizer_valve', //Economizer valve
        'modelo',
        'latitud',
        'longitud',

        'ethylene',
        'stateProcess',
        'stateInyection',
        'timerOfProcess',
        
    ];
}
