<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivistasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activistas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ficha_id')->nullable();
            $table->string('cedula');
            $table->string('apellido');
            $table->string('nombre');
            $table->string('telefono');
            $table->string('barrio');
            $table->boolean('estado');
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
        Schema::dropIfExists('activistas');
    }
}
