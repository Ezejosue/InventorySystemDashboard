<?php

namespace App\Services;

use App\DTOs\ProductDTO;
use App\DTOs\UpdateStockDTO;
use App\Repositories\Interfaces\ProductRepositoryInterface;

class ProductService
{
    protected $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function getAllProducts()
    {
        return $this->productRepository->getAllProducts();
    }

    public function getProductByName($productName)
    {
        return $this->productRepository->getProductByName($productName);
    }

    public function addProduct(ProductDTO $productDTO)
    {
        return $this->productRepository->addProduct($productDTO);
    }

    public function updateStock(UpdateStockDTO $updateStockDTO)
    {
        return $this->productRepository->updateStock($updateStockDTO);
    }

    public function updateProduct(int $id, ProductDTO $productDTO)
    {
        return $this->productRepository->updateProduct($id, $productDTO);
    }
}
