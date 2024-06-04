<?php

namespace App\Repositories;

use App\Models\Client;
use App\DTOs\ClientDTO;
use App\Repositories\Interfaces\ClientRepositoryInterface;
use Illuminate\Support\Facades\Hash;

class ClientRepository implements ClientRepositoryInterface
{
    public function addClient(ClientDTO $clientDTO)
    {
        return Client::create([
            'username' => $clientDTO->username,
            'password' => Hash::make($clientDTO->password),
            'email' => $clientDTO->email,
            'name' => $clientDTO->name,
            'phone' => $clientDTO->phone,
        ]);
    }

    public function getClientByUsername(string $username)
    {
        return Client::where('username', 'like', '%' . $username . '%')->get();
    }

    public function getAllClients()
    {
        return Client::all();
    }

    public function updateClient(int $id, ClientDTO $clientDTO)
    {
        $client = Client::find($id);
        if ($client) {
            $client->username = $clientDTO->username;
            $client->password = Hash::make($clientDTO->password);
            $client->email = $clientDTO->email;
            $client->name = $clientDTO->name;
            $client->phone = $clientDTO->phone;
            $client->save();
        }

        return $client;
    }
}
