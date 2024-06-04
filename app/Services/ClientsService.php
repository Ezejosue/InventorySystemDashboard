<?php

namespace App\Services;

use App\Repositories\Interfaces\ClientsRepositoryInterface;
use App\Models\Client;

class ClientsService
{
    protected $clientsRepository;

    public function __construct(ClientsRepositoryInterface $clientsRepository)
    {
        $this->clientsRepository = $clientsRepository;
    }

    public function getAllClients()
    {
        return $this->clientsRepository->all();
    }

    public function getClientById($id)
    {
        return $this->clientsRepository->find($id);
    }

    public function createClient(array $data)
    {
        return $this->clientsRepository->create($data);
    }

    public function updateClient(Client $client, array $data)
    {
        return $this->clientsRepository->update($client, $data);
    }

    public function deleteClient(Client $client)
    {
        return $this->clientsRepository->delete($client);
    }
}
