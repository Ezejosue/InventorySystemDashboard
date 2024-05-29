<?php

namespace App\Services;

use App\Repositories\Interfaces\UserRepositoryInterface;
use App\DTOs\LoginDTO;
use App\DTOs\RegisterDTO;
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
}
