<?php

namespace App\Repositories\Interfaces;

use App\DTOs\LoginDTO;
use App\DTOs\RegisterDTO;
use App\DTOs\UserDTO;

interface UserRepositoryInterface
{
    public function authenticate(LoginDTO $loginDTO);
    public function register(RegisterDTO $registerDTO);
    public function create(UserDTO $userDTO);
    public function getAllUsers();
    public function getUserByEmail($userEmail);
    public function update($id, UserDTO $userDTO);
    public function delete($id);
}
