<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\LessonHourInterface;
use App\Models\LessonHour;
use App\Models\LessonSchedule;
use Illuminate\Http\Request;

class LessonHourRepository extends BaseRepository implements LessonHourInterface
{
    public function __construct(LessonHour $lessonHour)
    {
        $this->model = $lessonHour;
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

    public function paginate(): mixed
    {
        return $this->model->query()->latest()->paginate(10);
    }

    public function groupBy($query): mixed
    {
        return $this->model->query()
            ->get()
            ->sortBy('start')
            ->groupBy($query);
    }

    public function groupByNot($query, $id): mixed
    {
        $excludedIds = LessonSchedule::query()
        ->where('classroom_id', $id)
        ->select('lesson_hour_start', 'lesson_hour_end')
        ->get()
        ->flatMap(function ($schedule) {
            return range($schedule->lesson_hour_start, $schedule->lesson_hour_end);
        })
        ->unique()
        ->all();

        return $this->model->query()
            ->whereNot('name', 'Istirahat')
            ->whereNotIn('id', $excludedIds)
            ->get()
            ->groupBy($query);
    }

    public function groupByNotUpdate($query): mixed
    {
        return $this->model->query()
            ->whereNot('name', 'Istirahat')
            ->get()
            ->groupBy($query);
    }


    public function groupByLatest($query): mixed
    {
        return $this->model->query()
            ->where('day', $query)
            ->latest()
            ->first();
    }

    public function whereDay(mixed $day, mixed $name): mixed
    {
        return $this->model->query()
            ->when($name != 'Istirahat', function ($query) use ($name, $day) {
                $query->where('day', $day);
                $query->where('name', $name);
            })
            ->when($name == 'Istirahat', function ($query) {
                $query->where('day', '');
                $query->where('name', '');
            })
            ->first();
    }

    public function whereRest(mixed $day, mixed $start, mixed $end): mixed
    {
        return $this->model->query()->where('day', $day)->whereBetween('id', [$start, $end])->get();
    }

    public function whereTeacherSchedule($lessonSchedule, $day): mixed
    {
        $day = strtolower($day->format('l'));
        return $this->model->query()
            ->whereBetween('start', [$lessonSchedule->start->start, $lessonSchedule->end->start])
            ->where('day', $day)
            ->get();
    }

    public function whereBetween(mixed $start, mixed $end, mixed $day): mixed
    {
        return $this->model->query()
            ->where('day', $day)
            ->whereBetween('start', [$start, $end])
            ->count();
    }

    public function getByDay(mixed $day): mixed
    {
        return $this->model->query()
            ->where('day', $day)
            ->get();
    }
}
