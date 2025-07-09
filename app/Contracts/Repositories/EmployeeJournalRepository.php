<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\EmployeeJournalInterface;
use App\Models\EmployeeJournal;
use Illuminate\Http\Request;

class EmployeeJournalRepository extends BaseRepository implements EmployeeJournalInterface
{
    public function __construct(EmployeeJournal $EmployeeJournal)
    {
        $this->model = $EmployeeJournal;
    }

    public function get(): mixed
    {
        return $this->model->query()->get();
    }

    public function getEmployee(mixed $id, mixed $query): mixed
    {
        $result =  $this->model->query()->whereRelation('employee.user', 'id', $id);
        return $query == 'take' ? $result->latest()->take(3)->get() : ( $query == 'get' ? $result->latest()->get() : ( $query == 'take_2' ?  $result->latest()->take(2)->get() : $result->paginate(10)));
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
    public function getByStatus(string $status, Request $request): mixed
    {
        return $this->model->query()
            ->where('status', $status)
            ->when($request->name, function ($query) use ($request) {
                $query->whereRelation('employee.user', 'name', 'like', '%' . $request->name . '%');
            })
            ->latest()->paginate(10);
    }

    public function search(Request $request): mixed
    {
        return $this->model->query()
            ->when($request->name, function ($query) use ($request) {
                $query->whereRelation('employee.user', 'name', 'like', '%' . $request->name . '%');
            })
            ->latest()->paginate(10);
    }

    public function export(Request $request): mixed
    {
        $startDate = $request->filled('start') ? $request->start : now()->format('Y-m-d');
        $endDate = $request->filled('end') ? $request->end : now()->format('Y-m-d');

        return $this->model->query()
            ->when($startDate && $endDate, function ($query) use ($startDate, $endDate) {
                $query->where(function ($q) use ($startDate, $endDate) {
                    $q->whereBetween('created_at', [$startDate, $endDate])
                        ->orWhereDate('created_at', $startDate)
                        ->orWhereDate('created_at', $endDate);
                });
            })
            ->paginate(10);
    }

    public function whereDate(mixed $id, mixed $date): mixed
    {
        return $this->model->query()->where('employee_id', $id)->whereDate('created_at', $date)->first();
    }

}
