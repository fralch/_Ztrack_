<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registro_diario_generadores extends Model
{
    use HasFactory;
    protected $table = 'registro_diario_generadores';
    protected $fillable = [
        'id',
        'contenedor_id',

        'voltage_measured', //Voltage measured show
        'battery_voltage', //Battery voltage
        'water_temp', //Water temperature
        'running_frequency', //Running frequency
        'fuel_level', //Fuel level
        'rotor_current', // rotor current 
        'fiel_current', //Field current
        'init', // Init
        'fuel_relay', //Fuel relay
        'air_heater', //Air heater 
        'starter', //Starter
        'restart_20_min', //Restart 20 min
        'runnig', //Runnig
        'shutdown', //Shutdown
        'hardware_error', //Hardware error
        'start_delay', //Start delay
        'pti', //PTI
        'auto_config', //Auto config
        'stop_by_user', //Stop by user
        'dealyed_output', //Delayed output
        'load_measure', //Load measure
        'delay_voltage', //Delay voltage
        'speed', //Speed
        'eco_power', //Eco power
        'rpm', //RPM
        'unit_mode', //Unit mode

        'horometro', //Horometro
        'alarma_id', //Alarma ID
        'evento_id', //Evento ID
        'modelo', //Modelo
        'latitud', //Latitud
        'longitud', //Longitud
        
    ];
}
