<?php

namespace App\Http\Controllers;

use App\DTOs\ProductDTO;
use App\DTOs\UpdateStockDTO;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    /**
     * Get all products.
     *
     * @OA\Get(
     *     path="/api/products",
     *     operationId="getAllProducts",
     *     tags={"Products"},
     *     summary="Get all products",
     *     description="Returns a list of all products",
     *     @OA\Response(
     *         response=200,
     *         description="A list of products",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/ProductListDTO")
     *         )
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Bad request",
     *         @OA\JsonContent(
     *             @OA\Property(
     *                 property="error",
     *                 type="string",
     *                 example="Invalid input"
     *             )
     *         )
     *     )
     * )
     */
    public function getAll()
    {
        $products = $this->productService->getAllProducts();
        return response()->json($products, 200);
    }

    /**
     * Get product by name.
     *
     * @OA\Get(
     *     path="/api/products/{productName}",
     *     operationId="getProductByName",
     *     tags={"Products"},
     *     summary="Get product by name",
     *     description="Returns a product by its name",
     *     @OA\Parameter(
     *         name="productName",
     *         in="path",
     *         required=true,
     *         @OA\Schema(
     *             type="string"
     *         ),
     *         description="The name of the product"
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Product found",
     *         @OA\JsonContent(ref="#/components/schemas/ProductListDTO")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Product not found",
     *         @OA\JsonContent(
     *             @OA\Property(
     *                 property="message",
     *                 type="string",
     *                 example="Product not found"
     *             )
     *         )
     *     )
     * )
     */
    public function getProductByName($productName)
    {
        $products  = $this->productService->getProductByName($productName);
        if ($products->isNotEmpty()) {
            return response()->json($products, 200);
        }
        return response()->json(['message' => 'Product not found'], 404);
    }

    /**
     * Store a newly created product in storage.
     *
     * @OA\Post(
     *     path="/api/products",
     *     operationId="storeProduct",
     *     tags={"Products"},
     *     summary="Add a new product",
     *     description="Creates a new product in the database",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/Product")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Product added successfully",
     *         @OA\JsonContent(
     *             @OA\Property(
     *                 property="message",
     *                 type="string",
     *                 example="Product added successfully"
     *                 )
     *             )
     *         ),
     *         @OA\Response(
     *             response=400,
     *             description="Bad request",
     *             @OA\JsonContent(
     *                 @OA\Property(
     *                     property="error",
     *                     type="string",
     *                     example="Invalid input"
     *                 )
     *             )
     *         )
     *     )
     * )
     */
    public function store(Request $request)
    {
        $productDTO = new ProductDTO(
            $request->input('name'),
            $request->input('description'),
            $request->input('price'),
            $request->input('stock'),
            $request->input('category_id'),
            $request->input('supplier_id')
        );

        $this->productService->addProduct($productDTO);

        return response()->json(['message' => 'Product added successfully']);
    }


    /**
     * Update the stock quantity of a product.
     *
     * @OA\Put(
     *     path="/api/products",
     *     operationId="updateStock",
     *     tags={"Products"},
     *     summary="Update product stock",
     *     description="Updates the stock quantity of a product",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(
     *                 property="productID",
     *                 type="integer",
     *                 description="The ID of the product",
     *                 example=1
     *             ),
     *             @OA\Property(
     *                 property="newQuantity",
     *                 type="integer",
     *                 description="The new quantity of the product",
     *                 example=100
     *             ),
     *             @OA\Property(
     *                 property="movementType",
     *                 type="string",
     *                 description="The type of stock movement",
     *                 example="entry or exit"
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Stock updated successfully",
     *         @OA\JsonContent(
     *             @OA\Property(
     *                 property="message",
     *                 type="string",
     *                 example="Stock updated successfully"
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Bad request",
     *         @OA\JsonContent(
     *             @OA\Property(
     *                 property="error",
     *                 type="string",
     *                 example="Invalid input"
     *             )
     *         )
     *     )
     * )
     */
    public function updateStock(Request $request)
    {
        $updateStockDTO = new UpdateStockDTO(
            $request->input('productID'),
            $request->input('newQuantity'),
            $request->input('movementType')
        );

        $this->productService->updateStock($updateStockDTO);

        return response()->json(['message' => 'Stock updated successfully']);
    }
}
