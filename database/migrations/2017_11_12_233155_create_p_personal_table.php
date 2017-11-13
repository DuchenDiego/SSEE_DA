<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePPersonalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('p_personal', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('diag_id')->unsigned();
            $table->integer('pers_id')->unsigned();
            $table->foreign('diag_id')->references('id')->on('diagnosticos')->onDelete('cascade');
            $table->foreign('pers_id')->references('id')->on('personals')->onDelete('cascade');
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
        Schema::dropIfExists('p_personal');
    }
}
