<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTEMedicoEspecialistasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TE_medico_especialista', function (Blueprint $table) {
            $table->id();
            $table->string('ME_RNE')->nullable(FALSE);
            $table->string('ME_CMP')->nullable(FALSE);
            

             $table->unsignedBigInteger('Evaluador_id')->nullable();
            
             
             $table->unsignedBigInteger('me_categoria_id')->nullable();
            
            
             
             $table->foreign('Evaluador_id')->references('id')->on('Evaluador')->onDelete('set null');
            
            
             $table->foreign('me_categoria_id')->references('id')->on('ME_categoria')->onDelete('set null');
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
        Schema::dropIfExists('TE_medico_especialista');
    }
}
