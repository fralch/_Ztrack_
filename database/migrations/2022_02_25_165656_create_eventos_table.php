<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateEventosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eventos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_evento');
            $table->string('nombre_evento_ingles');
            $table->timestamps();
        });

        DB::table("eventos")
        ->insert([ 
            ["nombre_evento" => "Sin Registro", "nombre_evento_ingles" => "None"],
            ["nombre_evento" => "Voltaje bajo de la bateria", "nombre_evento_ingles" => "BAT. VOLTAGE LOW"],
            ['nombre_evento' =>'Fallo de las entradas digitales','nombre_evento_ingles' =>'DIGITAL INPUT FAILURE'],
            ['nombre_evento' =>'Voltaje de salida inferior a 180 V','nombre_evento_ingles' =>'OUTPUT VOLTAGE < 180 V'],
            ['nombre_evento' => 'Filtro de aire bloqueado','nombre_evento_ingles' =>'AIR FILTER BLOCKED'],
            ['nombre_evento' =>'Nivel de liquido refrigerante bajo','nombre_evento_ingles' =>'COOLANT LEVEL LOW'],
            ['nombre_evento' =>'Frecuencia de salida baja','nombre_evento_ingles' =>'OUTPUT FREQUENCY LOW'],
            ['nombre_evento' =>'Frecuencia de salida alta','nombre_evento_ingles' =>'OUTPUT FREQUENCY HIGH'],
            ['nombre_evento' =>'Bajo nivel de aceite','nombre_evento_ingles' =>'LOW OIL LEVEL'],
            ['nombre_evento' =>'El contador horario 1 ha superado el limite','nombre_evento_ingles' =>'HOUR METER 1 HAS EXCEEDED THRESHOLD'],
            ['nombre_evento' =>'El contador horario 2 ha superado el limite','nombre_evento_ingles' =>'HOUR METER 2 HAS EXCEEDED THRESHOLD'],
            ['nombre_evento' =>'Nivel bajo de combustible','nombre_evento_ingles' =>'FUEL LEVEL LOW'],
            ['nombre_evento' =>'Fallo del sensor de r.p.m. del motor','nombre_evento_ingles' =>'ENGINE RPM SENSOR FAILURE'],
            ['nombre_evento' =>'Fallo del sensor de la temperatura del agua','nombre_evento_ingles' =>'WATER TEMPERATURE SENSOR FAILURE'],
            ['nombre_evento' =>'Baja presion del aceite','nombre_evento_ingles' =>'LOW OIL PRESSURE'],
            ['nombre_evento' =>'Fallo de realimentacion del rele de precalentamien','nombre_evento_ingles' =>'RL6 (AIRHEAT) FEEDBACK FAILURE'],
            ['nombre_evento' =>'Ha expirado el temporizador de cuenta atras','nombre_evento_ingles' =>'COUNTDOWN TIMER HAS EXPIRED'],
            ['nombre_evento' =>'Presion del aceite alta cuando el motor no esta en','nombre_evento_ingles' =>'OIL PRESSURE HIGH WHILE ENG. IS NOT RUNNING'],
            ['nombre_evento' =>'Fallo del presostato de presion del aceite','nombre_evento_ingles' =>'OIL PRESSURE SWITCH FAILURE'],
            ['nombre_evento' =>'Temperatura del agua alta','nombre_evento_ingles' =>'WATER TEMPERATURE HIGH'],
            ['nombre_evento' =>'El motor no arranca','nombre_evento_ingles' =>'ENGINE FAILED TO CRANK'],
            ['nombre_evento' =>'El motor no se pone en marcha','nombre_evento_ingles' =>'ENGINE FAILED TO START'],
            ['nombre_evento' =>'Sobrecarga externa','nombre_evento_ingles' =>'EXTERNAL OVERLOAD'],
            ['nombre_evento' =>'Motor parado por un motivo desconocido','nombre_evento_ingles' =>'ENGINE STOPPED REASON UNKNOWN'],
            ['nombre_evento' =>'Sin carga, r.p.m. inferiores a 1.530','nombre_evento_ingles' =>'NO LOAD RPM LESS THAN 1530'],
            ['nombre_evento' =>'Fallo de realimentacion del rele de la valvula sol','nombre_evento_ingles' =>'RL3 (SPEED SOLENOID) FEEDBACK FAILURE'],
            ['nombre_evento' =>'Sensor del nivel de combustible fuera de rango','nombre_evento_ingles' =>'FUEL LEVEL SENSOR OUT OF RANGE'],
            ['nombre_evento' =>'El nivel de combustible se redujo demasiado rapido','nombre_evento_ingles' =>'FUEL LEVEL DECREASED TO FAST'],
            ['nombre_evento' =>'Fallo de la valvula solenoide de velocidad','nombre_evento_ingles' =>'SPEED SOLENOID FAILURE'],
            ['nombre_evento' =>'R.p.m. por debajo del limite','nombre_evento_ingles' =>'RPM BELOW LIMIT'],
            ['nombre_evento' =>'Tiempo de espera agotado para la salida retrasada','nombre_evento_ingles' =>'DELAYED OUTPUT TIMED OUT'],
            ['nombre_evento' =>'Fallo de realimentacion del rele de arranque RL5','nombre_evento_ingles' =>'RL5 (STARTER) FEEDBACK FAILURE'],
            ['nombre_evento' =>'Sobrecarga interna','nombre_evento_ingles' =>'INTERNAL OVERLOAD'],
            ['nombre_evento' =>'Apagado de la unidad de control del excitador','nombre_evento_ingles' =>'EXCITER CONTROL UNIT SHUTDOWN'],
            ['nombre_evento' =>'Bajo voltaje de excitacion','nombre_evento_ingles' =>'LOW EXCITATION VOLTAGE'],
            ['nombre_evento' =>'Apagado de la unidad de control del motor','nombre_evento_ingles' =>'ENGINE CONTROL UNIT SHUTDOWN'],
            ['nombre_evento' =>'Luz indicadora de fallo de funcionamiento del moto','nombre_evento_ingles' =>'ENGINE MALFUNCTION INDICATOR LAMP'],
            ['nombre_evento' =>'Advertencia de la suma de comprobaci?n del DSR','nombre_evento_ingles' =>'DSR CHECKSUM WARNING'],
            ['nombre_evento' =>'Advertencia de cortocircuito en el DSR','nombre_evento_ingles' =>'DSR SHORT CIRCUIT WARNING'],
            ['nombre_evento' =>'Advertencia de sobrecorriente de excitaci?n en el ','nombre_evento_ingles' =>'DSR EXCITATION OVERCURRENT WARNING'],
            ['nombre_evento' =>'Evento del DSR','nombre_evento_ingles' =>'DSR EVENT'],
            ['nombre_evento' =>'Advertencia de velocidad del DSR','nombre_evento_ingles' =>'DSR SPEED WARNING'],
            ['nombre_evento' =>'Voltaje de salida alto','nombre_evento_ingles' =>'OUTPUT VOLTAGE HIGH'],
            ['nombre_evento' =>'Proteccion del excitador activada','nombre_evento_ingles' =>'EXCITER PROTECTION ACTIVATED'],
            ['nombre_evento' =>'Fallo del ventilador del liquido refrigerante','nombre_evento_ingles' =>'COOLANT FAN FAILURE'],
            ['nombre_evento' =>'Informacion sobre el codigo P del motor','nombre_evento_ingles' =>'ENGINE P-CODE INFO'],
            ['nombre_evento' =>'Caduca la correa de distribucion','nombre_evento_ingles' =>' TIMING BELT EXPIRED'],


        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('eventos');
    }
}
