<?php

namespace App\Services;

use App\Contracts\Interfaces\SchoolPointInterface;
use App\Http\Requests\StoreSchoolPointRequest;

class SchoolPointService
{
    private SchoolPointInterface $schoolPoint;

    public function __construct(SchoolPointInterface $schoolPoint)
    {
        $this->schoolPoint = $schoolPoint;
    }

    public function store(StoreSchoolPointRequest $request): void
    {
        $this->schoolPoint->deleteAll();
        $data = $request->validated();
        foreach ($data as $group) {
            foreach ($group as $value) {
                $this->schoolPoint->store([
                    'point' => $value['point'],
                    'description' => $value['description'],
                ]);
            }
        }
    }
}
