<?php

namespace App\Contracts\Repositories\Teachers;

use App\Contracts\Interfaces\Teachers\TeacherJournalInterface;
use App\Contracts\Repositories\BaseRepository;
use App\Models\TeacherJournal;
use Carbon\Carbon;
use FontLib\Table\Type\maxp;
use Illuminate\Http\Request;

class TeacherJournalRepository extends BaseRepository implements TeacherJournalInterface
{
    public function __construct(TeacherJournal $city)
    {
        $this->model = $city;
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

    public function updateWithLesson(array $data, mixed $id): mixed
    {
        return $this->model->query()->where('lesson_schedule_id')->update($data);
    }

    public function delete(mixed $id): mixed
    {
        return $this->model->query()->findOrFail($id)->delete();
    }

    public function paginate(): mixed
    {
        return 0;
    }

    public function getLessonSchedule(mixed $id): mixed
    {
        return $this->model->query()->where('lesson_schedule_id', $id)->first();
    }

    public function histories(mixed $id,Request $request): mixed
    {
        return $this->model->query()
            ->whereRelation('lessonSchedule.teacherSubject.employee.user', 'id', $id)
            ->with('attendanceJournals')
            ->when($request->search, function ($query) use ($request) {
                $query->where('title', 'LIKE', '%' . $request->search . '%');
            })->when($request->filter === "terbaru", function($query) {
                $query->latest();
            })
            ->when($request->filter === "terlama", function($query) {
                $query->oldest();
            })->when($request->date, function ($query) use ($request) {
                $query->where('date', 'LIKE', '%' . $request->date . '%');
            })
            ->latest()
            ->get();
    }

    public function getJournalToday(mixed $id): mixed
    {
        return $this->model->query()
            ->whereRelation('lessonSchedule.teacherSubject.employee.user', 'id', $id)
            ->whereDate('created_at', today())
            ->get();
    }

    public function whereTeacher(mixed $employee_id, mixed $subject_id): mixed
    {
        return $this->model->query()
            ->whereRelation('lessonSchedule.teacherSubject', 'employee_id', $employee_id)
            ->whereRelation('lessonSchedule.teacherSubject', 'subject_id', $subject_id)
            ->first();
    }

    public function getByTeacher(mixed $employee_id): mixed
    {
        return $this->model->query()
            ->whereRelation('lessonSchedule.teacherSubject', 'employee_id', $employee_id)
            ->get();
    }

    public function getByLessonSchedule(mixed $id): mixed
    {
        return $this->model->query()
            ->where('lesson_schedule_id', $id)
            ->whereDate('created_at', today())
            ->first();
    }
}
