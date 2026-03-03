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
          // Renomeia a coluna de percentualcomisao para percentualcomissao
            if (Schema::hasColumn('contratos', 'percentualcomisao')) {
                $table->renameColumn('percentualcomisao', 'percentualcomissao');
            }
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
        // Reverte para o nome antigo
            if (Schema::hasColumn('contratos', 'percentualcomissao')) {
                $table->renameColumn('percentualcomissao', 'percentualcomisao');}
        });
    }
};
