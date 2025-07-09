<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\ClassroomStudentInterface;
use App\Models\ClassroomStudent;
use Illuminate\Http\Request;

class ClassroomStudentRepository extends BaseRepository implements ClassroomStudentInterface
{
    public function __construct(ClassroomStudent $classroomStudent)
    {
        $this->model = $classroomStudent;
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
        return $this->model->query()->where('student_id', $id)->first();
    }

    public function update(mixed $id, array $data): mixed
    {
        return $this->model->query()->findOrFail($id)->update($data);
    }

    public function delete(mixed $id): mixed
    {
        return $this->model->query()->findOrFail($id)->delete();
    }

    public function paginate(): mixed
    {
        return $this->model->query()->latest()->paginate(10);
    }

    public function where(mixed $data, Request $request): mixed
    {
        return $this->model->query()
            ->where('classroom_id', $data)
            ->when($request->search, function ($query) use ($request) {
                $query->whereHas('student.user', function ($query) use ($request) {
                    $query->where('name', 'LIKE', '%' . $request->search . '%');
                });
            })
            ->paginate(10);
    }

    public function whereStudent(mixed $id): mixed
    {
        return $this->model->query()->where('student_id', $id)->first();
    }


    public function whereClassroom(mixed $id, Request $request): mixed
    {
        return $this->model->query()->where('classroom_id', $id)
            ->when($request->has('search'), function ($query) use ($request) {
                $query->whereHas('student.user', function ($query) use ($request) {
                    $query->where('name', 'LIKE', '%' . $request->search . '%');
                });
            })
            ->when($request->has('name'), function ($query) use ($request) {
                $query->whereHas('student.user', function ($query) use ($request) {
                    $query->where('name', 'LIKE', '%' . $request->name . '%');
                });
            })
            ->get();
    }

    public function activeStudents(): mixed
    {
        return $this->model->query()
            ->with('student.modelHasRfid')
            ->whereHas('classroom.schoolYear', function ($q) {
                $q->where('active', 1);
            })
            ->orderBy('updated_at', 'desc')
            ->get();
    }

    public function getAlumnus(Request $request): mixed
    {
        return $this->model->query()
            ->when($request->name, function ($query) use ($request) {
                $query->whereHas('student.user', function ($q) use ($request) {
                    $q->where('name', 'LIKE', '%' . $request->name . '%');
                });
            })
            ->when($request->gender, function ($query) use ($request) {
                $query->whereHas('student', function ($q) use ($request) {
                    $q->where('gender', $request->gender);
                });
            })
            ->whereRelation('classroom.levelClass', 'name', 'Alumni')
            ->when($request->class, function ($query) use ($request) {
                $query->whereHas('classroom', function ($query) use ($request) {
                    $query->where('name', 'LIKE', '%' . $request->class . '%');
                });
            })
            ->latest()
            ->get();
    }

    public function getByClassId(mixed $id): mixed
    {
        return $this->model->query()
            ->where('classroom_id', $id)
            ->with('student.user')
            ->get();
    }

    public function check(mixed $classroomId, mixed $studentId): mixed
    {
        return $this->model->query()->where('classroom_id', $classroomId)->where('student_id', $studentId)->first();
    }
}
