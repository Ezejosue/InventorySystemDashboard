<?php

namespace App\DTOs;

class UpdateStockDTO
{
    public $productID;
    public $newQuantity;
    public $movementType;

    public function __construct($productID, $newQuantity, $movementType)
    {
        $this->productID = $productID;
        $this->newQuantity = $newQuantity;
        $this->movementType = $movementType;
    }
}
