<?php

namespace App\Services;

use App\Http\Requests\StoreSchoolYearRequest;
use App\Http\Requests\UpdateSchoolYearRequest;
use App\Models\SchoolYear;

class SchoolYearService
{
    public function store(StoreSchoolYearRequest $request): array|bool
    {
        $data = $request->validated();
        return $data;
    }

    public function update(SchoolYear $schoolYear, UpdateSchoolYearRequest $request): array|bool
    {
        $data = $request->validated();
        return $data;
    }

    public function delete(SchoolYear $schoolYear)
    {
        //
    }
}
