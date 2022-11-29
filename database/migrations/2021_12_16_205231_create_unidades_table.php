<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unidades', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('siglas')->nullable();
            $table->unsignedBigInteger('proceso_id')->nullable();            
            $table->integer('parent_id')->nullable();        
            $table->integer('servidor_id')->nullable();            

            $table->foreign('proceso_id')
            ->references('id')->on('procesos')
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
        Schema::dropIfExists('unidades');
    }
}
