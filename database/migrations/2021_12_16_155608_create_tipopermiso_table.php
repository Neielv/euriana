<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTipopermisoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipopermiso', function (Blueprint $table) {
            $table->id();
            $table->string('nombre'); 
            $table->string('padre'); 
            $table->integer('restriccion'); //0.- sin restricción, 1.- saldo positivo, 2.- Justificación (anexo)
            $table->integer('minimo'); 
            $table->integer('maximo'); 
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
        Schema::dropIfExists('tipopermiso');
    }
}
