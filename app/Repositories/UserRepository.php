<?php

namespace App\Repositories;

use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Models\User;
use App\DTOs\LoginDTO;
use App\DTOs\RegisterDTO;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UserRepository implements UserRepositoryInterface
{
    public function authenticate(LoginDTO $loginDTO)
    {
        $user = User::where('email', $loginDTO->email)->first();

        if ($user) {
            $passwordMatch = Hash::check($loginDTO->password, $user->password);
            if ($passwordMatch) {
                return $user;
            }
        }

        return null;
    }

    public function register(RegisterDTO $registerDTO)
    {
        $user = User::create([
            'name' => $registerDTO->name,
            'email' => $registerDTO->email,
            'password' => Hash::make($registerDTO->password),
        ]);

        return $user;
    }
}
