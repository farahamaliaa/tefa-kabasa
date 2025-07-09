<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\LessonScheduleInterface;
use App\Enums\DayEnum;
use App\Models\LessonSchedule;
use Illuminate\Http\Request;

class LessonScheduleRepository extends BaseRepository implements LessonScheduleInterface
{
    public function __construct(LessonSchedule $lessonSchedule)
    {
        $this->model = $lessonSchedule;
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

    public function whereClassroom(mixed $id, string $query): mixed
    {
        return $this->model->query()
            ->whereRelation('classroom', 'id', $id)
            ->get()
            ->groupBy($query);
    }

    public function whereClassroomId(mixed $id): mixed
    {
        return $this->model->query()
            ->where('classroom_id', $id)
            ->whereNot('day', DayEnum::SUNDAY->value)
            ->get()
            ->groupBy('day');
    }

    public function whereTeacher(mixed $id, mixed $day): mixed
    {
        return $this->model->query()
            ->whereRelation('teacherSubject.employee.user', 'id', $id)
            ->with('teacherJournals', function ($query) use ($day) {
                $query->whereDay('created_at', $day);
            })
            ->where('day', $day->format('l'))
            ->get();
    }

    public function getByTeacher(mixed $id): mixed
    {
        return $this->model->query()
            ->whereRelation('teacherSubject.employee.user', 'id', $id)
            ->get()
            ->groupBy('day');
    }

    public function whereTeacherNotif(mixed $id, mixed $day): mixed
    {
        return $this->model->query()
            ->whereDoesntHave('teacherJournals')
            ->whereRelation('teacherSubject.employee.user', 'id', $id)
            ->where('day', $day->format('l'))
            ->get();
    }

    public function dahsboardSchool(mixed $query, mixed $day): mixed
    {
        $result = $this->model->query()
            ->where('day', $day->format('l'));

        $query == 'fill' ? $result->whereHas('teacherJournals') : $result->whereDoesntHave('teacherJournals');

        return $result->get();
    }

    public function whereJournalTeacher(mixed $query, Request $request): mixed
    {
        return $this->model->query()
            ->when($query == 'fill', function ($q) use ($request) {
                $q->when($request->search_fill, function ($i) use ($request) {
                    $i->whereRelation('teacherSubject.employee.user', 'name', 'like', '%' . $request->search_fill . '%');
                });
                $q->whereHas('teacherJournals');
            })
            ->when($query == 'notfill', function ($q) use ($request) {
                $q->when($request->search_notfill, function ($i) use ($request) {
                    $i->whereRelation('teacherSubject.employee.user', 'name', 'like', '%' . $request->search_notfill . '%');
                });
                $q->doesntHave('teacherJournals');
            })
            ->when($request->search, function ($i) use ($request) {
                $i->whereRelation('teacherSubject.employee.user', 'name', 'like', '%' . $request->search . '%');
            })
            ->latest()
            ->paginate(10);
    }

    public function export(Request $request): mixed
    {
        return $this->model->query()
            ->when($request->start, function ($q) use ($request) {
                $q->whereBetween('created_at', [$request->start . ' 00:00:00', $request->end . ' 23:59:59']);
            })
            ->when($request->classroom, function ($q) use ($request) {
                $q->where('classroom_id', $request->classroom);
            })
            ->when($request->subject, function ($q) use ($request) {
                $q->whereHas('teacherSubject', function ($query) use ($request) {
                    $query->where('subject_id', $request->subject);
                });
            })
            ->get();
    }

    public function groupByLatest($query): mixed
    {
        return $this->model->query()
            ->where('day', $query)
            ->latest()
            ->first();
    }

    public function whereDay(mixed $query): mixed
    {
        return $this->model->query()
            ->where('classroom_id', $query)
            ->where('day', now()->format('l'))
            ->whereHas('end', function($query){
                $query->where('end', '<', now()->format('H:i'));
            })
            ->get();
    }

    public function whereDayApi(mixed $query): mixed
    {
        return $this->model->query()
        ->where('classroom_id', $query)
        ->where('day', now()->format('l'))
        ->get();
    }
}
