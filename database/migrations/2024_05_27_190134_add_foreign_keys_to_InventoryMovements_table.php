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
        Schema::table('InventoryMovements', function (Blueprint $table) {
            $table->foreign(['product_id'], 'InventoryMovements_ibfk_1')->references(['id'])->on('Products')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('InventoryMovements', function (Blueprint $table) {
            $table->dropForeign('InventoryMovements_ibfk_1');
        });
    }
};
