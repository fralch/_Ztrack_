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

            $table->decimal('set_point', $precision=8, $scale=1)->nullable();
            $table->decimal('temp_supply_1', $precision=8, $scale=1)->nullable();
            $table->decimal('temp_supply_2', $precision=8, $scale=1)->nullable();
            $table->decimal('return_air', $precision=8, $scale=1)->nullable();
            $table->decimal('evaporation_coil', $precision=8, $scale=1)->nullable();
            $table->decimal('condensation_coil', $precision=8, $scale=1)->nullable();
            $table->decimal('compress_coil_1', $precision=8, $scale=1)->nullable();
            $table->decimal('compress_coil_2', $precision=8, $scale=1)->nullable();
            $table->decimal('ambient_air', $precision=8, $scale=1)->nullable();
            $table->decimal('cargo_1_temp', $precision=8, $scale=1)->nullable();
            $table->decimal('cargo_2_temp', $precision=8, $scale=1)->nullable();
            $table->decimal('cargo_3_temp', $precision=8, $scale=1)->nullable();
            $table->decimal('cargo_4_temp', $precision=8, $scale=1)->nullable();
            $table->integer('relative_humidity')->nullable();
            $table->integer('avl')->nullable();
            $table->decimal('suction_pressure', $precision=8, $scale=2)->nullable();
            $table->decimal('discharge_pressure', $precision=8, $scale=2)->nullable();
            $table->integer('line_voltage')->nullable();
            $table->integer('line_frequency')->nullable();
            $table->decimal('consumption_ph_1', $precision=8, $scale=1)->nullable();
            $table->decimal('consumption_ph_2', $precision=8, $scale=1)->nullable();
            $table->decimal('consumption_ph_3', $precision=8, $scale=1)->nullable();
            $table->decimal('co2_reading', $precision=8, $scale=1)->nullable();
            $table->decimal('o2_reading', $precision=8, $scale=1)->nullable();
            $table->integer('evaporator_speed')->nullable();
            $table->integer('condenser_speed')->nullable();
            $table->decimal('battery_voltage', $precision=8, $scale=1)->nullable();
            $table->decimal('power_kwh', $precision=8, $scale=1)->nullable();
            $table->decimal('power_trip_reading', $precision=8, $scale=1)->nullable();
            $table->integer('power_trip_duration')->nullable();
            $table->decimal('suction_temp', $precision=8, $scale=1)->nullable();
            $table->decimal('discharge_temp', $precision=8, $scale=1)->nullable();
            $table->decimal('supply_air_temp', $precision=8, $scale=1)->nullable();
            $table->decimal('return_air_temp', $precision=8, $scale=1)->nullable();
            $table->decimal('dl_battery_temp', $precision=8, $scale=2)->nullable();
            $table->decimal('dl_battery_charge', $precision=8, $scale=2)->nullable();
            $table->decimal('power_consumption', $precision=8, $scale=2)->nullable();
            $table->decimal('power_consumption_avg', $precision=8, $scale=1)->nullable();
            $table->boolean('alarm_present')->nullable();
            $table->integer('capacity_load')->nullable();
            $table->string('power_state',100)->nullable();
            $table->string('controlling_mode', 100)->nullable();
            $table->boolean('humidity_control')->nullable();
            $table->integer('humidity_set_point')->nullable();
            $table->integer('fresh_air_ex_mode')->nullable();
            $table->integer('fresh_air_ex_rate')->nullable();
            $table->integer('fresh_air_ex_delay')->nullable();
            $table->integer('set_point_o2')->nullable();
            $table->integer('set_point_co2')->nullable();
            $table->decimal('defrost_term_temp', $precision=8, $scale=1)->nullable();
            $table->integer('defrost_interval')->nullable();
            $table->boolean('water_cooled_conde')->nullable();
            $table->boolean('usda_trip')->nullable();
            $table->integer('evaporator_exp_valve')->nullable();
            $table->integer('suction_mod_valve')->nullable();
            $table->integer('hot_gas_valve')->nullable();
            $table->integer('economizer_valve')->nullable();
            $table->string('modelo', 100)->nullable();
            $table->float('latitud')->nullable();
            $table->float('longitud')->nullable();

            $table->timestamps();

            $table->foreign('contenedor_id')->references('id')->on('contenedores');
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
