<?php

namespace App\Contracts\Interfaces;

use App\Contracts\Interfaces\Eloquent\DeleteInterface;
use App\Contracts\Interfaces\Eloquent\GetInterface;
use App\Contracts\Interfaces\Eloquent\PaginateInterface;
use App\Contracts\Interfaces\Eloquent\ShowInterface;
use App\Contracts\Interfaces\Eloquent\StoreInterface;
use App\Contracts\Interfaces\Eloquent\UpdateInterface;
use App\Contracts\Interfaces\Eloquent\WhereInterface;
use PhpParser\Node\Expr\FuncCall;

interface TeacherSubjectInterface extends GetInterface, StoreInterface, UpdateInterface, ShowInterface, DeleteInterface, PaginateInterface, WhereInterface
{
    public function insert(array $data): mixed;
    public function whereTeacher(mixed $subject_id, mixed $employee_id): mixed;
    public function getBySubjectId(mixed $subject_id): mixed;
    public function getByTeacher(mixed $id) : mixed;
}
