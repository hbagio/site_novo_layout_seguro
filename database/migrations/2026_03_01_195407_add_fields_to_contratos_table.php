<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToContratosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contratos', function (Blueprint $table) {
            // Adiciona campos apenas se não existirem
            if (!Schema::hasColumn('contratos', 'valorliquido')) {
                $table->decimal('valorliquido', 10, 2);
            }

            if (!Schema::hasColumn('contratos', 'parceiro_id')) {
                $table->unsignedBigInteger('parceiro_id');
            }

            if (!Schema::hasColumn('contratos', 'parcelas')) {
                $table->integer('parcelas');
            }

            if (!Schema::hasColumn('contratos', 'percentual_admin')) {
                $table->decimal('percentual_admin', 3, 2);
            }

            if (!Schema::hasColumn('contratos', 'percentualcomisao')) {
                $table->decimal('percentualcomisao', 3, 2);
            }

            if (!Schema::hasColumn('contratos', 'percentualparceiro')) {
                $table->decimal('percentualparceiro', 3, 2);
            }

            // Cria a chave estrangeira apenas se não existir
            $this->createForeignKeyIfNotExists($table);
        });
    }

    /**
     * Verifica e cria a chave estrangeira se não existir
     */
    private function createForeignKeyIfNotExists(Blueprint $table)
    {
        // Para verificar se a FK existe, precisamos usar DB::select
        $schemaName = Schema::getConnection()->getDatabaseName();
        $foreignKeyName = "contratos_parceiro_id_foreign";

        $exists = collect(DB::select("
            SELECT CONSTRAINT_NAME
            FROM information_schema.KEY_COLUMN_USAGE
            WHERE TABLE_SCHEMA = ?
            AND TABLE_NAME = 'contratos'
            AND CONSTRAINT_NAME = ?
        ", [$schemaName, $foreignKeyName]))->isNotEmpty();

        if (!$exists && Schema::hasColumn('contratos', 'parceiro_id')) {
            $table->foreign('parceiro_id')
                  ->references('id')
                  ->on('parceiros')
                  ->onDelete('cascade');

            $table->index('parceiro_id');
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contratos', function (Blueprint $table) {
            // Tenta remover a chave estrangeira se existir
            try {
                $table->dropForeign(['parceiro_id']);
            } catch (\Exception $e) {
                // Ignora se não existir
            }

            // Tenta remover o índice se existir
            try {
                $table->dropIndex(['parceiro_id']);
            } catch (\Exception $e) {
                // Ignora se não existir
            }

            // Remove os campos (se existirem)
            $columnsToDrop = [];
            if (Schema::hasColumn('contratos', 'valorliquido')) {
                $columnsToDrop[] = 'valorliquido';
            }
            if (Schema::hasColumn('contratos', 'parceiro_id')) {
                $columnsToDrop[] = 'parceiro_id';
            }
            if (Schema::hasColumn('contratos', 'parcelas')) {
                $columnsToDrop[] = 'parcelas';
            }
            if (Schema::hasColumn('contratos', 'percentual_admin')) {
                $columnsToDrop[] = 'percentual_admin';
            }
            if (Schema::hasColumn('contratos', 'percentualcomisao')) {
                $columnsToDrop[] = 'percentualcomisao';
            }
            if (Schema::hasColumn('contratos', 'percentualparceiro')) {
                $columnsToDrop[] = 'percentualparceiro';
            }

            if (!empty($columnsToDrop)) {
                $table->dropColumn($columnsToDrop);
            }
        });
    }
}
