<?php

namespace App\Services;

use App\Http\Requests\StoreExtracurricularRequest;
use App\Http\Requests\UpdateExtracurricularRequest;
use App\Models\Extracurricular;

class ExtracurricularService
{
    public function store(StoreExtracurricularRequest $request): array|bool
    {
        $data = $request->validated();
        $data['school_id'] = auth()->user()->school->id;
        return $data;
    }

    public function update(Extracurricular $extracurricular, UpdateExtracurricularRequest $request): array|bool
    {
        $data = $request->validated();
        $data['school_id'] = auth()->user()->school->id;
        return $data;
    }

    public function delete(Extracurricular $extracurricular)
    {
        //
    }
}
