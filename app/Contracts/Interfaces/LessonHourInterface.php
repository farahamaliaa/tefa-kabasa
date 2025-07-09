<?php

namespace App\Contracts\Interfaces;

use App\Contracts\Interfaces\Eloquent\DeleteInterface;
use App\Contracts\Interfaces\Eloquent\GetInterface;
use App\Contracts\Interfaces\Eloquent\PaginateInterface;
use App\Contracts\Interfaces\Eloquent\ShowInterface;
use App\Contracts\Interfaces\Eloquent\StoreInterface;
use App\Contracts\Interfaces\Eloquent\UpdateInterface;

interface LessonHourInterface extends GetInterface, StoreInterface, UpdateInterface, ShowInterface, DeleteInterface, PaginateInterface
{
    public function groupBy($query):mixed;
    public function groupByNot($query, $id):mixed;
    public function groupByNotUpdate($query):mixed;
    public function groupByLatest($query):mixed;
    public function whereDay(mixed $day, mixed $name) : mixed;
    public function getByDay(mixed $day): mixed;
    public function whereRest(mixed $day, mixed $start, mixed $end) : mixed;
    public function whereTeacherSchedule($lessonSchedule, $day) : mixed;
    public function whereBetween(mixed $start, mixed $end, mixed $day): mixed;
}
