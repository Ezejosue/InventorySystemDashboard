<?php

namespace App\Repositories\Interfaces;

use App\DTOs\ProductDTO;
use App\DTOs\UpdateStockDTO;

interface ProductRepositoryInterface
{
    public function getAllProducts();
    public function getProductByName($productName);
    public function addProduct(ProductDTO $productDTO);
    public function updateStock(UpdateStockDTO $updateStockDTO);
    public function updateProduct(int $id, ProductDTO $productDTO);
}
