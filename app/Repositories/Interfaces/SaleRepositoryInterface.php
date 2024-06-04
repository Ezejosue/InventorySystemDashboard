<?php

namespace App\Repositories\Interfaces;

use App\DTOs\SaleDTO;

interface SaleRepositoryInterface
{
    public function registerSale(SaleDTO $saleDTO);
    public function getAllSales();
    public function getSaleById(int $id);
    public function updateSale(int $id, SaleDTO $saleDTO);
    public function deleteSale(int $id);
}
