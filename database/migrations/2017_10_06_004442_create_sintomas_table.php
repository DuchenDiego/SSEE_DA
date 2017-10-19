<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSintomasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sintomas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->enum('estado',['si','no'])->default('no');
            $table->enum('habilitado',['si','no'])->default('si');
            $table->integer('ele_id')->unsigned();
            $table->foreign('ele_id')->references('id')->on('elementos')->onDelete('cascade');
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
        Schema::dropIfExists('sintomas');
    }
}
