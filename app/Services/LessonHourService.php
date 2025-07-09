<?php

namespace App\Services;

use App\Contracts\Interfaces\LessonHourInterface;
use App\Http\Requests\StoreLessonHourRequest;
use App\Http\Requests\UpdateLessonHourRequest;
use App\Models\LessonHour;
use App\Models\Student;

class LessonHourService
{
    private LessonHourInterface $lessonHour;

    public function __construct(LessonHourInterface $lessonHour)
    {
        $this->lessonHour = $lessonHour;
    }

    public function store(StoreLessonHourRequest $request, string $day): array|bool
    {
        $data = $request->validated();

        $name = "";
        if ($request->has('rest')) {
            $name = 'Istirahat';
        } else {
            $name = 'Jam ke - '. $data['name'];
        }

        $data['name'] = $name;
        $data['day'] = $day;
        return $data;
    }

    public function update(LessonHour $lessonHour, UpdateLessonHourRequest $request): array|bool
    {
        $data = $request->validated();
        $data['school_id'] = auth()->user()->school->id;
        return $data;
    }

    public function delete(Student $student)
    {
        //
    }

    public function get()
    {
        $days = [
            'monday',
            'tuesday',
            'wednesday',
            'thursday',
            'friday',
            'saturday',
            'sunday',
        ];

        $data = [];
        foreach ($days as $day ) {
            $data[] = [
                $this->lessonHour->groupByLatest($day)
            ];
        }

        return $data;
    }
}
