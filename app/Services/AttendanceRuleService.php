<?php

namespace App\Services;

use App\Http\Requests\StoreAttendanceRuleRequest;

class AttendanceRuleService
{
    public function storeOrUpdate(StoreAttendanceRuleRequest $request, string $day, string $role): array|bool
    {
        $data = $request->validated();
        $data['day'] = $day;
        $data['role'] = $role;
        $data['is_holiday'] = isset($data['is_holiday']) ? 1 : 0;

        return $data;
    }
}
