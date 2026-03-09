<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {

            // foreign key ke users (admin)
            $table->foreignId('created_by')
                  ->nullable()
                  ->after('expired_date')
                  ->constrained('users')
                  ->onDelete('set null');

            // foreign key ke suppliers
            $table->foreignId('supplier_id')
                  ->nullable()
                  ->after('created_by')
                  ->constrained()
                  ->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {

            $table->dropForeign(['created_by']);
            $table->dropColumn('created_by');

            $table->dropForeign(['supplier_id']);
            $table->dropColumn('supplier_id');
        });
    }
};