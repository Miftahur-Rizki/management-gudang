<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('barang_masuk', function (Blueprint $table) {

            // Tambah kode transaksi & supplier
            $table->string('kode_transaksi')->unique()->after('id');
            $table->foreignId('supplier_id')->nullable()->after('kode_transaksi')->constrained();

            // Hapus kolom lama
            $table->dropColumn(['product_id', 'quantity']);
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
