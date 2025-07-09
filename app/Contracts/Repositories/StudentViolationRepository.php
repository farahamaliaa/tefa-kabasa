<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\StudentViolationInterface;
use App\Models\StudentViolation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentViolationRepository extends BaseRepository implements StudentViolationInterface
{
    public function __construct(StudentViolation $studentViolation)
    {
        $this->model = $studentViolation;
    }

    public function get(): mixed
    {
        return $this->model->query()->get();
    }

    public function search(Request $request): mixed
    {
        return $this->model->query()
            ->when($request->search, function ($query) use ($request) {
                $query->whereRelation('classroomStudent.student.user', 'name', 'like', '%' . $request->search . '%');
            })
            ->when($request->gender, function ($query) use ($request) {
                $query->whereRelation('classroomStudent.student', 'gender', $request->gender);
            })
            ->latest()
            ->paginate(10);
    }


    public function whereClassroom(mixed $id, Request $request): mixed
    {
        return $this->model->query()
            ->whereRelation('classroomStudent', 'classroom_id', $id)
            ->when(
                $request->search, fn($query) => $query->whereRelation('classroomStudent.student.user', 'name', 'like', '%' . $request->search . '%')
            )
            ->when($request->gender, fn($query) => $query->whereRelation('classroomStudent.student', 'gender', $request->gender)
            )
            ->when($request->points, function ($query) use ($request) {
                $order = $request->points == 'highest' ? 'desc' : 'asc';
                $query->whereHas('regulation',function($query) use ($order){
                    $query->orderBy('point', $order);
                });
            })
            ->paginate(10);
    }

    public function whereStudent(mixed $id, Request $request): mixed
    {
        return $this->model->query()
            ->whereRelation('classroomStudent', 'student_id', $id)
            ->when(
                $request->search,
                fn($query) =>
                $query->whereRelation('classroomStudent.student.user', 'name', 'like', '%' . $request->search . '%')
            )
            ->when($request->point_student, function ($query) use ($request) {
                $order = $request->point_student == 'highest' ? 'desc' : 'asc';
                $query->with(['regulation' => fn($q) => $q->orderBy('point', $order)]);
            })
            ->when($request->order, function ($query) use ($request) {
                $request->order == 'latest' ? $query->latest() : $query->oldest();
            })
            ->get();
    }

    public function groubByCreated(mixed $id): mixed
    {
        return $this->model->query()
            ->whereRelation('classroomStudent', 'student_id', $id)
            ->get()
            ->groupBy(function ($item) {
                return Carbon::parse($item->created_at)->format('Y-m-d');
            });
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

    public function countByStudent(): mixed
    {
        return $this->model->query()
            ->get()
            ->groupBy('classroom_student_id')
            ->count();
    }

    public function ViolationChart(mixed $year, mixed $month): mixed
    {
        return $this->model->query()
            ->whereYear('created_at', $year)
            ->whereMonth('created_at', $month)
            ->count();
    }

    public function count(mixed $query): mixed
    {
        $startOfWeek = now()->startOfWeek();
        $endOfWeek = now()->endOfWeek();

        $result = $this->model->query();
        $query == 'week' ? $result->whereBetween('created_at', [$startOfWeek, $endOfWeek]) : $result;

        return $result->count();
    }

    public function count_violation(mixed $id): mixed
    {
        return $this->model->query()
            ->whereRelation('classroomStudent', 'student_id', $id)
            ->get()
            ->groupBy('regulation_id')
            ->count();
    }

    public function countByClassroomStudent(): mixed
    {
        return $this->model->query()
            ->select('classroom_students.classroom_id', DB::raw('COUNT(student_violations.id) as total_violations'))
            ->join('classroom_students', 'student_violations.classroom_student_id', '=', 'classroom_students.id')
            ->with('classroomStudent.classroom')
            ->groupBy('classroom_students.classroom_id')
            ->orderBy('total_violations', 'desc')
            ->first();
    }
}
