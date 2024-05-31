<?php

namespace App\Repositories;

use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Models\User;
use App\DTOs\LoginDTO;
use App\DTOs\RegisterDTO;
use App\DTOs\UserDTO;
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

    public function create(UserDTO $userDTO)
    {
        $user = User::create([
            'name' => $userDTO->name,
            'email' => $userDTO->email,
            'password' => Hash::make($userDTO->password),
        ]);

        return $user;
    }

    public function getAllUsers()
    {
        return User::all();
    }

    public function getUserByEmail($userEmail)
    {
        return User::where('email', 'like', '%' . $userEmail . '%')->get();
    }

    public function update($id, UserDTO $userDTO)
    {
        $user = User::find($id);
        if ($user) {
            $user->name = $userDTO->name;
            $user->email = $userDTO->email;
            if (!empty($userDTO->password)) {
                $user->password = Hash::make($userDTO->password);
            }
            $user->save();
            return $user;
        }
        return null;
    }


    public function delete($id)
    {
        $user = User::find($id);
        if ($user) {
            $user->delete();
            return true;
        }
        return false;
    }
}
