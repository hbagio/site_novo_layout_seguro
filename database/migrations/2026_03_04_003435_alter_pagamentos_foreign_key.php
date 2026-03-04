<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('pagamentos', function (Blueprint $table) {
            // 1. Removemos a FK atual para evitar conflitos (ajuste o nome se for diferente)
            // O padrão do Laravel é: nome_da_tabela_nome_da_coluna_foreign
            $table->dropForeign(['idcontrato']);

            // 2. Recriamos com a trava de segurança (RESTRICT)
            $table->foreign('idcontrato')
                  ->references('id')
                  ->on('contratos')
                  ->restrictOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('pagamentos', function (Blueprint $table) {
            $table->dropForeign(['idcontrato']);

            // Reverte para o estado anterior (ajuste conforme seu sistema estava)
            $table->foreign('idcontrato')
                  ->references('id')
                  ->on('contratos');
        });
    }
};
