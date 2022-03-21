<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('usuario');
            $table->string('apellidos');
            $table->string('nombres');
            $table->integer('activo');
            $table->boolean('admin');
            $table->string('correo');
            $table->string('contraseña');
            $table->dateTime('ultimo_acceso')->nullable();
            $table->timestamps();
        });
        DB::table("usuarios")
        ->insert([ 

        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
}
