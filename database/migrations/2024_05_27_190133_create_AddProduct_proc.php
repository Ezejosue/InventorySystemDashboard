<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::unprepared("CREATE DEFINER=`root`@`%` PROCEDURE `AddProduct`(
    IN productName VARCHAR(100),
    IN productDescription TEXT,
    IN productPrice DECIMAL(10, 2),
    IN productStock INT,
    IN productCategory INT,
    IN productSupplier INT
)
BEGIN
    INSERT INTO Products (name, description, price, stock, category_id, supplier_id)
    VALUES (productName, productDescription, productPrice, productStock, productCategory, productSupplier);
END");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared("DROP PROCEDURE IF EXISTS AddProduct");
    }
};
