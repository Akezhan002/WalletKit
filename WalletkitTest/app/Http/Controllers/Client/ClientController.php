<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Services\Client\ClientService;

class ClientController extends Controller
{
    public function getClientByPhoneNumber($phoneNumber)
    {
        $client = new ClientService();

        return $client->getClientByPhoneNumber($phoneNumber);
    }

    public function getAllClients()
    {
        $client = new ClientService();

        return $client->getAllClients();
    }
}
