<?php

namespace App\Http\Controllers;

use App\DTOs\SaleDTO;
use App\Services\SaleService;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    protected $saleService;

    public function __construct(SaleService $saleService)
    {
        $this->saleService = $saleService;
    }

    /**
     * @OA\Post(
     *     path="/api/sales",
     *     operationId="registerSale",
     *     tags={"Sales"},
     *     summary="Register a new sale",
     *     description="Registers a new sale in the database",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"client_id", "product_id", "quantity"},
     *             @OA\Property(
     *                 property="client_id",
     *                 type="integer",
     *                 description="The ID of the client making the purchase",
     *                 example=1
     *             ),
     *             @OA\Property(
     *                 property="product_id",
     *                 type="integer",
     *                 description="The ID of the product being purchased",
     *                 example=2
     *             ),
     *             @OA\Property(
     *                 property="quantity",
     *                 type="integer",
     *                 description="The quantity of the product being purchased",
     *                 example=3
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Sale registered successfully",
     *         @OA\JsonContent(
     *             @OA\Property(
     *                 property="message",
     *                 type="string",
     *                 example="Sale registered successfully"
     *             )
     *         )
     *     )
     * )
     */
    public function registerSale(Request $request)
    {
        $saleDTO = new SaleDTO(
            $request->input('client_id'),
            $request->input('product_id'),
            $request->input('quantity')
        );

        $this->saleService->registerSale($saleDTO);

        return response()->json(['message' => 'Sale registered successfully']);
    }

    /**
     * @OA\Get(
     *     path="/api/sales",
     *     operationId="getAllSales",
     *     tags={"Sales"},
     *     summary="Get all sales",
     *     description="Returns a list of all sales",
     *     @OA\Response(
     *         response=200,
     *         description="A list of sales",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Sale")
     *         )
     *     )
     * )
     */
    public function getAllSales()
    {
        $sales = $this->saleService->getAllSales();
        return response()->json($sales);
    }

    /**
     * @OA\Get(
     *     path="/api/sales/{id}",
     *     operationId="getSaleById",
     *     tags={"Sales"},
     *     summary="Get a sale by ID",
     *     description="Returns a single sale by ID",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(
     *             type="integer"
     *         ),
     *         description="The ID of the sale"
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Sale found",
     *         @OA\JsonContent(ref="#/components/schemas/Sale")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Sale not found",
     *         @OA\JsonContent(
     *             @OA\Property(
     *                 property="message",
     *                 type="string",
     *                 example="Sale not found"
     *             )
     *         )
     *     )
     * )
     */
    public function getSaleById($id)
    {
        $sale = $this->saleService->getSaleById($id);
        return response()->json($sale);
    }

    /**
     * @OA\Put(
     *     path="/api/sales/{id}",
     *     operationId="updateSale",
     *     tags={"Sales"},
     *     summary="Update a sale",
     *     description="Updates an existing sale in the database",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(
     *             type="integer"
     *         ),
     *         description="The ID of the sale"
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"client_id", "product_id", "quantity"},
     *             @OA\Property(
     *                 property="client_id",
     *                 type="integer",
     *                 description="The ID of the client making the purchase",
     *                 example=1
     *             ),
     *             @OA\Property(
     *                 property="product_id",
     *                 type="integer",
     *                 description="The ID of the product being purchased",
     *                 example=2
     *             ),
     *             @OA\Property(
     *                 property="quantity",
     *                 type="integer",
     *                 description="The quantity of the product being purchased",
     *                 example=3
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Sale updated successfully",
     *         @OA\JsonContent(
     *             @OA\Property(
     *                 property="message",
     *                 type="string",
     *                 example="Sale updated successfully"
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Sale not found",
     *         @OA\JsonContent(
     *             @OA\Property(
     *                 property="message",
     *                 type="string",
     *                 example="Sale not found"
     *             )
     *         )
     *     )
     * )
     */
    public function updateSale(Request $request, $id)
    {
        $saleDTO = new SaleDTO(
            $request->input('client_id'),
            $request->input('product_id'),
            $request->input('quantity')
        );

        $sale = $this->saleService->updateSale($id, $saleDTO);

        if ($sale) {
            return response()->json(['message' => 'Sale updated successfully']);
        } else {
            return response()->json(['message' => 'Sale not found'], 404);
        }
    }

    /**
     * @OA\Delete(
     *     path="/api/sales/{id}",
     *     operationId="deleteSale",
     *     tags={"Sales"},
     *     summary="Delete a sale",
     *     description="Deletes a sale from the database",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(
     *             type="integer"
     *         ),
     *         description="The ID of the sale"
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Sale deleted successfully",
     *         @OA\JsonContent(
     *             @OA\Property(
     *                 property="message",
     *                 type="string",
     *                 example="Sale deleted successfully"
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Sale not found",
     *         @OA\JsonContent(
     *             @OA\Property(
     *                 property="message",
     *                 type="string",
     *                 example="Sale not found"
     *             )
     *         )
     *     )
     * )
     */
    public function deleteSale($id)
    {
        $this->saleService->deleteSale($id);
        return response()->json(['message' => 'Sale deleted successfully']);
    }
}
