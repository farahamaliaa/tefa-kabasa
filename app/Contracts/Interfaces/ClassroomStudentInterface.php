<?php

namespace App\Contracts\Interfaces;

use App\Contracts\Interfaces\Eloquent\DeleteInterface;
use App\Contracts\Interfaces\Eloquent\GetInterface;
use App\Contracts\Interfaces\Eloquent\PaginateInterface;
use App\Contracts\Interfaces\Eloquent\ShowInterface;
use App\Contracts\Interfaces\Eloquent\StoreInterface;
use App\Contracts\Interfaces\Eloquent\UpdateInterface;
use App\Contracts\Interfaces\Eloquent\WhereInterface;
use Illuminate\Http\Request;

interface ClassroomStudentInterface extends GetInterface, StoreInterface, UpdateInterface, ShowInterface, DeleteInterface, PaginateInterface
{
    public function whereStudent(mixed $id): mixed;
    public function where(mixed $data, Request $request): mixed;
    public function activeStudents() : mixed;
    public function getAlumnus(Request $request): mixed;
    public function getByClassId(mixed $id): mixed;
    public function whereClassroom(mixed $id, Request $request): mixed;
    public function check(mixed $classroomId, mixed $studentId): mixed;
}
