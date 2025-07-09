<?php

namespace App\Contracts\Interfaces;

use App\Contracts\Interfaces\Eloquent\DeleteInterface;
use App\Contracts\Interfaces\Eloquent\GetInterface;
use App\Contracts\Interfaces\Eloquent\PaginateInterface;
use App\Contracts\Interfaces\Eloquent\SearchInterface;
use App\Contracts\Interfaces\Eloquent\ShowInterface;
use App\Contracts\Interfaces\Eloquent\StoreInterface;
use App\Contracts\Interfaces\Eloquent\UpdateInterface;
use App\Contracts\Interfaces\Eloquent\WhereUserIdInterface;
use Illuminate\Http\Request;

interface StudentInterface extends GetInterface, StoreInterface, UpdateInterface, ShowInterface, DeleteInterface, PaginateInterface, SearchInterface, WhereUserIdInterface
{
    public function doesntHaveClassroom(Request $request): mixed;
    public function countStudentAlumni() : mixed;
    public function count() : mixed;
    public function getByPoint(Request $request) : mixed;
    public function whereClassroomStudent(mixed $id) : mixed;
    public function highestPoint(mixed $query): mixed;
    public function orderByPoint(): mixed;
    public function getByApi(Request $request): mixed;
}
