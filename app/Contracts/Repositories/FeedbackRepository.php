<?php

    namespace App\Contracts\Repositories;

    use App\Contracts\Interfaces\FeedbackInterface;
    use App\Models\Feedback;
use Illuminate\Http\Request;

    class FeedbackRepository extends BaseRepository implements FeedbackInterface
    {
        public function __construct(Feedback $Feedback)
        {
            $this->model = $Feedback;
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

        public function get_lesson(Request $request): mixed
        {
            return $this->model->query()
                ->when($request->classroom_id, function($query) use ($request){
                    $query->whereRelation('student.classroomStudents', 'classroom_id' , $request->classroom_id);
                })->when($request->search, function($query) use ($request){
                    $query->where('summary', 'like', '%' . $request->search . '%')
                        ->orWhereRelation('student.user', 'name', 'like', '%' . $request->search . '%');
                })
                ->when($request->gender, function($query) use ($request){
                    $query->whereRelation('student', 'gender', $request->gender);
                })
                ->when($request->date, function($query) use ($request){
                    $query->whereDate('created_at', $request->date);
                })
                ->get()
                ->groupBy('lesson_schedule_id');
        }

        public function where_user_id(mixed $id): mixed
        {
            return $this->model->query()->where('student_id', $id)->get();
        }

        public function getBySubject(mixed $id): mixed
        {
            return $this->model->query()->whereRelation('lessonSchedule', 'teacher_subject_id', $id)->get();
        }
    }
