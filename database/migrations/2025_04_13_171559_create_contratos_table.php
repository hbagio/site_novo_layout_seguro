<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contratos', function (Blueprint $table) {

                $table->id();
                $table->timestamps();
                $table->text('descricao');
                $table->string('seguradora');
                $table->float('valor');
                $table->float('comicao');
                $table->date('datainicio');
                $table->date('datafim');
                $table->string('apolice');
                $table->smallInteger('situacao');
                $table->unsignedBigInteger('idpessoa');
                $table->foreign('idpessoa')
                      ->references('id')
                      ->on('pessoas')
                      ->onDelete('cascade');

            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contratos');
    }
};
