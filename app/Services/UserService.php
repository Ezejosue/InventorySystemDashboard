<?php

namespace App\Services;

use App\Repositories\Interfaces\UserRepositoryInterface;
use App\DTOs\LoginDTO;
use App\DTOs\RegisterDTO;
use App\DTOs\UserDTO;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class UserService
{
    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function login(LoginDTO $loginDTO)
    {
        $user = $this->userRepository->authenticate($loginDTO);

        if ($user) {
            $token = $user->createToken('authToken')->plainTextToken;
            return ['user' => $user, 'token' => $token];
        }

        return null;
    }

    public function register(RegisterDTO $registerDTO)
    {
        $user = $this->userRepository->register($registerDTO);

        Log::info('User registration result:', ['user' => $user]);

        $token = $user->createToken('authToken')->plainTextToken;

        return ['user' => $user, 'token' => $token];
    }

    public function createUser(UserDTO $userDTO)
    {
        $user = $this->userRepository->create($userDTO);

        Log::info('User created successfully:', ['user' => $user]);

        return $user;
    }

    public function getAllUsers()
    {
        return $this->userRepository->getAllUsers();
    }

    public function getUserByEmail($email)
    {
        return $this->userRepository->getUserByEmail($email);
    }

    public function updateUser($id, UserDTO $userDTO)
    {
        $user = $this->userRepository->update($id, $userDTO);

        if ($user) {
            Log::info('User updated successfully:', ['user' => $user]);
        } else {
            Log::warning('User not found for update:', ['id' => $id]);
        }

        return $user;
    }

    public function deleteUser($id)
    {
        $deleted = $this->userRepository->delete($id);

        if ($deleted) {
            Log::info('User deleted successfully:', ['id' => $id]);
        } else {
            Log::warning('User not found for deletion:', ['id' => $id]);
        }

        return $deleted;
    }
}
