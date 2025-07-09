<?php

namespace App\Contracts\Interfaces;

use App\Contracts\Interfaces\Eloquent\DeleteInterface;
use App\Contracts\Interfaces\Eloquent\GetInterface;
use App\Contracts\Interfaces\Eloquent\ShowInterface;
use App\Contracts\Interfaces\Eloquent\StoreInterface;
use App\Contracts\Interfaces\Eloquent\UpdateInterface;
use Illuminate\Http\Request;

interface StudentViolationInterface extends GetInterface, StoreInterface, UpdateInterface, ShowInterface, DeleteInterface
{
    public function whereClassroom(mixed $id, Request $request) : mixed;
    public function whereStudent(mixed $id, Request $request): mixed;
    public function search(Request $request) : mixed;
    public function countByClassroomStudent();
    public function groubByCreated(mixed $id) : mixed;
    public function ViolationChart(mixed $year, mixed $month): mixed;
    public function count(mixed $query): mixed;
    public function countByStudent(): mixed;
    public function count_violation(mixed $id): mixed;
}
