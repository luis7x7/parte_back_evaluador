<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTEMedicoAuditorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TE_medico_auditor', function (Blueprint $table) {
            $table->id();
            $table->string('MA_RNA')->nullable(FALSE);
            $table->string('MA_CMP')->nullable(FALSE);
            $table->string('MA_RNM')->nullable();
            $table->string('MA_RNE')->nullable();

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
        Schema::dropIfExists('TE_medico_auditor');
    }
}
