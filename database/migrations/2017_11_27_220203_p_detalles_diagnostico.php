<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PDetallesDiagnostico extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('p_detalles_diagnostico', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('diag_id')->unsigned();
            $table->integer('regla_id')->unsigned();
            $table->foreign('diag_id')->references('id')->on('diagnosticos')->onDelete('cascade');
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
        Schema::dropIfExists('p_detalles_diagnostico');
    }
}
