<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePHechosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('p_hechos', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('estado')->default(0);
            $table->integer('numPremisa')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('diag_id')->unsigned();
            $table->integer('predis_id')->unsigned()->nullable($value = true);
            $table->integer('elem_id')->unsigned()->nullable($value = true);
            $table->integer('sinto_id')->unsigned()->nullable($value = true);
            $table->integer('medic_id')->unsigned()->nullable($value = true);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('diag_id')->references('id')->on('diagnosticos')->onDelete('cascade');
            $table->foreign('predis_id')->references('id')->on('predisposiciones')->onDelete('cascade');
            $table->foreign('elem_id')->references('id')->on('elementos')->onDelete('cascade');
            $table->foreign('sinto_id')->references('id')->on('sintomas')->onDelete('cascade');
            $table->foreign('medic_id')->references('id')->on('medicinfluyentes')->onDelete('cascade');
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
        Schema::dropIfExists('p_hechos');
    }
}
