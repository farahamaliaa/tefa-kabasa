<?php

    namespace App\Services;

use App\Http\Requests\StoreFeedbackApiRequest;
use App\Http\Requests\StoreFeedbackRequest;
use App\Http\Requests\UpdateFeedbackRequest;
use App\Models\LessonSchedule;

    class FeedbackService
    {
        public function __construct()
        {

        }

        public function store(StoreFeedbackRequest $request, LessonSchedule $lessonSchedule, $id): mixed
        {
            $data = $request->validated();
            return [
                'lesson_schedule_id' => $lessonSchedule->id,
                'student_id' => $id,
                'is_teacher_present' => $data['is_teacher_present'],
                'summary' => $data['summary'],
            ];
        }

        public function storeApi(StoreFeedbackApiRequest $request, LessonSchedule $lessonSchedule): mixed
        {
            $data = $request->validated();
            return [
                'lesson_schedule_id' => $lessonSchedule->id,
                'student_id' => $request->student_id,
                'is_teacher_present' => $data['is_teacher_present'],
                'summary' => $data['summary'],
            ];
        }

        public function update(UpdateFeedbackRequest $request): mixed
        {
            $data = $request->validated();

            return [
                'is_teacher_present' => $data['is_teacher_present'],
                'summary' => $data['summary'],
            ];
        }

        public function delete(): void
        {

        }
    }
