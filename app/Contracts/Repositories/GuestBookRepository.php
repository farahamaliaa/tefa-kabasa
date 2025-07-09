<?php

    namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\GuestBookInterface;
use App\Models\GuestBook;
use Illuminate\Http\Request;

    class GuestBookRepository extends BaseRepository implements GuestBookInterface
    {
        public function __construct(GuestBook $GuestBook)
        {
            $this->model = $GuestBook;
        }

        public function get(Request $request): mixed
        {
            return $this->model->query()
            ->when($request->search, function ($query) use ($request) {
                $query->where('name', 'LIKE', '%' . $request->search . '%');
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
            return $this->model->query()->findOrFail($id)->update($data);
        }

        public function delete(mixed $id): mixed
        {
            return $this->model->query()->findOrFail($id)->delete();
        }
    }
