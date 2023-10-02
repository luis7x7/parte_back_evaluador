<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTELaboratoriosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TE_laboratorio', function (Blueprint $table) {
            $table->id();

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
        Schema::dropIfExists('TE_laboratorio');
    }
}
