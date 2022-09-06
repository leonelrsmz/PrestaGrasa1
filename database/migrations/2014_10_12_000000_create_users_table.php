<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
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
            $table->integer('rol')->default('0'); //Papel o tipo de usuario
            $table->string('name');
            $table->string('lastname');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable(); //Le permite ser nulo al campo
            $table->string('password'); //Laravel encripta las contraseñas de manera automática y no podrémos verlas
            $table->rememberToken();
            $table->timestamps(); //Cuando fue creado el registro y cuando fue la ultima vez que se modifico
        });
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
