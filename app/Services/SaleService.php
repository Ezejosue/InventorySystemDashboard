<?php

namespace App\Services;

use App\DTOs\SaleDTO;
use App\Repositories\Interfaces\SaleRepositoryInterface;

class SaleService
{
    protected $saleRepository;

    public function __construct(SaleRepositoryInterface $saleRepository)
    {
        $this->saleRepository = $saleRepository;
    }

    public function registerSale(SaleDTO $saleDTO)
    {
        return $this->saleRepository->registerSale($saleDTO);
    }

    public function getAllSales()
    {
        return $this->saleRepository->getAllSales();
    }

    public function getSaleById(int $id)
    {
        return $this->saleRepository->getSaleById($id);
    }

    public function updateSale(int $id, SaleDTO $saleDTO)
    {
        return $this->saleRepository->updateSale($id, $saleDTO);
    }

    public function deleteSale(int $id)
    {
        return $this->saleRepository->deleteSale($id);
    }
}
