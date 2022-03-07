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

            $table->float('set_point');
            $table->float('temp_supply_1');
            $table->float('temp_supply_2');
            $table->float('return_air');
            $table->float('evaporation_coil');
            $table->float('condensation_coil');
            $table->float('compress_coil_1');
            $table->float('compress_coil_2');
            $table->float('ambient_air');
            $table->float('cargo_1_temp');
            $table->float('cargo_2_temp');
            $table->float('cargo_3_temp');
            $table->float('cargo_4_temp');
            $table->float('relative_humidity');
            $table->float('avl');
            $table->float('suction_pressure');
            $table->float('discharge_pressure');
            $table->float('line_voltage');
            $table->float('line_frequency');
            $table->float('consumption_ph_1');
            $table->float('consumption_ph_2');
            $table->float('consumption_ph_3');
            $table->float('co2_reading');
            $table->float('o2_reading');
            $table->float('evaporator_speed');
            $table->float('condenser_speed');
            $table->float('battery_voltage');
            $table->float('power_kwh');
            $table->float('power_trip_reading');
            $table->float('power_trip_duration');
            $table->float('suction_temp');
            $table->float('discharge_temp');
            $table->float('supply_air_temp');
            $table->float('return_air_temp');
            $table->float('dl_battery_temp');
            $table->float('dl_battery_charge');
            $table->float('power_consumption');
            $table->float('power_consumption_avg');
            $table->float('alarm_present');
            $table->float('capacity_load');
            $table->float('power_state');
            $table->float('controlling_mode');
            $table->float('humidity_control');
            $table->float('humidity_set_point');
            $table->float('fresh_air_ex_mode');
            $table->float('fresh_air_ex_rate');
            $table->float('fresh_air_ex_delay');
            $table->float('set_point_o2');
            $table->float('set_point_co2');
            $table->float('defrost_term_temp');
            $table->float('defrost_interval');
            $table->float('water_cooled_conde');
            $table->float('usda_trip');
            $table->float('evaporator_exp_valve');
            $table->float('suction_mod_valve');
            $table->float('hot_gas_valve');
            $table->float('economizer_valve');
            $table->float('modelo');
            $table->float('latitud');
            $table->float('longitud');

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
