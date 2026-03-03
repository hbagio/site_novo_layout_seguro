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
            $table->decimal('percentual_admin', 5, 2)->change();
            $table->decimal('percentualcomissao', 5, 2)->change();
            $table->decimal('percentualparceiro', 5, 2)->change();
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
            //
            $table->decimal('percentual_admin', 3, 2)->change();
            $table->decimal('percentualcomissao', 3, 2)->change();
            $table->decimal('percentualparceiro', 3, 2)->change();
        });
    }
};
