<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLOBiologoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('LO_biologo', function (Blueprint $table) {
            $table->id();
            $table->string('lo_CBP')->nullable(FALSE);

            $table->unsignedBigInteger('lo_categoria_id')->nullable();
            
            $table->unsignedBigInteger('Evaluador_id')->nullable();
             $table->foreign('Evaluador_id')->references('id')->on('Evaluador')->onDelete('set null');
            
             
             $table->foreign('lo_categoria_id')->references('id')->on('LO_categoria')->onDelete('set null');
            
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
        Schema::dropIfExists('LO_biologo');
    }
}
