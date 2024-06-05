<?php

namespace App\Services\Post\DTO;




class ClientDTO
{
    /**
     * @var mixed|null
     */

    public function setInfo($client)
    {
        $this->phone_number = $client['phone_number'] ?? null;
        $this->full_name = $client['full_name']?? null;
        $this->accumulated_points = $client['accumulated_points'] ?? null;
    }

    public function getInfo(): array
    {
        return
            [
                'phone_number' => $this->getNumber(),
                'full_name' => $this->getFullName(),
                'accumulated_points' => $this->getPoints(),
            ];
    }

    public function getNumber(): string
    {
        return $this->phone_number;
    }
    public function getFullName(): string
    {
        return $this->full_name;
    }
    public function getPoints(): string
    {
        return $this->accumulated_points;
    }

}
