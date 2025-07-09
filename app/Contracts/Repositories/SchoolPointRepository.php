<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\SchoolPointInterface;
use App\Models\SchoolPoint;

class SchoolPointRepository extends BaseRepository implements SchoolPointInterface
{
    public function __construct(SchoolPoint $SchoolPoint)
    {
        $this->model = $SchoolPoint;
    }

    public function get(): mixed
    {
        return $this->model->query()->get();
    }

    public function store(array $data): mixed
    {
        return $this->model->create($data);
    }

    public function deleteAll(): mixed
    {
        return $this->model->query()->get()->each(function ($item) {
            $item->delete();
        });
    }

    public function getMaxPoint(): mixed
    {
        return $this->model->orderBy('point', 'DESC')->pluck('point')->first();
    }
}