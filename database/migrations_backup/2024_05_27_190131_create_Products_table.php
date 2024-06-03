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
        Schema::create('Products', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('name', 100);
            $table->text('description')->nullable();
            $table->decimal('price', 10);
            $table->integer('stock');
            $table->integer('category_id')->nullable()->index('category_id');
            $table->integer('supplier_id')->nullable()->index('supplier_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Products');
    }
};
