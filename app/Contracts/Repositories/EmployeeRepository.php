<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\EmployeeInterface;
use App\Enums\RoleEnum;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeRepository extends BaseRepository implements EmployeeInterface
{
    public function __construct(Employee $employee)
    {
        $this->model = $employee;
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

    public function paginate($query): mixed
    {
        return $this->model->query()
            ->whereRelation('user.roles', 'name', $query)
            ->latest()
            ->paginate(10);
    }

    public function where(mixed $data): mixed
    {
        return $this->model->query()
            ->whereRelation('user.roles', 'name', $data)->count();
    }

    public function getSchool(mixed $id): mixed
    {
        return $this->model->query()->where('school_id', $id)->get();
    }

    public function getTeacher(): mixed
    {
        return $this->model->query()->whereRelation('user.roles', 'name', RoleEnum::TEACHER->value)->get();
    }

    public function whereSchool($query, Request $request): mixed
    {
        return $this->model->query()->whereRelation('user.roles', 'name', $query)
            ->when($request->search, function ($query) use ($request) {
                $query->whereHas('user', function ($q) use ($request) {
                    $q->where('name', 'LIKE', '%' .  $request->search . '%');
                });
            })->when($request->filter === "terbaru", function ($query) {
                $query->latest();
            })
            ->when($request->filter === "terlama", function ($query) {
                $query->oldest();
            })->when($request->status, function ($query) use ($request) {
                $query->where('status', $request->status);
            })
            ->latest()
            ->paginate(10);
    }

    public function showWithSlug(string $slug): mixed
    {
        return $this->model->query()->whereRelation('user', 'slug', $slug)->firstOrFail();
    }

    public function getPermission(Request $request): mixed
    {
        $query = $this->model->query()
            ->join('users', 'users.id', '=', 'employees.user_id')
            ->join('model_has_permissions', 'model_has_permissions.model_id', '=', 'users.id')
            ->where('model_has_permissions.model_type', '=', 'App\\Models\\User')
            ->select('employees.*', 'users.name as user_name', 'model_has_permissions.permission_id');

        if ($request->filled('search')) {
            $query->whereRelation('user', 'name', 'like', '%' . $request->search . '%');
        }

        return $query->get();
    }

    public function getCountEmployee(mixed $query): mixed
    {
        return $this->model->query()->whereRelation('user.roles', 'name', $query)->count();
    }

    public function getByUser(mixed $id): mixed
    {
        return $this->model->query()
            ->where('user_id', $id)
            ->first();
    }

    /**
     * Mengambil data pegawai berdasarkan role.
     *
     * @param mixed $role role yang ingin dicari.
     * @return mixed mengembalikan koleksi data pegawai yang rolenya sesuai.
     */
    public function getByRole(mixed $role, Request $request): mixed
    {
        return $this->model->query()->whereRelation('user.roles', 'name', $role)
            ->when($request->search, function ($query) use ($request) {
                $query->whereHas('user', function ($q) use ($request) {
                    $q->where('name', 'LIKE', '%' .  $request->search . '%');
                });
            })->when($request->gender, function ($query) use ($request) {
                $query->where('gender', $request->gender);
            })
            ->latest()
            ->paginate(10);
    }

    public function getByRoleCount(mixed $role, Request $request): mixed
    {
        return $this->model->query()
            ->whereRelation('user.roles', 'name', $role)
            ->when($request->search, function ($query) use ($request) {
                $query->whereHas('user', function ($q) use ($request) {
                    $q->where('name', 'LIKE', '%' . $request->search . '%');
                });
            })->when($request->gender, function ($query) use ($request) {
                $query->where('gender', $request->gender);
            })->count();
    }


    public function employeeLesson(Request $request): mixed
    {
        return $this->model->query()
            ->whereRelation('user.roles', 'name', RoleEnum::TEACHER->value)
            ->whereHas('teacherSubjects')
            ->when($request->search, function ($query) use ($request) {
                $query->whereRelation('user', 'name', 'LIKE', '%' . $request->search . '%');
            })
            ->when($request->gender, function ($query) use ($request) {
                $query->where('gender', $request->gender);
            })
            ->paginate(8);
    }
}
