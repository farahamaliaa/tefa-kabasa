<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\SchoolInterface;
use App\Models\School;
use Illuminate\Http\Request;

class SchoolRepository extends BaseRepository implements SchoolInterface
{
    public function __construct(School $school)
    {
        $this->model = $school;
    }

    public function get(): mixed
    {
        return $this->model->query()->get();
    }

    public function store(array $data): mixed
    {
        return $this->model->query()->create($data);
    }

    public function showWithSlug(string $slug): mixed
    {
        return $this->model->query()->whereRelation('user', 'slug', $slug)->firstOrFail();
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
        return $this->model->query()->where('active', $data)
        ->when($request->name, function ($query) use ($request) {
            $query->whereRelation('user', 'name', 'LIKE', '%' . $request->name . '%');
        })
        ->paginate(10);
    }

    public function whereUserId(mixed $id): mixed
    {
        return $this->model->query()->where('user_id', $id)->firstOrFail();
    }

    public function getActiveCount(mixed $query): mixed
    {
        return $this->model->query()->where('active', $query)->count();
    }
    public function search(Request $request):mixed
    {
        $query = $this->model->query();

        $query->when($request->name, function ($query) use ($request) {
            $query->whereRelation('user', 'name', 'LIKE', '%' . $request->name . '%');
        });

        return $query;
    }
}
