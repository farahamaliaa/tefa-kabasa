<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\RegulationInterface;
use App\Models\Regulation;
use Illuminate\Http\Request;

class RegulationRepository extends BaseRepository implements RegulationInterface
{
    public function __construct(Regulation $regulation)
    {
        $this->model = $regulation;
    }

    public function get(): mixed
    {
        return $this->model->query()->get();
    }

    public function latest(): mixed
    {
        return $this->model->query()->latest()->get();
    }

    public function sum_point(mixed $id): mixed
    {
        return $this->model->query()->where('id', $id)->get()->sum('point');
    }

    public function search(Request $request): mixed
    {
        return $this->model->query()
            ->when($request->search, function($query)use($request){
                $query->where('violation', 'Like', '%' . $request->search . '%');
            })
            ->when($request->points, function($query)use($request){
                $order = $request->points == 'highest' ? 'desc' : 'asc';
                $query->orderBy('point', $order);
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

    public function where(mixed $data): mixed
    {
        return $this->model->query()
            ->where('violation', $data)
            ->first();
    }

    public function getAll(Request $request)
    {
        return $this->model->query()
            ->when($request->name, function($query) use ($request){
                $query->where('violation', 'like', '%' . $request->name . '%');
            })
            ->when($request->filter, function($query) use ($request){
                $query->when($request->filter == 'highest', function($q) {
                    $q->withCount('studentViolations')
                    ->orderBy('student_violations_count', 'desc');
                });
                $query->when($request->filter == 'lowest', function($q) {
                    $q->withCount('studentViolations')
                    ->orderBy('student_violations_count', 'asc');
                });
                $query->when($request->filter == 'latest', function($q) {
                    $q->latest();
                });
                $query->when($request->filter == 'oldest', function($q) {
                    $q->oldest();
                });
            })
            ->withCount('studentViolations')
            ->orderBy('student_violations_count', 'desc')
            ->paginate(10);
    }

    public function getOrder(): mixed
    {
        return $this->model->query()
            ->withCount('studentViolations')
            ->orderBy('student_violations_count', 'desc')
            ->get();
    }

    public function getOrderApi(): mixed
    {
        return $this->model->query()
            ->withCount('studentViolations')
            ->orderBy('student_violations_count', 'desc')
            ->take(5)
            ->get();
    }

    public function getRegulation(Request $request): mixed
    {
        return $this->model->query()
        ->when($request->name, function($query) use ($request){
            $query->where('violation', 'like', '%' . $request->name . '%');
        })->get();
    }
}
