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
            // Campo forma de pagamento (texto)
            $table->string('forma_pagamento', 100)->nullable()->after('observacoes');

            // Campo valor a pagar ao parceiro (decimal com 2 casas)
            $table->decimal('valorapagarparceiro', 10, 2)->nullable()->after('forma_pagamento');
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
            $table->dropColumn(['forma_pagamento', 'valorapagarparceiro']);
        });
    }
};
