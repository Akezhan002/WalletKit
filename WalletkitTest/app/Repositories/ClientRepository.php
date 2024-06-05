<?php


namespace App\Repositories;



use App\Models\Client;

class ClientRepository extends BaseRepository
{
    protected $mainClass = Client::class;

    public function getClientByPhoneNumber($phoneNumber)
    {
        return Client::query()
            ->where('phone_number', '=', $phoneNumber)
            ->first();
    }

    public function create($client)
    {;
        $client->save();
    }
    public function read($id)
    {
        return Client::query()
            ->where('id', '=', $id)
            ->first();
    }

    public function update($client, array $data)
    {
        $client->update($data);
        return $client;
    }

    public function delete($id)
    {
        return Client::where('id', $id)->delete();
    }

    public function getAllClients()
    {
        return Client::all();
    }

    public function findOneByName($name)
    {
        return Client::query()
            ->where('full_name', '=', $name)
            ->first();
    }

    public function findOneById($id)
    {
        return Client::query()
            ->where('id', '=', $id)
            ->first();
    }

}
