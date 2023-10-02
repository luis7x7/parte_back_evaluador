<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvaluadorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluador', function (Blueprint $table) {
            $table->id();
            $table->string('apellidos')->nullable();
            $table->string('nombres')->nullable();
            $table->string('direccion')->nullable();
            $table->string('telefono')->nullable();
            $table->string('email')->nullable();
            $table->text('imagen_firma')->nullable();
            $table->string('pos_firma')->nullable();
            
            $table->unsignedBigInteger('Tipo_Especialista_id')->nullable();
            
            $table->foreign('Tipo_Especialista_id')->references('id')->on('Tipo_Especialista')->onDelete('set null');


            $table->char('estado_registro')->default('I');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::dropIfExists('evaluador');
    }
}
