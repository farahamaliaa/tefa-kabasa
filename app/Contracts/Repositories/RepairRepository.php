<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\RepairInterface;
use App\Models\Repair;

class RepairRepository extends BaseRepository implements RepairInterface
{
    public function __construct(Repair $repair)
    {
        $this->model = $repair;
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
}