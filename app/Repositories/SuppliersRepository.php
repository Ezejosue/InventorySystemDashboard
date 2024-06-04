<?php

namespace App\Repositories;

use App\Repositories\Interfaces\SuppliersRepositoryInterface;
use App\Models\Suppliers;
use App\DTOs\SuppliersDTO;

class SuppliersRepository implements SuppliersRepositoryInterface
{
    public function create(SuppliersDTO $suppliersDTO)
    {
        return Suppliers::create([
            'name' => $suppliersDTO->name,
            'phone' => $suppliersDTO->phone,
            'email' => $suppliersDTO->email,
        ]);
    }

    public function getAllSuppliers()
    {
        return Suppliers::all();
    }

    public function getBySupplierId($supplierId)
    {
        return Suppliers::find($supplierId);
    }

    public function update($id, SuppliersDTO $suppliersDTO)
    {
        $supplier = Suppliers::find($id);
        return $supplier->update([
            'name' => $suppliersDTO->name,
            'phone' => $suppliersDTO->phone,
            'email' => $suppliersDTO->email,
        ]);
    }

    public function delete($id)
    {
        $supplier = Suppliers::find($id);
        return $supplier->delete();
    }
}
