<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\MaxLateInterface;
use App\Models\MaxLate;

class MaxLateRepository extends BaseRepository implements MaxLateInterface
{
    public function __construct(MaxLate $maxLate)
    {
        $this->model = $maxLate;
    }

    public function get(): mixed
    {
        return $this->model->query()->first();
    }

    public function show(mixed $id): mixed
    {
        return $this->model->query()->findOrFail($id);
    }
    
    public function update(mixed $id, array $data): mixed
    {
        return $this->model->query()->findOrFail($id)->update($data);
    }
}