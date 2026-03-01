<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('barang_keluar', function (Blueprint $table) {

            // user yang membuat transaksi
            $table->foreignId('created_by')
                  ->nullable()
                  ->after('keterangan')
                  ->constrained('users')
                  ->onDelete('set null');

            // user yang approve
            $table->foreignId('approved_by')
                  ->nullable()
                  ->after('created_by')
                  ->constrained('users')
                  ->onDelete('set null');

            // status approval
            $table->enum('status', ['pending', 'approved', 'rejected'])
                  ->default('pending')
                  ->after('approved_by');
        });
    }

    public function down(): void
    {
        Schema::table('barang_keluar', function (Blueprint $table) {

            $table->dropForeign(['created_by']);
            $table->dropColumn('created_by');

            $table->dropForeign(['approved_by']);
            $table->dropColumn('approved_by');

            $table->dropColumn('status');
        });
    }
};