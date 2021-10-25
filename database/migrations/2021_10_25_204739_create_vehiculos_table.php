<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiculosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehiculos', function (Blueprint $table) {
            $table->id();
            $table->string('placa',8);
            $table->string('vto',8);
            $table->string('marca',50);
            $table->string('modelo',50);
            $table->string('color',50);
            $table->string('anio',4);
            $table->string('capacidad',10);
            $table->string('clase',50);
            $table->string('traccion',8);
            $table->string('tipo',50);
            $table->string('dominio',50);
            $table->string('n_motor',20);
            $table->string('n_chasis',18);
            $table->string('n_vin',18);
            $table->string('calidad',50);
            $table->string('estado',4);
            $table->string('n_pol_s',50)->nullable();
            $table->string('v_pol_s',8)->nullable();
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
        Schema::dropIfExists('vehiculos');
    }
}
