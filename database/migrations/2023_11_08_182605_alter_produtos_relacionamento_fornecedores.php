<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('produtos', function (Blueprint $table) {
            $supplierId = DB::table('fornecedores')->insertGetId([
                'nome' => 'default',
                'site' => 'default.com.br',
                'uf' => 'CE',
                'email' => 'default@gmial.com'
            ]);

            $table->unsignedBigInteger('fornecedor_id')->default($supplierId)->after('id');
            $table->foreign('fornecedor_id')->references('id')->on('fornecedores');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('produtos', function (Blueprint $table) {
            $table->dropForeign('produtos_fornecedor_id_foreign');
            $table->dropColumn(['fornecedor_id']);
        });
    }
};
