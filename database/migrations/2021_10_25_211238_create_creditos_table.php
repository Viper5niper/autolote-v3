<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCreditosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('creditos', function (Blueprint $table) {
            $table->id();
            $table->boolean('pendiente')->default('1'); // 1 para pendiente 0 para pagado
            $table->integer('n_coutas');
            $table->integer('dia_pago');
            $table->float('monto');
            $table->float('interes');
            $table->timestamp('ult_pago');
            $table->integer('cliente_id');
            $table->integer('vehiculo_id');
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
        Schema::dropIfExists('creditos');
    }
}
