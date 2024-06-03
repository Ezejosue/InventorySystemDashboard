<?php

namespace App\DTOs;

/**
 * @OA\Schema(
 *     schema="ProductListDTO",
 *     type="object",
 *     title="Product List DTO",
 *     description="Data transfer object for listing products",
 *     @OA\Property(
 *         property="id",
 *         type="integer",
 *         description="The unique identifier of the product",
 *         example=1
 *     ),
 *     @OA\Property(
 *         property="name",
 *         type="string",
 *         description="The name of the product",
 *         example="Sample Product"
 *     ),
 *     @OA\Property(
 *         property="description",
 *         type="string",
 *         description="The description of the product",
 *         example="This is a sample product"
 *     ),
 *     @OA\Property(
 *         property="price",
 *         type="number",
 *         format="float",
 *         description="The price of the product",
 *         example=99.99
 *     ),
 *     @OA\Property(
 *         property="stock",
 *         type="integer",
 *         description="The stock quantity of the product",
 *         example=50
 *     ),
 *     @OA\Property(
 *         property="category_name",
 *         type="string",
 *         description="The name of the category",
 *         example="Electronics"
 *     ),
 *     @OA\Property(
 *         property="supplier_name",
 *         type="string",
 *         description="The name of the supplier",
 *         example="Supplier Inc."
 *     )
 * )
 */
class ProductListDTO
{
    public $id;
    public $name;
    public $description;
    public $price;
    public $stock;
    public $category_name;
    public $supplier_name;

    public function __construct($id, $name, $description, $price, $stock, $category_name, $supplier_name)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->stock = $stock;
        $this->category_name = $category_name;
        $this->supplier_name = $supplier_name;
    }
}
