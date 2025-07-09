<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\UserInterface;
use App\Models\User;
use Illuminate\Http\Request;

class UserRepository extends BaseRepository implements UserInterface
{
    private $permission;

    public function __construct(User $user)
    {
        $this->model = $user;
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

    public function showEmail(string $email): mixed
    {
        return $this->model->query()->where('email', $email)->first();
    }

    public function findOrFail(mixed $id): mixed
    {
        return $this->model->query()->findOrFail($id);
    }

    public function showWithSlug(mixed $slug): mixed
    {
        return $this->model->query()->where('slug', $slug)->first();
    }
}
