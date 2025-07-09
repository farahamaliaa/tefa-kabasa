<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\ExtracurricularStudentInterface;
use App\Models\ExtracurricularStudent;
use Illuminate\Http\Request;

class ExtracurricularStudentRepository extends BaseRepository implements ExtracurricularStudentInterface
{
    public function __construct(ExtracurricularStudent $extracurricularStudent)
    {
        $this->model = $extracurricularStudent;
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

    public function paginate() : mixed
    {
        return $this->model->query()->latest()->paginate(10);
    }

    public function where(mixed $data, Request $request): mixed
    {
        return $this->model->query()->where('extracurricular_id', $data)
        ->when($request->name, function ($query) use ($request) {
            $query->whereHas('student.user', function ($query) use ($request) {
                $query->where('name', 'LIKE', '%' . $request->name . '%');
            });
        })->paginate(10);
    }

    public function check(mixed $extracurricular_id, mixed $student_id): mixed
    {
        return $this->model->query()->where('extracurricular_id', $extracurricular_id)->where('student_id', $student_id)->exists();
    }
}
