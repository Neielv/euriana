<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermisosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permisos', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('servidor_id')->nullable();
            $table->unsignedBigInteger('tipo_id')->nullable();
            $table->unsignedBigInteger('estado_id')->nullable();
            $table->date('fecha_desde');
            $table->date('fecha_hasta');
            $table->time("hora_desde")->useCurrent = true;
            $table->time("hora_hasta")->useCurrent = true;
            $table->integer("minutos");
            $table->string('motivo');
                      
            $table->foreign('servidor_id')
            ->references('id')->on('servidores')
            ->onDelete('set null');

            $table->foreign('tipo_id')
            ->references('id')->on('tipopermiso')
            ->onDelete('set null');

            $table->foreign('estado_id')
            ->references('id')->on('estadopermiso')
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
        Schema::dropIfExists('permisos');
    }
}
