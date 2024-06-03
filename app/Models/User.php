<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Hash;

/**
 * @OA\Schema(
 *     schema="User",
 *     type="object",
 *     title="User",
 *     description="User model",
 *     required={"username", "email", "password"},
 *     @OA\Property(
 *         property="username",
 *         type="string",
 *         description="Its the name of the user"
 *     ),
 *     @OA\Property(
 *         property="email",
 *         type="string",
 *         description="Email of the user"
 *     ),
 *     @OA\Property(
 *         property="password",
 *         type="string",
 *         description="Password of the user"
 *     ),
 * )
 */
class User extends Authenticatable
{
    use Notifiable, HasApiTokens;

    protected $table = 'users';
    protected $primaryKey = 'id';
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
}
