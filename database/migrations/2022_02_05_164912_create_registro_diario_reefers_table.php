<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistroDiarioReefersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registro_diario_reefers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('contenedor_id');
            $table->string('nombre_contenedor');
            $table->float('set_point');
            $table->float('temp_supply');
            $table->float('temp_return');
            $table->float('re_hume');
            $table->float('fuel_level');
            $table->float('vdc');
            $table->float('rpm');
            $table->float('freq');
            $table->float('vac');
            $table->float('latitud');
            $table->float('longitud');
            $table->float('temp_motor');
            $table->float('status');
            $table->float('speed');
            $table->float('ecopower');
            $table->float('horometro');
            $table->float('alamra_id');
            $table->float('evento_id');
            $table->float('modelo');
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
        Schema::dropIfExists('registro_diario_reefers');
    }
}
