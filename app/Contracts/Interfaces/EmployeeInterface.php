<?php

namespace App\Contracts\Interfaces;

use App\Contracts\Interfaces\Eloquent\DeleteInterface;
use App\Contracts\Interfaces\Eloquent\GetInterface;
use App\Contracts\Interfaces\Eloquent\ShowInterface;
use App\Contracts\Interfaces\Eloquent\ShowWithSlugInterface;
use App\Contracts\Interfaces\Eloquent\StoreInterface;
use App\Contracts\Interfaces\Eloquent\UpdateInterface;
use App\Contracts\Interfaces\Eloquent\WhereInterface;
use Illuminate\Http\Request;

interface EmployeeInterface extends GetInterface, StoreInterface, UpdateInterface, ShowInterface, DeleteInterface, WhereInterface, ShowWithSlugInterface
{
    public function paginate($query): mixed;
    public function whereSchool($query, Request $request): mixed;
    public function getTeacher(): mixed;
    public function getCountEmployee(mixed $query) : mixed;
    public function getSchool(mixed $id): mixed;
    public function getByRole(mixed $role, Request $request): mixed;
    public function getByUser(mixed $id) : mixed;
    public function employeeLesson(Request $request): mixed;
    public function getPermission(Request $request): mixed;
    public function getByRoleCount(mixed $role, Request $request): mixed;   

}
