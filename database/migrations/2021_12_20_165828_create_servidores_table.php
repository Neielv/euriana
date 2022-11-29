<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServidoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servidores', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('genero_id')->nullable();
            $table->unsignedBigInteger('estado_civil_id')->nullable();
            $table->unsignedBigInteger('formacion_id')->nullable();              
            $table->unsignedBigInteger('unidad_id')->nullable();
            $table->unsignedBigInteger('tipo_contrato_id')->nullable();
            $table->unsignedBigInteger('grupo_id')->nullable();
            $table->unsignedBigInteger('etnia_id')->nullable();
            $table->unsignedBigInteger('nacionalidad_id')->nullable();
            $table->unsignedBigInteger('discapacidad_id')->nullable();
            $table->string('cedula')->unique();
            $table->string('nombre')->unique(); 
            $table->string('foto'); 
            $table->date('fecha_nacimiento');
            $table->string('telefono');
            $table->string('email');
            $table->string('email_personal');
            $table->string('puesto');            
            $table->string('partida');
            $table->date('fecha_ingreso');
            $table->string('lugar_nacimiento');
            $table->string('direccion');
            
            $table->boolean('alimentacion');  
            $table->boolean('transporte'); 
            $table->boolean('recidencia'); 
            $table->double('saldo_vacaciones'); 

            $table->foreign('user_id')
            ->references('id')->on('users')
            ->onDelete('set null');

            $table->foreign('genero_id')
            ->references('id')->on('generos')
            ->onDelete('set null');

            $table->foreign('formacion_id')
            ->references('id')->on('formacionacademica')
            ->onDelete('set null');

            $table->foreign('unidad_id')
            ->references('id')->on('unidades')
            ->onDelete('set null');

            $table->foreign('grupo_id')
            ->references('id')->on('grupos')
            ->onDelete('set null');

            $table->foreign('estado_civil_id')
            ->references('id')->on('estado_civil')
            ->onDelete('set null');

            $table->foreign('etnia_id')
            ->references('id')->on('etnias')
            ->onDelete('set null');

            $table->foreign('nacionalidad_id')
            ->references('id')->on('nacionalidades')
            ->onDelete('set null');

            $table->foreign('discapacidad_id')
            ->references('id')->on('discapacidades')
            ->onDelete('set null');

            $table->foreign('tipo_contrato_id')
            ->references('id')->on('tipo_contrato')
            ->onDelete('set null');


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
        Schema::dropIfExists('servidores');
    }
}
