<?php

namespace App\Http\Controllers;

use App\DTOs\ClientDTO;
use App\Services\ClientService;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    protected $clientService;

    public function __construct(ClientService $clientService)
    {
        $this->clientService = $clientService;
    }

    /**
     * @OA\Post(
     *     path="/api/clients",
     *     operationId="storeClient",
     *     tags={"Clients"},
     *     summary="Create a new client",
     *     description="Stores a new client in the database",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/Client")
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Client added successfully",
     *         @OA\JsonContent(
     *             @OA\Property(
     *                 property="message",
     *                 type="string",
     *                 example="Client added successfully"
     *             )
     *         )
     *     )
     * )
     */
    public function store(Request $request)
    {
        $clientDTO = new ClientDTO(
            $request->input('username'),
            $request->input('password'),
            $request->input('email'),
            $request->input('name'),
            $request->input('phone')
        );

        $this->clientService->addClient($clientDTO);

        return response()->json(['message' => 'Client added successfully']);
    }

    /**
     * @OA\Get(
     *     path="/api/clients/{username}",
     *     operationId="getClientByUsername",
     *     tags={"Clients"},
     *     summary="Get a client by username",
     *     description="Returns a single client by username",
     *     @OA\Parameter(
     *         name="username",
     *         in="path",
     *         required=true,
     *         @OA\Schema(
     *             type="string"
     *         ),
     *         description="The username of the client"
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Client found",
     *         @OA\JsonContent(ref="#/components/schemas/Client")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Client not found",
     *         @OA\JsonContent(
     *             @OA\Property(
     *                 property="message",
     *                 type="string",
     *                 example="Client not found"
     *             )
     *         )
     *     )
     * )
     */
    public function getClientByUsername(Request $request, $username)
    {
        $client = $this->clientService->getClientByUsername($username);
        return response()->json($client);
    }


    /**
     * @OA\Get(
     *     path="/api/clients",
     *     operationId="getAllClients",
     *     tags={"Clients"},
     *     summary="Get all clients",
     *     description="Returns a list of all clients",
     *     @OA\Response(
     *         response=200,
     *         description="A list of clients",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Client")
     *         )
     *     )
     * )
     */
    public function getAllClients()
    {
        $clients = $this->clientService->getAllClients();
        return response()->json($clients);
    }


    /**
     * @OA\Put(
     *     path="/api/clients/{id}",
     *     operationId="updateClient",
     *     tags={"Clients"},
     *     summary="Update a client",
     *     description="Updates an existing client in the database",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(
     *             type="string"
     *         ),
     *         description="The ID of the client"
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/Client")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Client updated successfully",
     *         @OA\JsonContent(
     *             @OA\Property(
     *                 property="message",
     *                 type="string",
     *                 example="Client updated successfully"
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Client not found",
     *         @OA\JsonContent(
     *             @OA\Property(
     *                 property="message",
     *                 type="string",
     *                 example="Client not found"
     *             )
     *         )
     *     )
     * )
     */
    public function updateClient(Request $request, $id)
    {
        $clientDTO = new ClientDTO(
            $request->input('username'),
            $request->input('password'),
            $request->input('email'),
            $request->input('name'),
            $request->input('phone')
        );

        $client = $this->clientService->updateClient($id, $clientDTO);

        if ($client) {
            return response()->json(['message' => 'Client updated successfully']);
        } else {
            return response()->json(['message' => 'Client not found'], 404);
        }
    }
}
