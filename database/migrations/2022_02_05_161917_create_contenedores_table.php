<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateContenedoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contenedores', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_contenedor');
            $table->string('tipo');
            $table->boolean('encendido');
            $table->string('booking');
            $table->float('booking_temp');
            $table->timestamps();
        });
        DB::table("contenedores")
        ->insert([ 
            [
                'nombre_contenedor' => 'Zgru2245761',
                'tipo' => 'Reefer',
                'encendido' => 1,
                'booking' => '-',
                'booking_temp' => 0,
            ],
            [
                'nombre_contenedor' => 'ZGUU204907-2',
                'tipo' => 'Generador',
                'encendido' => 1,
                'booking' => '-',
                'booking_temp' => 0,
            ],
            [
                'nombre_contenedor' => 'ZGUU204851-7',
                'tipo' => 'Generador',
                'encendido' => 1,
                'booking' => '-',
                'booking_temp' => 0,
            ],
            [
                'nombre_contenedor' => 'ZGUU204905-1',
                'tipo' => 'Generador',
                'encendido' => 1,
                'booking' => '-',
                'booking_temp' => 0,
            ],
            [
                'nombre_contenedor' => 'ZGUU204854-3',
                'tipo' => 'Generador',
                'encendido' => 1,
                'booking' => '-',
                'booking_temp' => 0,
            ],
            [
                'nombre_contenedor' => 'ZGUU204904-6',
                'tipo' => 'Generador',
                'encendido' => 1,
                'booking' => '-',
                'booking_temp' => 0,
            ],
            [
                'nombre_contenedor' => 'ZGUU204896-5',
                'tipo' => 'Generador',
                'encendido' => 1,
                'booking' => '-',
                'booking_temp' => 0,
            ],
            [
                'nombre_contenedor' => 'ZGUU204906-7',
                'tipo' => 'Generador',
                'encendido' => 1,
                'booking' => '-',
                'booking_temp' => 0,
            ],
            [
                'nombre_contenedor' => 'ZGUU205299-1',
                'tipo' => 'Generador',
                'encendido' => 1,
                'booking' => '-',
                'booking_temp' => 0,
            ],
            [
                'nombre_contenedor' => 'ZGUU205301-0',
                'tipo' => 'Generador',
                'encendido' => 1,
                'booking' => '-',
                'booking_temp' => 0,
            ],
            [
                'nombre_contenedor' => 'ZGUU204822-4',
                'tipo' => 'Generador',
                'encendido' => 1,
                'booking' => '-',
                'booking_temp' => 0,
            ],
            [
                'nombre_contenedor' => 'ZGUU205304-6',
                'tipo' => 'Generador',
                'encendido' => 1,
                'booking' => '-',
                'booking_temp' => 0,
            ],
            [
                'nombre_contenedor' => 'ZGUU204821-9',
                'tipo' => 'Generador',
                'encendido' => 1,
                'booking' => '-',
                'booking_temp' => 0,
            ],
            [
                'nombre_contenedor' => 'ZGUU205347-3',
                'tipo' => 'Generador',
                'encendido' => 1,
                'booking' => '-',
                'booking_temp' => 0,
            ],
            [
                'nombre_contenedor' => 'ZGUU205348-9',
                'tipo' => 'Generador',
                'encendido' => 1,
                'booking' => '-',
                'booking_temp' => 0,
            ],
            [
                'nombre_contenedor' => 'ZGUU205303-0',
                'tipo' => 'Generador',
                'encendido' => 1,
                'booking' => '-',
                'booking_temp' => 0,
            ],
            [
                'nombre_contenedor' => 'ZMUU205303-0',
                'tipo' => 'Madurador',
                'encendido' => 1,
                'booking' => '-',
                'booking_temp' => 0,
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
        Schema::dropIfExists('contenedores');
    }
}
