<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateAlarmasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alarmas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_alarma');
            $table->string('nombre_alarma_ingles');
            $table->timestamps();
        });
        DB::table("alarmas")
        ->insert([ 
            ["nombre_alarma" => "Temperatura del agua alta", "nombre_alarma_ingles" => "WATER TEMPERATURE HIGH"],
            ["nombre_alarma" => "Error durante el arranque", "nombre_alarma_ingles" => "FAILED TO CRANK"],
            ["nombre_alarma" => "Error durante la puesta en marcha", "nombre_alarma_ingles" => "FAILED TO START"],
            ["nombre_alarma" => "Fallo de realimentacion del rele de mantenimiento", "nombre_alarma_ingles" => "RL2 (FUEL H) FEEDBACK FAILURE"],
            ["nombre_alarma" => "Fallo de realimentacion del rele de atraccion", "nombre_alarma_ingles" => "RL1 (FUEL P) FEEDBACK FAILURE"],
            ["nombre_alarma" => "Fallo de realimentacion del rele de arranque RL5", "nombre_alarma_ingles" => "RL5 (STARTER) FEEDBACK FAILURE"],
            ["nombre_alarma" => "Sobrecarga externa", "nombre_alarma_ingles" => "EXTERNAL OVERLOAD"],
            ["nombre_alarma" => "El motor no funciona por un motivo desconocido", "nombre_alarma_ingles" => "ENGINE NOT RUNNING REASON UNKNOWN"],
            ["nombre_alarma" => "Bajo nivel de aceite", "nombre_alarma_ingles" => "LOW OIL LEVEL"],
            ["nombre_alarma" => "R.p.m. por debajo del limite", "nombre_alarma_ingles" => "RPM BELOW LIMIT"],
            ["nombre_alarma" => "Error durante la puesta en marcha por una carga bateria", "nombre_alarma_ingles" => "FAILED TO START LOW BATTERY"],
            ["nombre_alarma" => "Fallo del sensor de la temperatura del agua", "nombre_alarma_ingles" => "WATER TEMPERATURE SENSOR FAILURE"],
            ["nombre_alarma" => "Nivel de liquido refrigerante bajo", "nombre_alarma_ingles" => "COOLANT LEVEL LOW"],
            ["nombre_alarma" => "Sobrecarga interna", "nombre_alarma_ingles" => "INTERNAL OVERLOAD"],
            ["nombre_alarma" => "Apagado de la unidad de control del excitado", "nombre_alarma_ingles" => "EXCITER CONTROL UNIT SHUTDOWN"],
            ["nombre_alarma" => "Apagado de la unidad de control del motor", "nombre_alarma_ingles" => "ENGINE CONTROL UNIT SHUTDOWN"],
            ["nombre_alarma" => "Bajo voltaje de excitacion", "nombre_alarma_ingles" => "LOW EXCITATION VOLTAGE"],
            ["nombre_alarma" => "Baja presion del aceite", "nombre_alarma_ingles" => "LOW OIL PRESSURE"],
            ["nombre_alarma" => "Voltaje de salida alto", "nombre_alarma_ingles" => "OUTPUT VOLTAGE HIGH"],
            ["nombre_alarma" => "Error de la unidad del generador", "nombre_alarma_ingles" => "GENERATOR UNIT ERROR"],
            ["nombre_alarma" => "Fallo del ventilador del liquido refrigerante", "nombre_alarma_ingles" => "COOLANT FAN FAILURE"],
            ["nombre_alarma" => "Deposito de combustible vacio", "nombre_alarma_ingles" => "FUEL TANK EMPTY"],
            ["nombre_alarma" => "Caduco la correa de distribucion", "nombre_alarma_ingles" => "TIMING BELT EXPIRED"],
            ["nombre_alarma" => "Fallo de la frecuencia de salida", "nombre_alarma_ingles" => "OUTPUT FREQUENCY FAILURE"],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alarmas');
    }
}
