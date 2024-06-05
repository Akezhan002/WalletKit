<?php

namespace App\Services\Client;



use App\Repositories\ClientRepository;
use Illuminate\Support\Facades\Log;
use Mockery\Exception;
use PhpParser\Error;

class ClientService
{
    protected $clientRepository;

    public function __construct() {
        $this->clientRepository = new ClientRepository();
    }

    public function getClientByPhoneNumber($phoneNumber)
    {
        try {
            $formattedNumber = preg_replace('/[^0-9]/', '', $phoneNumber);

            $client = $this->clientRepository->getClientByPhoneNumber($formattedNumber);

            if (!$client) {
                Log::error('Клиент с номером телефона ' . $phoneNumber . ' не найден');
                return null;
            }
            return $client;
        } catch (\Exception $e) {
            Log::error('Произошла ошибка при получении клиента по номеру телефона: ' . $e->getMessage());
            return null;
        }
    }

    public function getAllClients()
    {
        $clients = $this->clientRepository->getAllClients();

        return $clients;
    }

}





