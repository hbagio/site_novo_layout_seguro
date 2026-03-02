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
            // Altera de decimal(2,2) para decimal(5,2) - permite até 99.99%
            // Ou use decimal(3,2) se o máximo for 9.99%
            $table->decimal('percentual', 5, 2)->nullable()->change();
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
            // Reverte para o tamanho original (caso necessário)
            $table->decimal('percentual', 2, 2)->nullable()->change();
        });
    }
};
