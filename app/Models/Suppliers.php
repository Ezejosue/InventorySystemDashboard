<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *     schema="Supplier",
 *     type="object",
 *     title="Supplier",
 *     description="Supplier model",
 *     required={"name", "phone", "email"},
 *     @OA\Property(
 *         property="id",
 *         type="integer",
 *         description="The unique identifier of the supplier",
 *         example=1
 *     ),
 *     @OA\Property(
 *         property="name",
 *         type="string",
 *         description="The name of the supplier",
 *         example="Supplier Name"
 *     ),
 *     @OA\Property(
 *         property="phone",
 *         type="string",
 *         description="The phone number of the supplier",
 *         example="123-456-7890"
 *     ),
 *     @OA\Property(
 *         property="email",
 *         type="string",
 *         description="The email of the supplier",
 *         example="supplier@example.com"
 *     )
 * )
 */
class Suppliers extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'id';
    protected $table = 'Suppliers';
    protected $fillable = ['name', 'phone', 'email'];
}
