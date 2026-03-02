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
            // Torna os campos bancários opcionais (aceitam NULL)
            $table->string('banco')->nullable()->change();
            $table->string('agencia')->nullable()->change();
            $table->string('conta')->nullable()->change();
            $table->string('pix')->nullable()->change();
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
            // Reverte para NOT NULL (cuidado: pode causar erro se houver registros com NULL)
            $table->string('banco')->nullable(false)->change();
            $table->string('agencia')->nullable(false)->change();
            $table->string('conta')->nullable(false)->change();
            $table->string('pix')->nullable(false)->change();
        });
    }
};
