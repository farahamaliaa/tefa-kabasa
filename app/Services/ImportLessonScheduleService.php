<?php

namespace App\Services;

use App\Contracts\Interfaces\LessonScheduleInterface;
use App\Http\Requests\ImportLessonScheduleRequest;
use App\Models\Classroom;
use Flowgistics\XML\XMLFacade as XML;

class ImportLessonScheduleService
{
    private LessonScheduleInterface $lessonSchedule;

    public function __construct(LessonScheduleInterface $lessonSchedule)
    {
        $this->lessonSchedule = $lessonSchedule;
    }

    public function xml(ImportLessonScheduleRequest $request): void
    {
        $xmlContent = file_get_contents($request->file('file')->getRealPath());

        $xml = XML::import($xmlContent)->toArray();
        $worksheet = $xml['Worksheet'];
        $table = $worksheet->Table->Row;

        foreach ($table as $row) {

            $classroom = Classroom::where('name', (string)$row->Cell[2]->Data)->first();
            $column = [];

            // if ($classroom != null) {
            //     $column = [
            //         'classroom_id' => $classroom->id,
            //         'lesson_hour_start' =>
            //         'subject'   => (string)$row->Cell[0]->Data,
            //         'teacher'   => (string)$row->Cell[4]->Data,
            //     ];
            // }

            $data[] = $column;
        }
        dd($data);
    }
}
