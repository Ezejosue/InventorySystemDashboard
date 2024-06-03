<?php

namespace App\Repositories;

use App\Repositories\Interfaces\ProductRepositoryInterface;
use App\DTOs\ProductDTO;
use App\DTOs\ProductListDTO;
use App\DTOs\UpdateStockDTO;
use App\Models\Products;
use Illuminate\Support\Facades\DB;

class ProductRepository implements ProductRepositoryInterface
{

    public function getAllProducts()
    {
        $products = Products::with('category')->get();

        return $products->map(function ($product) {
            return new ProductListDTO(
                $product->id,
                $product->name,
                $product->description,
                $product->price,
                $product->stock,
                $product->category->name,
                $product->supplier->name
            );
        });
    }

    public function getProductByName($productName)
    {
        $products = Products::with('category', 'supplier')
            ->where('name', 'LIKE', '%' . $productName . '%')
            ->get();

        return $products->map(function ($product) {
            return new ProductListDTO(
                $product->id,
                $product->name,
                $product->description,
                $product->price,
                $product->stock,
                $product->category->name,
                $product->supplier->name
            );
        });
    }


    public function addProduct(ProductDTO $productDTO)
    {
        DB::statement('CALL AddProduct(?, ?, ?, ?, ?, ?)', [
            $productDTO->name,
            $productDTO->description,
            $productDTO->price,
            $productDTO->stock,
            $productDTO->category_id,
            $productDTO->supplier_id
        ]);
    }

    public function updateStock(UpdateStockDTO $updateStockDTO)
    {
        DB::statement('CALL UpdateStock(?, ?, ?)', [
            $updateStockDTO->productID,
            $updateStockDTO->newQuantity,
            $updateStockDTO->movementType
        ]);
    }
}
