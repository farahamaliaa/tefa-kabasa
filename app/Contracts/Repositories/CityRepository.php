<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\CityInterface;
use App\Models\City;

class CityRepository extends BaseRepository implements CityInterface
{
    public function __construct(City $city)
    {
        $this->model = $city;
    }

    public function get(): mixed
    {
        return $this->model->query()->get();
    }

    public function store(array $data): mixed
    {
        return $this->model->query()->create($data);
    }

    public function show(mixed $id): mixed
    {
        return $this->model->query()->findOrFail($id);
    }
    
    public function update(mixed $id, array $data): mixed
    {
        return $this->model->query()->findOrFail($id)->update($data);
    }

    public function delete(mixed $id): mixed
    {
        return $this->model->query()->findOrFail($id)->delete();
    }

    public function where(mixed $data): mixed
    {
        return $this->model->query()->where('province_id', $data)->get();
    }
}