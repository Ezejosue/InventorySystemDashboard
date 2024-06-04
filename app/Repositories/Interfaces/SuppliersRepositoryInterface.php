<?php

namespace App\Repositories\Interfaces;

use App\DTOs\SuppliersDTO;

interface SuppliersRepositoryInterface
{
    public function create(SuppliersDTO $suppliersDTO);
    public function getAllSuppliers();
    public function getBySupplierId($supplierId);
    public function update($id, SuppliersDTO $suppliersDTO);
    public function delete($id);
}
