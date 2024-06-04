<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


/**
 * @OA\Schema(
 *     schema="Client",
 *     type="object",
 *     title="Client",
 *     description="Client model",
 *     required={"username", "password", "email", "name", "phone"},
 *     @OA\Property(
 *         property="id",
 *         type="integer",
 *         description="The unique identifier of the client",
 *         example=1
 *     ),
 *     @OA\Property(
 *         property="username",
 *         type="string",
 *         description="The username of the client",
 *         example="john_doe"
 *     ),
 *     @OA\Property(
 *         property="password",
 *         type="string",
 *         description="The password of the client",
 *         example="password123",
 *         writeOnly=true
 *     ),
 *     @OA\Property(
 *         property="email",
 *         type="string",
 *         description="The email address of the client",
 *         example="john_doe@example.com"
 *     ),
 *     @OA\Property(
 *         property="name",
 *         type="string",
 *         description="The full name of the client",
 *         example="John Doe"
 *     ),
 *     @OA\Property(
 *         property="phone",
 *         type="string",
 *         description="The phone number of the client",
 *         example="123-456-7890"
 *     )
 * )
 */
class Client extends Model
{
    use HasFactory;
    protected $table = 'Clients';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = ['username', 'password', 'email', 'name', 'phone'];
    protected $hidden = ['password'];
}
