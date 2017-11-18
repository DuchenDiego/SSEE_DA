<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePremisasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('premisas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('operadorlogico');
            $table->integer('regla_id')->unsigned();
            $table->foreign('regla_id')->references('id')->on('reglas')->onDelete('cascade');
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
        Schema::dropIfExists('premisas');
    }
}
