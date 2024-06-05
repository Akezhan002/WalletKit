<?php


namespace App\Repositories;



use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository
{
    /** @var Model */
    protected $mainClass;

    public function findOneById($id)
    {
        return $this->mainClass::query()->find($id);
    }

    public function findOneByFiled(string $field, $value)
    {
        return $this->mainClass::query()
            ->where($field, $value)
            ->first();
    }

    public function findAllByFiled(string $field, $value, int $limit = -1)
    {
        $result = $this->mainClass::query()
            ->where($field, $value);

        if ($limit != -1) {
            $result = $result->limit($limit);
        }

        return $result->get();
    }

    public function findAllPluckByFiled(string $pluckFiled, array $whereOptions = [], int $limit = -1): array
    {
        $result = $this->mainClass::query();

        foreach ($whereOptions as $option) {
            $result->where($option[0], $option[1], $option[2]);
        }

        if ($limit != -1) {
            $result->limit($limit);
        }

        return $result->pluck($pluckFiled)->all();
    }

    public function findMinByFiled(string $field, array $whereOptions = [])
    {
        $result = $this->mainClass::query();

        foreach ($whereOptions as $option) {
            $result->where($option[0], $option[1], $option[2]);
        }

        return $result->min($field);
    }

    public function findMaxByFiled(string $field, array $whereOptions = [])
    {
        $result = $this->mainClass::query();

        foreach ($whereOptions as $option) {
            $result->where($option[0], $option[1], $option[2]);
        }

        return $result->max($field);
    }
}
