<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientRequest;
use App\Services\ClientService;
use Illuminate\Http\JsonResponse;

class ClientController extends Controller
{
    protected $clientService;

    public function __construct(ClientService $clientService)
    {
        $this->clientService = $clientService;
    }

    public function index()
    {
        $clients = $this->clientService->getAllClients();
        return response()->json($clients, 200);
    }

    public function show($id)
    {
        $client = $this->clientService->getClientById($id);
        if (!$client) {
            return response()->json(['message' => 'Client not found'], 404);
        }
        return response()->json($client, 200);
    }

    public function store(ClientRequest $request)
    {
        $client = $this->clientService->createClient($request->validated());
        return response()->json($client, 201);
    }

    public function update(ClientRequest $request, $id)
    {
        $client = $this->clientService->updateClient($request->validated(), $id);
        if (!$client) {
            return response()->json(['error' => 'Client not found'], 404);
        }
        return response()->json($client, 200);
    }

    public function destroy($id)
    {
        $client = $this->clientService->deleteClient($id);
        if (!$client) {
            return response()->json(['message' => 'Client not found'], 404);
        }
        return response()->json(['message' => 'Client deleted successfully'], 200);
    }

    public function restore($id)
    {
        $client = $this->clientService->restoreClient($id);
        if (!$client) {
            return response()->json(['message' => 'Client not found'], 404);
        }
        return response()->json(['message' => 'Client restored successfully'], 200);
    }
}
