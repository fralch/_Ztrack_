<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('madurador_control', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('contenedor_id');
            $table->decimal('temperatura', $precision=8, $scale=2)->nullable();
            $table->decimal('co2', $precision=8, $scale=2)->nullable();
            $table->decimal('humedad', $precision=8, $scale=2)->nullable();
            $table->decimal('etileno', $precision=8, $scale=2)->nullable();
            $table->decimal('tiempo_proceso', $precision=8, $scale=2)->nullable();
            $table->decimal('etileno_minimo', $precision=8, $scale=2)->nullable();
            $table->decimal('tiempo_inyeccion', $precision=8, $scale=2)->nullable();
            $table->char('estado', 1)->nullable();
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
        Schema::dropIfExists('madurador_control');
    }
};
