<?php

namespace App\DTOs;

class SaleDTO
{
    public $client_id;
    public $product_id;
    public $quantity;

    public function __construct($client_id, $product_id, $quantity)
    {
        $this->client_id = $client_id;
        $this->product_id = $product_id;
        $this->quantity = $quantity;
    }
}
