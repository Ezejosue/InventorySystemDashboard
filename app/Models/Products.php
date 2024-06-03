<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @OA\Schema(
 *     schema="Product",
 *     type="object",
 *     title="Product",
 *     description="Product model",
 *     required={"name", "price", "stock", "category_id", "supplier_id"},
 *     @OA\Property(
 *         property="name",
 *         type="string",
 *         description="The name of the product",
 *         example="Sample Product"
 *     ),
 *     @OA\Property(
 *         property="description",
 *         type="string",
 *         description="The description of the product",
 *         example="This is a sample product"
 *     ),
 *     @OA\Property(
 *         property="price",
 *         type="number",
 *         format="float",
 *         description="The price of the product",
 *         example=99.99
 *     ),
 *     @OA\Property(
 *         property="stock",
 *         type="integer",
 *         description="The stock quantity of the product",
 *         example=50
 *     ),
 *     @OA\Property(
 *         property="category_id",
 *         type="integer",
 *         description="The category ID of the product",
 *         example=2
 *     ),
 *     @OA\Property(
 *         property="supplier_id",
 *         type="integer",
 *         description="The supplier ID of the product",
 *         example=3
 *     ),
 * )
 */
class Products extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'id';
    protected $table = 'Products';
    protected $fillable = ['name', 'description', 'price', 'stock', 'category_id', 'supplier_id'];

    public function category()
    {
        return $this->belongsTo(Categories::class);
    }

    public function supplier()
    {
        return $this->belongsTo(Suppliers::class);
    }
}
