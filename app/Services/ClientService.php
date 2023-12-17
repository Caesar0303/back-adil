<?php

namespace App\Services;

use App\Models\Client;

class ClientService
{
    public function getAllClients()
    {
        return Client::whereNull('deleted_at')->get();
    }

    public function getClientById($id)
    {
        return Client::find($id);
    }

    public function createClient($data)
    {
        return Client::create($data);
    }

    public function updateClient($data, $id)
    {
        $client = $this->getClientById($id);
        if ($client) {
            $client->update($data);
            return $client;
        }
        return null;
    }

    public function deleteClient($id)
    {
        $client = $this->getClientById($id);
        if ($client) {
            $client->delete();
            return $client;
        }
        return null;
    }

    public function restoreClient($id)
    {
        $client = Client::withTrashed()->find($id);
        if ($client) {
            $client->restore();
            return $client;
        }
        return null;
    }
}
