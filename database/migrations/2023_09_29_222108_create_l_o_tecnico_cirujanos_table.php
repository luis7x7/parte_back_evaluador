<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLOTecnicoCirujanosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lo_tecnico_cirujanos', function (Blueprint $table) {
            $table->id();
            $table->string('lo_CMP')->nullable(FALSE);
            $table->string('lo_RNE')->nullable(FALSE);
            $table->unsignedBigInteger('lo_categoria_id')->nullable();
            
            
             
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
        Schema::dropIfExists('lo_tecnico_cirujanos');
    }
}
