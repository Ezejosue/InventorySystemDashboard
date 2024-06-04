<?php

namespace App\Services;

use App\Repositories\Interfaces\SuppliersRepositoryInterface;
use App\DTOs\SuppliersDTO;

class SupplierService
{
    protected $suppliersRepository;

    public function __construct(SuppliersRepositoryInterface $suppliersRepository)
    {
        $this->suppliersRepository = $suppliersRepository;
    }

    public function createSupplier(SuppliersDTO $suppliersDTO)
    {
        return $this->suppliersRepository->create($suppliersDTO);
    }

    public function getAllSuppliers()
    {
        return $this->suppliersRepository->getAllSuppliers();
    }

    public function getSupplierById($id)
    {
        return $this->suppliersRepository->getBySupplierId($id);
    }

    public function updateSupplier($id, SuppliersDTO $suppliersDTO)
    {
        return $this->suppliersRepository->update($id, $suppliersDTO);
    }

    public function deleteSupplier($id)
    {
        return $this->suppliersRepository->delete($id);
    }
}
