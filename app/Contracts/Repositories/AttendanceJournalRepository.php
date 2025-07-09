<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\AttendanceJournalInterface;
use App\Models\AttendanceJournal;

class AttendanceJournalRepository extends BaseRepository implements AttendanceJournalInterface
{
    public function __construct(AttendanceJournal $attendanceJournal)
    {
        $this->model = $attendanceJournal;
    }

    public function get(): mixed
    {
        return $this->model->query()->get();
    }

    public function getByClassroomStudent(mixed $id): mixed
    {
        return $this->model->query()->where('classroom_student_id', $id)->first();
    }

    public function getByTeacherJournal(mixed $id): mixed
    {
        return $this->model->query()->where('teacher_journal_id', $id)->get();
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

    public function updateByClassroomStudent(mixed $id, array $data): mixed
    {
        return $this->model->query()->where('classroom_student_id', $id)->update($data);
    }

    public function delete(mixed $id): mixed
    {
        return $this->model->query()->findOrFail($id)->delete();
    }

    public function deleteByJournalTeacher(mixed $id): mixed
    {
        return $this->model->query()->whereRelation('teacherJournal', 'id', $id)->delete();
    }

    public function where(mixed $data): mixed
    {
        return $this->model->query()->where('province_id', $data)->get();
    }

    public function whereLessonSchedule(mixed $id): mixed
    {
        return $this->model->query()->whereRelation('teacherJournal.lessonSchedule', 'id', $id)->get();
    }

    public function whereClassroomStudent(mixed $id, mixed $classroom): mixed
    {
        return $this->model->query()->where('id', $id)->where('classroom_student_id', $classroom)->first();
    }
}
