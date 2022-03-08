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
            
            $table->decimal('battery_voltage', $precision=8, $scale=1)->nullable();
            $table->decimal('water_temp', $precision=8, $scale=1)->nullable();
            $table->decimal('running_frequency', $precision=8, $scale=1)->nullable();
            $table->decimal('fuel_level', $precision=8, $scale=1)->nullable();
            $table->decimal('voltage_measure', $precision=8, $scale=1)->nullable();
            $table->decimal('rotor_current', $precision=8, $scale=1)->nullable();
            $table->decimal('fiel_current', $precision=8, $scale=1)->nullable();
            $table->boolean('speed')->nullable();
            $table->boolean('eco_power')->nullable();
            $table->integer('rpm')->nullable();
            $table->string('unit_mode', 100)->nullable();
            $table->integer('horometro')->nullable();
            $table->unsignedBigInteger('alarma_id');
            $table->unsignedBigInteger('evento_id');
            $table->string('modelo', 100)->nullable();
            $table->float('latitud')->nullable();
            $table->float('longitud')->nullable();
            $table->string('engine_state', 100)->nullable();
           
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
