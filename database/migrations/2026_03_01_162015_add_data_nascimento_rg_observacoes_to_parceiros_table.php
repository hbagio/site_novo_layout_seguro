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
        Schema::table('parceiros', function (Blueprint $table) {
            // Campo data_nascimento do tipo date - NÃO OBRIGATÓRIO (nullable)
            $table->date('data_nascimento')->nullable()->after('nome');

            // Campo RG do tipo string - NÃO OBRIGATÓRIO (nullable)
            $table->string('rg', 20)->nullable()->after('cpfcnpj');

            // Campo observacoes do tipo text - NÃO OBRIGATÓRIO (nullable)
            $table->text('observacoes')->nullable()->after('percentual');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('parceiros', function (Blueprint $table) {
            //
        });
    }
};
