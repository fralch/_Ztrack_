<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistroDiarioGeneradoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registro_diario_generadores', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('contenedor_id');
            
            $table->float('voltage_measured');
            $table->float('battery_voltage');
            $table->float('water_temp');
            $table->float('running_frequency');
            $table->float('fuel_level');
            $table->float('rotor_current');
            $table->float('fiel_current');
            $table->float('init');
            $table->float('fuel_relay');
            $table->float('air_heater');
            $table->float('starter');
            $table->float('restart_20_min');
            $table->float('runnig');
            $table->float('shutdown');
            $table->float('hardware_error');
            $table->float('start_delay');
            $table->float('pti');
            $table->float('auto_config');
            $table->float('stop_by_user');
            $table->float('dealyed_output');
            $table->float('load_measure');
            $table->float('delay_voltage');
            $table->float('speed');
            $table->float('eco_power');
            $table->float('rpm');
            $table->float('unit_mode');
            $table->float('horometro');
            $table->float('alarma_id');
            $table->float('evento_id');
            $table->float('modelo');
            $table->float('latitud');
            $table->float('longitud');
           
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('registro_diario_generadores');
    }
}
