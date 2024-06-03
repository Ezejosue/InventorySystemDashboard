<?php

namespace App\Repositories;

use App\Repositories\Interfaces\CategoriesRepositoryInterface;
use App\Models\Categories;
use App\DTOs\CategoriesDTO;

class CategoriesRepository implements CategoriesRepositoryInterface
{
    public function create(CategoriesDTO $categoriesDTO)
    {
        return Categories::create([
            'name' => $categoriesDTO->name,
            'description' => $categoriesDTO->description,
        ]);
    }

    public function getAllCategories()
    {
        return Categories::all();
    }

    public function getByCategoryId($categoryId)
    {
        return Categories::find($categoryId);
    }

    public function update($id, CategoriesDTO $categoriesDTO)
    {
        $category = Categories::find($id);
        return $category->update([
            'name' => $categoriesDTO->name,
            'description' => $categoriesDTO->description,
        ]);
    }

    public function delete($id)
    {
        $category = Categories::find($id);
        return $category->delete();
    }
}
