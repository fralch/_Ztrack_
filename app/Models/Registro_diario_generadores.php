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

        'battery_voltage', // Battery Voltage
        'water_temp', // Water Temperature
        'running_frequency', // Running Frequency
        'fuel_level', // Fuel Level
        'voltage_measured', // Voltage Measured
        'rotor_current', // Rotor Current
        'fiel_current', // Field Current
        'speed', // Speed
        'eco_power', // Eco Power
        'rpm', // RPM
        'unit_mode', // Unit Mode
        'horometro', // Horometer
        'alarma_id', // Alarm ID
        'evento_id', // Event ID
        'modelo', // Modelo
        'latitud', // Latitud
        'longitud', // Longitud
        'engine_state', // Engine State
        
    ];
}
