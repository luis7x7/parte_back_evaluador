<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTELicenciadoPsicologiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TE_licenciado_psicologia', function (Blueprint $table) {
            $table->id();
            $table->string('PS_CPsP')->nullable(FALSE);
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
        Schema::dropIfExists('TE_licenciado_psicologia');
    }
}
