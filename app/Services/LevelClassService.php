<?php

namespace App\Services;

use App\Http\Requests\StoreLevelClassRequest;
use App\Http\Requests\UpdateLevelClassRequest;
use App\Models\LevelClass;

class LevelClassService
{
    public function store(StoreLevelClassRequest $request): array|bool
    {
        $data = $request->validated();
        return $data;
    }

    public function update(LevelClass $levelClass, UpdateLevelClassRequest $request): array|bool
    {
        $data = $request->validated();
        $data['school_id'] = auth()->user()->school->id;
        return $data;
    }
}
