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
            $table->float('re_c_o2');
            $table->float('re_o2');
            $table->float('alv');
            $table->float('latitud');
            $table->float('longitud');
            $table->float('status');
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
