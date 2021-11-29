<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer('role'); /* Tipo de Usuario 1 = Administrador, 2 = Usuario */
            $table->integer('empleado_id');
            $table->rememberToken();
            $table->timestamps();
        });

        $user = new User();

        $user->name = 'Usuario Default';
        $user->email = 'admin@mail.com';
        $user->password = Hash::make('12345678');
        $user->role = '1';
        $user->empleado_id = '0';

        $user->save();
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
