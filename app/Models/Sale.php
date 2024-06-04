<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


/**
 * @OA\Schema(
 *     schema="Sale",
 *     type="object",
 *     title="Sale",
 *     description="Sale model",
 *     required={"client_id", "product_id", "quantity", "total_price", "date"},
 *     @OA\Property(
 *         property="id",
 *         type="integer",
 *         description="The unique identifier of the sale",
 *         example=1
 *     ),
 *     @OA\Property(
 *         property="client_id",
 *         type="integer",
 *         description="The ID of the client associated with the sale",
 *         example=1
 *     ),
 *     @OA\Property(
 *         property="product_id",
 *         type="integer",
 *         description="The ID of the product associated with the sale",
 *         example=2
 *     ),
 *     @OA\Property(
 *         property="quantity",
 *         type="integer",
 *         description="The quantity of the product sold",
 *         example=3
 *     ),
 *     @OA\Property(
 *         property="total_price",
 *         type="number",
 *         format="float",
 *         description="The total price of the sale",
 *         example=99.99
 *     ),
 *     @OA\Property(
 *         property="date",
 *         type="string",
 *         format="date-time",
 *         description="The date and time of the sale",
 *         example="2024-06-04T12:34:56Z"
 *     )
 * )
 */
class Sale extends Model
{
    use HasFactory;
    protected $table = 'Sales';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = ['client_id', 'product_id', 'quantity', 'total_price', 'date'];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function product()
    {
        return $this->belongsTo(Products::class);
    }
}
