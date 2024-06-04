<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ClientsService;
use App\Models\Client;

class ClientsController extends Controller
{
    protected $clientsService;

    public function __construct(ClientsService $clientsService)
    {
        $this->clientsService = $clientsService;
    }

    public function index()
    {
        $clients = $this->clientsService->getAllClients();
        return view('clients.index', compact('clients'));
    }

    public function show($id)
    {
        $client = $this->clientsService->getClientById($id);
        return view('clients.show', compact('client'));
    }

    public function create()
    {
        return view('clients.create');
    }

    public function store(Request $request)
    {
        $this->clientsService->createClient($request->all());
        return redirect()->route('clients.index');
    }

    public function edit($id)
    {
        $client = $this->clientsService->getClientById($id);
        return view('clients.edit', compact('client'));
    }

    public function update(Request $request, Client $client)
    {
        $this->clientsService->updateClient($client, $request->all());
        return redirect()->route('clients.index');
    }

    public function destroy(Client $client)
    {
        $this->clientsService->deleteClient($client);
        return redirect()->route('clients.index');
    }
}
