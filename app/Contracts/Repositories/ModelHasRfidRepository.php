<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\ModelHasRfidInterface;
use App\Enums\RfidTypeEnum;
use App\Enums\RoleEnum;
use App\Models\ModelHasRfid;
use Illuminate\Http\Request;

class ModelHasRfidRepository extends BaseRepository implements ModelHasRfidInterface
{
    public function __construct(ModelHasRfid $modelHasRfid)
    {
        $this->model = $modelHasRfid;
    }

    public function get(): mixed
    {
        return $this->model->query()->get();
    }
    public function activeRfid(Request $request): mixed
    {
        return $this->model->query()
            ->whereNotNull('model_type')
            ->whereNotNull('model_id')
            ->when($request->name, function ($query) use ($request) {
                $query->where('rfid', 'LIKE', '%' .  $request->name . '%');
            })->when($request->filter === "terbaru", function($query) {
                $query->latest();
            })
            ->when($request->filter === "terlama", function($query) {
                $query->oldest();
            })->when($request->status, function($query) use ($request) {
                $query->where('status', $request->status);
            })
            ->paginate(10);
    }
    public function nonActiveRfid(Request $request): mixed
    {
        return $this->model->query()
            ->whereNull('model_type')
            ->whereNull('model_id')
            ->when($request->name, function ($query) use ($request) {
                $query->where('rfid', 'LIKE', '%' .  $request->name . '%');
            })->when($request->filter === "terbaru", function($query) {
                $query->latest();
            })
            ->when($request->filter === "terlama", function($query) {
                $query->oldest();
            })->when($request->status, function($query) use ($request) {
                $query->where('status', $request->status);
            })
            ->paginate(10);
    }

    public function masterRfid(Request $request): mixed
    {
        return $this->model->query()
            ->where('model_type', 'App\Models\School')
            ->when($request->name, function ($query) use ($request) {
                $query->where('rfid', 'LIKE', '%' .  $request->name . '%');
            })
            ->get();
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
        return $this->model->query()->where('rfid', $id)->update($data);
    }
    public function updateOrCreate(array $match ,array $data): mixed
    {
        return $this->model->query()->updateOrCreate($match, $data);
    }

    public function delete(string $model_type, mixed $model_id): mixed
    {
        return $this->model->query()->where('model_type', $model_type)->where('model_id', $model_id)->delete();
    }

    public function first(string $model_type, mixed $model_id): mixed
    {
        return $this->model->query()->where('model_type', $model_type)->where('model_id', $model_id)->first();
    }

    public function paginate(): mixed
    {
        return $this->model->query()->latest()->paginate(10);
    }

    public function where(mixed $data): mixed
    {
        return $this->model->query()->where('rfid', $data)->first();
    }

    public function exists(mixed $rfid): mixed
    {
        return $this->model->query()->where('rfid', $rfid)->exists();
    }

    public function whereSchool($id): mixed
    {
        return $this->model->query()->where('school_id', $id)->get();
    }

    public function whereNotNull(mixed $column):mixed
    {
        return $this->model->query()->whereNotNull($column)->get();
    }

    public function whereNull(mixed $column):mixed
    {
        return $this->model->query()->whereNull($column)->get();
    }

    public function whereRfid(mixed $query): mixed
    {
        return $this->model->query()->where('rfid', $query)->first();
    }

    public function getEmployeeRfid(): mixed
    {
        return $this->model->query()
            ->where(function ($query) {
                $query->whereHas('model', function ($query) {
                    $query->whereHas('user.roles', function ($query) {
                        $query->whereNot('name', RoleEnum::STUDENT->value);
                    });
                })->orWhereNull('model_type');
            })
            ->get();
    }
    public function getStudentRfid(): mixed
    {
        return $this->model->query()
        ->with('model.classroomStudents.classroom')
            ->where(function ($query) {
                $query->whereHas('model', function ($query) {
                    $query->whereHas('user.roles', function ($query) {
                        $query->where('name', RoleEnum::STUDENT->value);
                    });
                });
            })
            ->get();
    }


    public function getByActiveStudent(): mixed
    {
        return $this->model->query()
            ->where('model_type' , RfidTypeEnum::STUDENT->value)
            ->whereRelation('model', function($q) {
                $q->whereHas('classroomStudents.classroom.schoolYear', function ($q) {
                    $q->where('active', 1);
                });
            })
            ->get();
    }

    public function searchMaster(Request $request): mixed
    {
        return $this->model->query()
        ->whereNull('model_type')
        ->when($request->search, function ($query) use ($request) {
            $query->where('rfid', 'LIKE', '%' .  $request->search . '%');
        })->paginate(10);
    }

    public function count(): mixed
    {
        return $this->model->query()->count();
    }
}
