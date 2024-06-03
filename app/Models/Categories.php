<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *     schema="Category",
 *     type="object",
 *     title="Category",
 *     description="Category model",
 *     required={"name", "description"},
 *     @OA\Property(
 *         property="id",
 *         type="integer",
 *         format="int64",
 *         description="ID of the category"
 *     ),
 *     @OA\Property(
 *         property="name",
 *         type="string",
 *         description="Name of the category"
 *     ),
 *     @OA\Property(
 *         property="description",
 *         type="string",
 *         description="Description of the category"
 *     )
 * )
 */
class Categories extends Model
{
    use HasFactory;

    protected $table = 'Categories';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'name',
        'description',
    ];
}
