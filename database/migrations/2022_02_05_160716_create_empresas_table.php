<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateEmpresasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('usuario_id');
            $table->string('nombre_empresa');
            $table->string('descripcion_booking');
            $table->float('temp_contratada');
            $table->timestamps();

            $table->foreign('usuario_id')->references('id')->on('usuarios');
        });
        DB::table("empresas")
        ->insert([ 
            [
                'usuario_id' => 2,
                'nombre_empresa' => 'VE Logistic',
                'descripcion_booking' => 'VE Logistic booking',
                'temp_contratada' => 0,
            ],
            [
                'usuario_id' => 3,
                'nombre_empresa' => 'Dp World',
                'descripcion_booking' => 'Dp World booking',
                'temp_contratada' => 0,
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empresas');
    }
}
