<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\AttendanceRuleInterface;
use App\Models\AttendanceRule;

class AttendanceRuleRepository extends BaseRepository implements AttendanceRuleInterface
{
    public function __construct(AttendanceRule $attendanceRule)
    {
        $this->model = $attendanceRule;
    }

    public function get(): mixed
    {
        return $this->model->query()->get();
    }

    public function store(array $data): mixed
    {
        // dd($data['day']);
        return $this->model->query()->updateOrCreate(['day' => $data['day'], 'role' => $data['role']], $data);
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

    public function paginate() : mixed
    {
        return $this->model->query()->latest()->paginate(10);
    }

    public function whereDayRole(mixed $day, mixed $role): mixed
    {
        return $this->model->query()->where('day', $day)->where('role', $role)->firstOrFail();
    }

    public function showByDay(string $day, string $roles): mixed
    {
        return $this->model->query()->where('day', $day)->get()->groupBy('role');
    }
}
