<?php

namespace App\Contracts\Interfaces;

use App\Contracts\Interfaces\Eloquent\DeleteInterface;
use App\Contracts\Interfaces\Eloquent\GetInterface;
use App\Contracts\Interfaces\Eloquent\PaginateInterface;
use App\Contracts\Interfaces\Eloquent\ShowInterface;
use App\Contracts\Interfaces\Eloquent\StoreInterface;
use App\Contracts\Interfaces\Eloquent\UpdateInterface;
use App\Contracts\Interfaces\Eloquent\WhereSchoolInterface;
use Illuminate\Http\Request;

interface AttendanceInterface extends GetInterface, StoreInterface, UpdateInterface, ShowInterface, DeleteInterface, PaginateInterface
{
    public function AttendanceChart(mixed $year, mixed $month, mixed $status) : mixed;
    public function getSchool(mixed $id, mixed $query): mixed;
    public function checkPresence(mixed $id, mixed $status) : mixed;
    public function updateCheckOut(mixed $id, array $data) : mixed;
    public function whereSchool(mixed $id, Request $request): mixed;
    public function getStudent(mixed $id): mixed;
    public function whereClassroom(mixed $id): mixed;
    public function classAndDate(mixed $classroom_id, Request $request): mixed;
    public function exportClassAndDate(mixed $classroom_id, Request $request): mixed;
    public function attendanceGetTecaher(Request $request): mixed;
    public function insert(array $data) :mixed;
    public function getCurrentDay() :mixed;
    public function updateWithAttribute(array $attribute, array $data): mixed;
    public function listAttendance($date);
    public function whereModel(mixed $model, Request $request) : mixed;
    public function reset($date);
    public function nowAttendance(): mixed;
    public function getClassroomStudent(string $id) : mixed;
    public function AttendanceChartEmployee(mixed $start_date, mixed $end_date, mixed $status): mixed;
    public function classroomAttendanceChart($date);
    public function AttendanceDasboard(mixed $model, mixed $query, Request $request): mixed;
    public function userToday(mixed $model, mixed $id): mixed;
    public function whereUser(mixed $id, mixed $model): mixed;
    public function getByUserAndStatus(mixed $model, mixed $id, mixed $status, mixed $condition): mixed;
    public function whereModelAndNow(mixed $model, Request $request): mixed;
    public function whereClassroomCount(mixed $id, mixed $day, mixed $status): mixed;
    public function getSickAndPermit(Request $request, array $status) : mixed;
    public function allStudentWithPagination(Request $request): mixed;
}
