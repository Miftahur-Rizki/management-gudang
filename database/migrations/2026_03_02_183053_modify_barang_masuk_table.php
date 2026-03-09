<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('barang_masuk', function (Blueprint $table) {

            // hapus foreign key dulu
            $table->dropForeign(['product_id']);

            // baru hapus kolom
            $table->dropColumn(['product_id', 'quantity']);
        });
    }

    public function down(): void
    {
        Schema::table('barang_masuk', function (Blueprint $table) {
            $table->unsignedBigInteger('product_id');
            $table->integer('quantity');

            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }
};