<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePredisposicionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('predisposiciones', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->enum('estado',['si','no'])->default('no');
            $table->integer('cri_id')->unsigned();
            $table->foreign('cri_id')->references('id')->on('criterios')->onDelete('cascade');
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
        Schema::dropIfExists('predisposiciones');
    }
}
