<?php

namespace App\Repositories\Interfaces;

use App\DTOs\ClientDTO;

interface ClientRepositoryInterface
{
    public function addClient(ClientDTO $clientDTO);
    public function getClientByUsername(string $username);
    public function getAllClients();
    public function updateClient(int $id, ClientDTO $clientDTO);

}
