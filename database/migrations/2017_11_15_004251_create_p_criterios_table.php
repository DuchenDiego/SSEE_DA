<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePCriteriosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('p_criterios', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('premis_id')->unsigned();
            $table->foreign('premis_id')->references('id')->on('premisas')->onDelete('cascade');
            $table->enum('tipo',['predisposicion','elemento','sintoma','medicamento',]);
            $table->tinyInteger('conclusion')->default(0);
            $table->integer('predis_id')->unsigned()->nullable($value = true);
            $table->integer('elem_id')->unsigned()->nullable($value = true);
            $table->integer('sinto_id')->unsigned()->nullable($value = true);
            $table->integer('medic_id')->unsigned()->nullable($value = true);
            $table->foreign('predis_id')->references('id')->on('predisposiciones')->onDelete('cascade');
            $table->foreign('elem_id')->references('id')->on('elementos')->onDelete('cascade');
            $table->foreign('sinto_id')->references('id')->on('sintomas')->onDelete('cascade');
            $table->foreign('medic_id')->references('id')->on('medicinfluyentes')->onDelete('cascade');
            $table->string('comparador');
            $table->integer('valor');
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
        Schema::dropIfExists('p_criterios');
    }
}
