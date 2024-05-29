<?php

namespace App\Repositories\Interfaces;

use App\DTOs\CategoriesDTO;

interface CategoriesRepositoryInterface
{
    public function create(CategoriesDTO $CategoriesDTO);
    public function getAllCategories();
    public function getByCategoryId($categoryId);
    public function update($id, CategoriesDTO $CategoriesDTO);
    public function delete($id);
}
