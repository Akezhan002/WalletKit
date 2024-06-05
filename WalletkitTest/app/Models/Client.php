<?php

namespace App\Models;

use App\Services\Post\DTO\ClientDTO;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    public function setInfo(ClientDTO $clientDTO)
    {
        $this->phone_number = $clientDTO->getNumber() ?? null;
        $this->full_name = $clientDTO->getFullName() ?? null;
        $this->accumulated_points = $clientDTO->getPoints() ?? null;
    }
}
