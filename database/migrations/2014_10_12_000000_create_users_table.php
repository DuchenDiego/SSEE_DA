<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('idcredencial')->unique();
            $table->string('password');
            $table->string('name');
            $table->string('appaterno');
            $table->string('apmaterno');
            $table->string('carrera');
            $table->enum('semestre',['1','2','3','4','5','6','7','8','9','10'])->default('1');
            $table->date('fechanac');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
