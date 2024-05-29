<?php

namespace App\Services;

use App\Repositories\Interfaces\CategoriesRepositoryInterface;
use App\DTOs\CategoriesDTO;

class CategoriesService
{
    protected $categoriesRepository;

    public function __construct(CategoriesRepositoryInterface $categoriesRepository)
    {
        $this->categoriesRepository = $categoriesRepository;
    }

    public function createCategory(CategoriesDTO $categoriesDTO)
    {
        return $this->categoriesRepository->create($categoriesDTO);
    }

    public function getAllCategories()
    {
        return $this->categoriesRepository->getAllCategories();
    }

    public function getCategoryById($id)
    {
        return $this->categoriesRepository->getByCategoryId($id);
    }

    public function updateCategory($id, CategoriesDTO $categoriesDTO)
    {
        return $this->categoriesRepository->update($id, $categoriesDTO);
    }

    public function deleteCategory($id)
    {
        return $this->categoriesRepository->delete($id);
    }

}
