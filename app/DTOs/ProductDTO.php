<?php

namespace App\DTOs;

class ProductDTO
{
    public $name;
    public $description;
    public $price;
    public $stock;
    public $category_id;
    public $supplier_id;

    public function __construct($name, $description, $price, $stock, $category_id, $supplier_id)
    {
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->stock = $stock;
        $this->category_id = $category_id;
        $this->supplier_id = $supplier_id;
    }
}
