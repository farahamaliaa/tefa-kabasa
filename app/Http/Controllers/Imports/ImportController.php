<?php

namespace App\Http\Controllers\Imports;

use App\Enums\DayEnum;
use App\Models\Classroom;
use App\Models\LessonHour;
use App\Models\SchoolYear;
use Illuminate\Http\Request;
use App\Models\LessonSchedule;
use App\Models\TeacherSubject;
use App\Http\Controllers\Controller;
use PhpOffice\PhpSpreadsheet\IOFactory;

class ImportController extends Controller
{
    public function importSpreadsheet(Request $request)
    {
        // Load the spreadsheet
        $spreadsheet = IOFactory::load($request->file('file'));


        // Iterate through all sheets in the spreadsheet
        foreach ($spreadsheet->getAllSheets() as $worksheet) {

            if ($worksheet->getTitle() === 'Contoh Format') {
                continue;
            }


            // Retrieve school year and classroom for the current sheet
            $schoolYear = SchoolYear::where('school_year', $worksheet->getCell('I2')->getValue())->first();
            $classroom = Classroom::where('name', $worksheet->getTitle())->first();

            // Map days to columns
            $days = ['senin' => 'B', 'selasa' => 'C', 'rabu' => 'D', 'kamis' => 'E', 'jumat' => 'F', 'sabtu' => 'G'];

            // Get merged cells and map them for easier access
            $mergedCells = [];
            foreach ($worksheet->getMergeCells() as $range) {
                [$startCell, $endCell] = explode(':', $range);
                $mergedCells[$startCell] = $endCell;
            }

            $dataSchedule = [];
            $highestRow = $worksheet->getHighestRow();

            // Iterate over rows and days to extract schedule data
            for ($row = 3; $row < $highestRow; $row++) {
                $startTime = $worksheet->getCell("A$row")->getValue();

                foreach ($days as $day => $column) {
                    $cellValue = $worksheet->getCell("$column$row")->getValue();
                    if ($cellValue) {
                        $endRow = preg_replace('/\D/', '', $mergedCells["$column$row"] ?? $row);
                        $endTime = $worksheet->getCell("A$endRow")->getValue();

                        [$mapleName, $teacherName] = explode(' - ', $cellValue);

                        try {
                            $teacherSubject = TeacherSubject::whereHas('employee.user', fn($q) => $q->where('name', $teacherName))
                                                            ->whereHas('subject', fn($q) => $q->where('name', $mapleName))
                                                            ->first();

                            $dataSchedule[] = [
                                'teacher_subject_id' => $teacherSubject->id,
                                'lesson_hour_start' => LessonHour::where('name', "Jam ke - $startTime")->first()->id,
                                'lesson_hour_end' => LessonHour::where('name', "Jam ke - $endTime")->first()->id,
                                'school_year_id' => $schoolYear->id,
                                'classroom_id' => $classroom->id,
                                'created_at' => now(),
                                'day' => DayEnum::translate($day)
                            ];
                        } catch (\Exception $e) {
                            // Handle the exception (log or return an error)
                            // dd($startTime, $endTime, $day);
                        }
                    }
                }
            }

            // Insert the schedule data into the database for the current sheet
            if (LessonSchedule::insert($dataSchedule)) {
                // Optionally log or handle successful insertion for each sheet
            }
        }

        return back()->with('success', 'Import data jadwal pelajaran berhasil');
    }
}
