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
        Schema::create('pagamentos', function (Blueprint $table) {
             $table->id(); // Chave primária simples (já é PRIMARY KEY)
            $table->unsignedBigInteger('idcontrato');

            // Chave estrangeira
            $table->foreign('idcontrato')
                  ->references('id')
                  ->on('contratos')
                  ->onDelete('cascade');

            // Campos da tabela
            $table->date('data_pagamento');
            $table->decimal('valor', 10, 2);
            $table->text('observacao')->nullable();
            $table->string('comprovante')->nullable();
            $table->enum('situacao', ['pendente', 'pago', 'cancelado'])->default('pendente');

            $table->timestamps();

            // Índices para melhor performance
            $table->index('idcontrato');
            $table->index('data_pagamento');
            $table->index('situacao');

            // Unique constraint para evitar duplicidade se necessário
            // $table->unique(['idcontrato', 'data_pagamento']); // Opcional
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pagamentos');
    }
};
