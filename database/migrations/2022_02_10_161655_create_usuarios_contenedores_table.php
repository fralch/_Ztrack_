<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateUsuariosContenedoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresas_contenedores', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('empresa_id');
            $table->unsignedBigInteger('contenedor_id');
            $table->timestamps();

            $table->foreign('empresa_id')->references('id')->on('empresas');
            $table->foreign('contenedor_id')->references('id')->on('contenedores');
        });
        DB::table("empresas_contenedores")
        ->insert([ 
            [
                'empresa_id' => 1,
                'contenedor_id' => 1,
            ],
            [
                'empresa_id' => 2,
                'contenedor_id' => 2,
            ],
            [
                'empresa_id' => 2,
                'contenedor_id' => 3,
            ],
            [
                'empresa_id' => 2,
                'contenedor_id' => 4,
            ],
            [
                'empresa_id' => 2,
                'contenedor_id' => 5,
            ],
            [
                'empresa_id' => 2,
                'contenedor_id' => 6,
            ],
            [
                'empresa_id' => 2,
                'contenedor_id' => 7,
            ],
            [
                'empresa_id' => 2,
                'contenedor_id' => 8,
            ],
            [
                'empresa_id' => 2,
                'contenedor_id' => 9,
            ],
            [
                'empresa_id' => 2,
                'contenedor_id' => 10,
            ],
            [
                'empresa_id' => 2,
                'contenedor_id' => 11,
            ],
            [
                'empresa_id' => 2,
                'contenedor_id' => 12,
            ],
            [
                'empresa_id' => 2,
                'contenedor_id' => 13,
            ],
            [
                'empresa_id' => 2,
                'contenedor_id' => 14,
            ],
            [
                'empresa_id' => 2,
                'contenedor_id' => 15,
            ],
            [
                'empresa_id' => 2,
                'contenedor_id' => 16,
            ],
            
           
            
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios_contenedores');
    }
}
