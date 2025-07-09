<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\StudentRepairInterface;
use App\Models\StudentRepair;
use Carbon\Carbon;
use Illuminate\Http\Request;

class StudentRepairRepository extends BaseRepository implements StudentRepairInterface
{
    public function __construct(StudentRepair $studentRepair)
    {
        $this->model = $studentRepair;
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

    public function whereStudent(mixed $id, Request $request): mixed
    {
        return $this->model->query()
            ->whereRelation('classroomStudent', 'student_id', $id)
            ->when($request->search, fn($query) => $query->whereRelation('classroomStudent.student.user', 'name', 'like', '%' . $request->search . '%'))
            ->when($request->point, function($query) use ($request) {
                $order = $request->point == 'highest' ? 'desc' : 'asc';
                $query->orderBy('point', $order);
            })
            ->when($request->order, function($query) use ($request) {
                $request->order == 'latest' ? $query->latest() : $query->oldest();
            })
            ->get();
    }

    public function groubByCreated(mixed $id): mixed
    {
        return $this->model->query()
            ->whereRelation('classroomStudent', 'student_id', $id)
            ->get()
            ->groupBy('created_at');
    }

    public function search(Request $request): mixed
    {
        return $this->model->query()
            ->when($request->search, fn($query) => $query->whereRelation('classroomStudent.student.user', 'name', 'like', '%' . $request->search . '%'))
            ->when($request->orders, function($query) use ($request) {
                $request->orders == 'latest' ? $query->latest() : $query->oldest();
            })
            ->when($request->filters, function($query) use ($request) {
                $request->filters == 'finish' ? $query->where('is_approved', true) : $query->where('is_approved', false);
            })
            ->get();
    }

    public function count(): mixed
    {
        $startOfWeek = now()->startOfWeek();
        $endOfWeek = now()->endOfWeek();

        return $this->model->query()
            ->whereBetween('created_at', [$startOfWeek, $endOfWeek])
            ->count();
    }

    public function repairChart(mixed $year, mixed $month): mixed
    {
        return $this->model->query()
            ->whereYear('created_at', $year)
            ->whereMonth('created_at', $month)
            ->count();
    }

    public function countByStudent(): mixed
    {
        return $this->model->query()
            ->get()
            ->groupBy('classroom_student_id')
            ->count();
    }

    public function count_approved(mixed $query): mixed
    {
        $result =  $this->model->query();
        $query == '0' ? $result->where('is_approved', '0')->where('end_date', '>=', Carbon::today()->format('Y-m-d')) : ( $query == '1' ? $result->where('is_approved', '1') : $result->where('is_approved', '0')->where('end_date', '<', Carbon::now()->format('Y-m-d')));
        return $result->count();
    }

    public function groupByClassroomStudentAndCreated(): mixed
    {
        return $this->model->query()
            ->get()
            ->groupBy(function ($item) {
                return Carbon::parse($item->created_at)->format('Y-m-d');
            })
            ->map(function ($group) {
                return $group->groupBy('classroom_student_id');
            });
    }

    public function count_repair(mixed $id): mixed
    {
        return $this->model->query()
            ->whereRelation('classroomStudent', 'student_id', $id)
            ->where('is_approved', '1')
            ->count();
    }
}
