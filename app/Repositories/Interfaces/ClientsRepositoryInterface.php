<?php

namespace App\Repositories\Interfaces;

use App\Models\Client;

interface ClientsRepositoryInterface
{
    public function all();

    public function find($id);

    public function create(array $data);

    public function update(Client $client, array $data);

    public function delete(Client $client);
}
