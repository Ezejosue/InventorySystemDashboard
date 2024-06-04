<?php

namespace App\Services;

use App\DTOs\ClientDTO;
use App\Repositories\Interfaces\ClientRepositoryInterface;

class ClientService
{
    protected $clientRepository;

    public function __construct(ClientRepositoryInterface $clientRepository)
    {
        $this->clientRepository = $clientRepository;
    }

    public function addClient(ClientDTO $clientDTO)
    {
        return $this->clientRepository->addClient($clientDTO);
    }

    public function getClientByUsername(string $username)
    {
        return $this->clientRepository->getClientByUsername($username);
    }

    public function getAllClients()
    {
        return $this->clientRepository->getAllClients();
    }

    public function updateClient(int $id, ClientDTO $clientDTO)
    {
        return $this->clientRepository->updateClient($id, $clientDTO);
    }
}
