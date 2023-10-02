<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTEMedicoOcupacionalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TE_medico_ocupacional', function (Blueprint $table) {
            $table->id();
            $table->string('MO_RNM')->nullable(FALSE);
            $table->string('MO_CMP')->nullable(FALSE);
            $table->string('MO_RNE')->nullable();

           $table->unsignedBigInteger('Evaluador_id')->nullable();
            
             
             $table->foreign('Evaluador_id')->references('id')->on('Evaluador')->onDelete('set null');

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
        Schema::dropIfExists('TE_medico_ocupacional');
    }
}
