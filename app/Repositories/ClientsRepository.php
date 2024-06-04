<?php

namespace App\Repositories;

use App\Models\Client;
use App\Repositories\Interfaces\ClientsRepositoryInterface;

class ClientsRepository implements ClientsRepositoryInterface
{
    public function all()
    {
        return Client::all();
    }

    public function find($id)
    {
        return Client::find($id);
    }

    public function create(array $data)
    {
        return Client::create($data);
    }

    public function update(Client $client, array $data)
    {
        return $client->update($data);
    }

    public function delete(Client $client)
    {
        return $client->delete();
    }
}
