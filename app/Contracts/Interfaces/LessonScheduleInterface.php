<?php

namespace App\Contracts\Interfaces;

use App\Contracts\Interfaces\Eloquent\DeleteInterface;
use App\Contracts\Interfaces\Eloquent\GetInterface;
use App\Contracts\Interfaces\Eloquent\PaginateInterface;
use App\Contracts\Interfaces\Eloquent\ShowInterface;
use App\Contracts\Interfaces\Eloquent\StoreInterface;
use App\Contracts\Interfaces\Eloquent\UpdateInterface;
use Illuminate\Http\Request;

interface LessonScheduleInterface extends GetInterface, StoreInterface, UpdateInterface, ShowInterface, DeleteInterface, PaginateInterface
{
    public function whereClassroom(mixed $id, string $query): mixed;
    public function whereClassroomId(mixed $id): mixed;
    public function whereTeacher(mixed $id, mixed $day): mixed;
    public function whereTeacherNotif(mixed $id, mixed $day): mixed;
    public function dahsboardSchool(mixed $query, mixed $day): mixed;
    public function groupByLatest($query): mixed;
    public function whereJournalTeacher(mixed $query, Request $request) : mixed;
    public function export(Request $request): mixed;
    public function getByTeacher(mixed $id): mixed;
    public function whereDay(mixed $query): mixed;
    public function whereDayApi(mixed $query): mixed;
}
