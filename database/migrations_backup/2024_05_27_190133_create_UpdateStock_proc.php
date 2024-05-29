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
        DB::unprepared("CREATE DEFINER=`root`@`%` PROCEDURE `UpdateStock`(
    IN productID INT,
    IN newQuantity INT,
    IN movementType ENUM('entry', 'exit')
)
BEGIN
    IF movementType = 'entry' THEN
        UPDATE Products SET stock = stock + newQuantity WHERE id = productID;
    ELSE
        UPDATE Products SET stock = stock - newQuantity WHERE id = productID;
    END IF;
    
    INSERT INTO InventoryMovements (product_id, type, quantity) VALUES (productID, movementType, newQuantity);
END");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared("DROP PROCEDURE IF EXISTS UpdateStock");
    }
};
