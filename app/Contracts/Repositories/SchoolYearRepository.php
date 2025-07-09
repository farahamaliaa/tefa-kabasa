<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\SchoolYearInterface;
use App\Models\SchoolYear;
use Illuminate\Http\Request;

class SchoolYearRepository extends BaseRepository implements SchoolYearInterface
{
    public function __construct(SchoolYear $schoolYear)
    {
        $this->model = $schoolYear;
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

    public function where(mixed $data): mixed
    {
        return $this->model->query()->get();
    }

    public function whereSchoolYear(mixed $data): mixed
    {
        return $this->model->query()->where('school_year', $data)->first();
    }

    public function search(Request $request): mixed
    {
        return $this->model->query()
            ->when($request->name, function ($query) use ($request) {
                $query->where('school_year', 'LIKE' , '%' . $request->name . '%');
            })
            ->paginate(10);
    }

    public function active(): mixed
    {
        return $this->model->query()->where('active', true)->first();
    }

    public function whereActive(): mixed
    {
        return $this->model->query()->where('active', true)->first();
    }

    public function setActive(array $data): mixed {
        return $this->model->query()
            ->latest()
            ->first()
            ->update($data);
    }

    public function setNonactive(): mixed {
        return $this->model->query()
            ->update(['active' => 0]);
    }
}
