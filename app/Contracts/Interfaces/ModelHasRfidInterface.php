<?php

namespace App\Contracts\Interfaces;

use App\Contracts\Interfaces\Eloquent\GetInterface;
use App\Contracts\Interfaces\Eloquent\PaginateInterface;
use App\Contracts\Interfaces\Eloquent\ShowInterface;
use App\Contracts\Interfaces\Eloquent\StoreInterface;
use App\Contracts\Interfaces\Eloquent\UpdateInterface;
use App\Contracts\Interfaces\Eloquent\UpdateOrCreateInterface;
use App\Contracts\Interfaces\Eloquent\WhereInterface;
use Illuminate\Http\Request;

interface ModelHasRfidInterface extends GetInterface, StoreInterface, UpdateOrCreateInterface, UpdateInterface, ShowInterface, PaginateInterface, WhereInterface
{
    public function exists(mixed $rfid): mixed;

    public function activeRfid(Request $request): mixed;
    public function masterRfid(Request $request): mixed;
    public function nonActiveRfid(Request $request): mixed;
    public function whereSchool($id): mixed;
    public function whereNotNull(mixed $column):mixed;
    public function whereNull(mixed $column):mixed;
    public function getEmployeeRfid() : mixed;
    public function getByActiveStudent() : mixed;
    public function whereRfid(mixed $query) : mixed;
    public function searchMaster(Request $request): mixed;
    public function getStudentRfid(): mixed;
    public function delete(string $model_type, mixed $model_id) : mixed;
    public function count(): mixed;
    public function first(string $model_type, mixed $model_id): mixed;
}
