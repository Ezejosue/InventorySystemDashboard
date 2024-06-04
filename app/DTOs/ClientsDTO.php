<?php

class ClientsDTO
{
    private $username;
    private $password;
    private $email;
    private $name;
    private $phone;

    public function __construct($username, $password, $email, $name, $phone)
    {
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
        $this->name = $name;
        $this->phone = $phone;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getPhone()
    {
        return $this->phone;
    }
}
