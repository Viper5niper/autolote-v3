<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpleadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->id();
            $table->string('nombre',75);
            $table->string('apellido',75);
            $table->string('doc',10)->unique();
            $table->string('direccion',200);
            $table->string('telefono',9);
            $table->string('celular',9)->nullable();
            $table->string('nit',17)->nullable();
            $table->char('licencia',1)->nullable();
            $table->string('isss',25)->nullable();
            $table->string('nup',15)->nullable();
            $table->string('profesion',50);
            $table->string('area_empresa',50);
            $table->string('cargo',50);
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
        Schema::dropIfExists('empleados');
    }
}
