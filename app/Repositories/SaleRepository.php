<?php

namespace App\Repositories;

use App\Models\Sale;
use App\DTOs\SaleDTO;
use App\Repositories\Interfaces\SaleRepositoryInterface;
use Illuminate\Support\Facades\DB;

class SaleRepository implements SaleRepositoryInterface
{
    public function registerSale(SaleDTO $saleDTO)
    {
        DB::statement('CALL RegisterSale(?, ?, ?)', [
            $saleDTO->client_id,
            $saleDTO->product_id,
            $saleDTO->quantity
        ]);
    }

    public function getAllSales()
    {
        $sales = Sale::with(['client', 'product.category', 'product.supplier'])->get();

        return $sales->map(function ($sale) {
            return [
                'id' => $sale->id,
                'client_id' => $sale->client_id,
                'product_id' => $sale->product_id,
                'quantity' => $sale->quantity,
                'total_price' => $sale->total_price,
                'date' => $sale->date,
                'client' => [
                    'id' => $sale->client->id,
                    'username' => $sale->client->username,
                    'email' => $sale->client->email,
                    'name' => $sale->client->name,
                    'phone' => $sale->client->phone,
                ],
                'product' => [
                    'id' => $sale->product->id,
                    'name' => $sale->product->name,
                    'description' => $sale->product->description,
                    'price' => $sale->product->price,
                    'stock' => $sale->product->stock,
                    'category_name' => $sale->product->category->name,
                    'supplier_name' => $sale->product->supplier->name,
                ],
            ];
        });
    }

    public function getSaleById(int $id)
    {
        $sale = Sale::with(['client', 'product.category', 'product.supplier'])->find($id);

        return [
            'id' => $sale->id,
            'client_id' => $sale->client_id,
            'product_id' => $sale->product_id,
            'quantity' => $sale->quantity,
            'total_price' => $sale->total_price,
            'date' => $sale->date,
            'client' => [
                'id' => $sale->client->id,
                'username' => $sale->client->username,
                'email' => $sale->client->email,
                'name' => $sale->client->name,
                'phone' => $sale->client->phone,
            ],
            'product' => [
                'id' => $sale->product->id,
                'name' => $sale->product->name,
                'description' => $sale->product->description,
                'price' => $sale->product->price,
                'stock' => $sale->product->stock,
                'category_name' => $sale->product->category->name,
                'supplier_name' => $sale->product->supplier->name,
            ],
        ];
    }

    public function updateSale(int $id, SaleDTO $saleDTO)
    {
        $sale = Sale::find($id);
        if ($sale) {
            $sale->client_id = $saleDTO->client_id;
            $sale->product_id = $saleDTO->product_id;
            $sale->quantity = $saleDTO->quantity;
            $sale->save();
        }

        return $sale;
    }

    public function deleteSale(int $id)
    {
        Sale::destroy($id);
    }
}
