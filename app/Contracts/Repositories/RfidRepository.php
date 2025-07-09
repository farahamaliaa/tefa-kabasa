<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\RfidInterface;
use App\Enums\RfidStatusEnum;
use App\Models\Rfid;
use Illuminate\Http\Request;

class RfidRepository extends BaseRepository implements RfidInterface
{
    public function __construct(Rfid $rfid)
    {
        $this->model = $rfid;
    }

    public function get(): mixed
    {
        return $this->model->query()->get();
    }

    public function where(mixed $data): bool
    {
        return $this->model->query()->where('rfid', $data)->exists();
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

    public function used(Request $request): mixed
    {
        return $this->model->query()->where('status', RfidStatusEnum::USED->value)
        ->when($request->search, function ($query) use ($request) {
            $query->where('rfid', 'LIKE', '%' .  $request->search . '%');
        })->when($request->filter === "terbaru", function($query) {
            $query->latest();
        })
        ->when($request->filter === "terlama", function($query) {
            $query->oldest();
        }) ->when($request->status, function($query) use ($request) {
            $query->where('status', $request->status);
        })->get();
    }

    public function notUsed(Request $request): mixed
    {
        return $this->model->query()->where('status', RfidStatusEnum::NOTUSED->value)
        ->when($request->search, function ($query) use ($request) {
            $query->where('rfid', 'LIKE', '%' .  $request->search . '%');
        })->when($request->filter === "terbaru", function($query) {
            $query->latest();
        })
        ->when($request->filter === "terlama", function($query) {
            $query->oldest();
        }) ->when($request->status, function($query) use ($request) {
            $query->where('status', $request->status);
        })->get();
    }

    public function search(Request $request): mixed
    {
        return $this->model->query()
        ->when($request->search, function ($query) use ($request) {
            $query->where('rfid', 'LIKE', '%' .  $request->search . '%');
        })->paginate(10);
    }
}
