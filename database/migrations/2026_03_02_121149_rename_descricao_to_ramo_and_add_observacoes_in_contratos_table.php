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
        Schema::table('contratos', function (Blueprint $table) {
           // 1. Renomeia o campo 'descricao' para 'ramo'
            $table->renameColumn('descricao', 'ramo');

            // 2. Adiciona o novo campo 'observacoes'
            // Definido como text para suportar descrições longas e nullable para não travar registros antigos
            $table->text('observacoes')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contratos', function (Blueprint $table) {
           $table->renameColumn('ramo', 'descricao');
            $table->dropColumn('observacoes');
        });
    }
};
