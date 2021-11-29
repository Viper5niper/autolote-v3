<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facturas', function (Blueprint $table) {
            $table->id();
            $table->integer('n_factura');
            $table->integer('cliente_id')->nullable();
            $table->integer('credito_id')->nullable();
            $table->integer('vehiculo_id')->nullable();
            $table->string('tipo',10); /* tipo de factura = credito fiscal (credito), consumidor final (consumidor)*/
            $table->string('area_factura',3); /* tipo de factura segun servicio = renta (R), venta (V), 
            letra credito(LC), servicio taller automotriz(STA) , servicio taller pintura (STP), servicio carwash (SC), otro (O)*/
            $table->string('descripcion',60); //  
            $table->longText('payload'); // Guardara toda la informacion de la factura para poder recrearla o mostrarla
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
        Schema::dropIfExists('facturas');
    }
}
