<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFoliosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('folios', function (Blueprint $table) {
            $table->id();
            $table->integer('codigo');
            $table->unsignedBigInteger('autor_id');
            $table->unsignedBigInteger('responsable_id');
            $table->string('titulo');
            $table->text('descripcion');
            $table->date('fecha_esp_resolucion');
            $table->unsignedBigInteger('estatus_id');
            $table->timestamps();



            $table->foreign('autor_id')->references('id')->on('usuarios');
            $table->foreign('responsable_id')->references('id')->on('usuarios');
            $table->foreign('estatus_id')->references('id')->on('estatuses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
        Schema::dropIfExists('folios');
    }
}
