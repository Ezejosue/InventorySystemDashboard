<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('Products', function (Blueprint $table) {
            $table->foreign(['category_id'], 'Products_ibfk_1')->references(['id'])->on('Categories')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['supplier_id'], 'Products_ibfk_2')->references(['id'])->on('Suppliers')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('Products', function (Blueprint $table) {
            $table->dropForeign('Products_ibfk_1');
            $table->dropForeign('Products_ibfk_2');
        });
    }
};
