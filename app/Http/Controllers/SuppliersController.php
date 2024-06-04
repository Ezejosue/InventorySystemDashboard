<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\SupplierService;
use App\DTOs\SuppliersDTO;

class SuppliersController extends Controller
{
    protected $supplierService;

    public function __construct(SupplierService $supplierService)
    {
        $this->supplierService = $supplierService;
    }

    /**
     * @OA\Get(
     *     path="/api/suppliers",
     *     operationId="getAllSuppliers",
     *     tags={"Suppliers"},
     *     summary="Get all suppliers",
     *     description="Returns a list of all suppliers",
     *     @OA\Response(
     *         response=200,
     *         description="A list of suppliers",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Supplier")
     *         )
     *     )
     * )
     */
    public function index()
    {
        $suppliers = $this->supplierService->getAllSuppliers();
        return response()->json($suppliers);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * @OA\Post(
     *     path="/api/suppliers",
     *     operationId="storeSupplier",
     *     tags={"Suppliers"},
     *     summary="Create a new supplier",
     *     description="Stores a new supplier in the database",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/Supplier")
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Supplier created",
     *         @OA\JsonContent(ref="#/components/schemas/Supplier")
     *     )
     * )
     */
    public function store(Request $request)
    {
        $suppliersDTO = new SuppliersDTO(
            $request->input('name'),
            $request->input('phone'),
            $request->input('email')
        );

        $supplier = $this->supplierService->createSupplier($suppliersDTO);

        return response()->json($supplier, 201);
    }

    /**
     * @OA\Get(
     *     path="/api/suppliers/{id}",
     *     operationId="getSupplierById",
     *     tags={"Suppliers"},
     *     summary="Get a supplier by ID",
     *     description="Returns a single supplier by ID",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(
     *             type="string"
     *         ),
     *         description="The ID of the supplier"
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Supplier found",
     *         @OA\JsonContent(ref="#/components/schemas/Supplier")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Supplier not found",
     *         @OA\JsonContent(
     *             @OA\Property(
     *                 property="message",
     *                 type="string",
     *                 example="Supplier not found"
     *             )
     *         )
     *     )
     * )
     */
    public function show(string $id)
    {
        $supplier = $this->supplierService->getSupplierById($id);
        return response()->json($supplier);
    }

    /**
     * @OA\Put(
     *     path="/api/suppliers/{id}",
     *     operationId="updateSupplier",
     *     tags={"Suppliers"},
     *     summary="Update a supplier",
     *     description="Updates an existing supplier in the database",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(
     *             type="string"
     *         ),
     *         description="The ID of the supplier"
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/Supplier")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Supplier updated",
     *         @OA\JsonContent(ref="#/components/schemas/Supplier")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Supplier not found",
     *         @OA\JsonContent(
     *             @OA\Property(
     *                 property="message",
     *                 type="string",
     *                 example="Supplier not found"
     *             )
     *         )
     *     )
     * )
     */
    public function update(Request $request, string $id)
    {
        $suppliersDTO = new SuppliersDTO(
            $request->input('name'),
            $request->input('phone'),
            $request->input('email')
        );

        $supplier = $this->supplierService->updateSupplier($id, $suppliersDTO);

        return response()->json($supplier);
    }

    /**
     * @OA\Delete(
     *     path="/api/suppliers/{id}",
     *     operationId="deleteSupplier",
     *     tags={"Suppliers"},
     *     summary="Delete a supplier",
     *     description="Deletes a supplier from the database",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(
     *             type="string"
     *         ),
     *         description="The ID of the supplier"
     *     ),
     *     @OA\Response(
     *         response=204,
     *         description="Supplier deleted",
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Supplier not found",
     *         @OA\JsonContent(
     *             @OA\Property(
     *                 property="message",
     *                 type="string",
     *                 example="Supplier not found"
     *             )
     *         )
     *     )
     * )
     */
    public function destroy(string $id)
    {
        $this->supplierService->deleteSupplier($id);

        return response()->json(null, 204);
    }
}
