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
            ['usuario' => 'admin',
            'apellidos' => 'admin',
            'nombres' => 'admin',
            'activo' => 1,
            'admin' => 1,
            'correo' => 'ingfralch@gmail.com',
            'contraseña' => '123456',
            'ultimo_acceso' => null,],
            ['usuario' => 've_logistic',
            'apellidos' => 'VE Logistic ',
            'nombres' => 'VE Logistic ',
            'activo' => 1,
            'admin' => 0,
            'correo' => 've_logistic@gmail.com',
            'contraseña' => '123456',
            'ultimo_acceso' => null,],
            ['usuario' => 'dp_world',
            'apellidos' => 'Dp World',
            'nombres' => 'Dp World',
            'activo' => 1,
            'admin' => 0,
            'correo' => 'dp_world@gmail.com',
            'contraseña' => '123456',
            'ultimo_acceso' => null,],

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
