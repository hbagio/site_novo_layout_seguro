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
        Schema::create('parceiro', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('cpfcnpj');
            $table->string('nome');
            $table->string('endereco');
            $table->string('bairro');
            $table->string('cidade');
            $table->string('estado');
            $table->string('telefone');
            $table->string('email');
            $table->string('banco');
            $table->string('agencia');
            $table->string('conta');
            $table->string('pix');
            $table->string('percentual');
            $table->string('contrato');
            $table->smallInteger('situacao');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parceiro');
    }
};
