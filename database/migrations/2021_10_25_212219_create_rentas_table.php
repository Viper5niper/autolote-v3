<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rentas', function (Blueprint $table) {
            $table->id();
            $table->integer('vehiculo_id');
            $table->integer('cliente_id');
            $table->integer('factura_id');
            $table->integer('dias');
            $table->integer('monto');
            $table->integer('estado')->default('1'); //Estado del vehiculo en renta, 1 para renta activa y 0 para finalizada
            $table->longText('json_array');
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
        Schema::dropIfExists('rentas');
    }
}
