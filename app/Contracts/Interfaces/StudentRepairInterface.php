<?php

namespace App\Contracts\Interfaces;

use App\Contracts\Interfaces\Eloquent\DeleteInterface;
use App\Contracts\Interfaces\Eloquent\GetInterface;
use App\Contracts\Interfaces\Eloquent\SearchInterface;
use App\Contracts\Interfaces\Eloquent\ShowInterface;
use App\Contracts\Interfaces\Eloquent\StoreInterface;
use App\Contracts\Interfaces\Eloquent\UpdateInterface;
use Illuminate\Http\Request;

interface StudentRepairInterface extends GetInterface, StoreInterface, UpdateInterface, ShowInterface, DeleteInterface, SearchInterface
{
    public function whereStudent(mixed $id, Request $request): mixed;
    public function count(): mixed;
    public function repairChart(mixed $year, mixed $month): mixed;
    public function groubByCreated(mixed $id): mixed;
    public function countByStudent(): mixed;
    public function count_approved(mixed $query): mixed;
    public function groupByClassroomStudentAndCreated(): mixed;
    public function count_repair(mixed $id): mixed;
}
