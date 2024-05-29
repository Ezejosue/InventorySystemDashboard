<?php

namespace App\Repositories\Interfaces;

use App\DTOs\LoginDTO;
use App\DTOs\RegisterDTO;

interface UserRepositoryInterface
{
    public function authenticate(LoginDTO $loginDTO);
    public function register(RegisterDTO $registerDTO);
}
