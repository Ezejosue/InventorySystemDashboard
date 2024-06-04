<?php

namespace App\DTOs;

class ClientDTO
{
    public $username;
    public $password;
    public $email;
    public $name;
    public $phone;

    public function __construct($username, $password, $email, $name = null, $phone = null)
    {
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
        $this->name = $name;
        $this->phone = $phone;
    }
}
