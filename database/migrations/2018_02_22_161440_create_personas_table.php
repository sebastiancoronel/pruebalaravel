<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('apellido');
            $table->string('nombre');
            $table->string('foto'); //antes estaba en binary
            $table->integer('dni');
            $table->date('fecha_nac');
            $table->string('direccion');
            $table->integer('provincia_id')->unsigned(); //Columna para relacionar con una provincia.
            $table->foreign('provincia_id')->references('id')->on('provincias')->onDelete('cascade')->onUpdate('cascade');       //Referencio al Id de provincias; OnDelete y OnUpdate para evitar tener datos huerfanos; elimina o actualiza en cascada
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
        Schema::dropIfExists('personas');
    }
}
