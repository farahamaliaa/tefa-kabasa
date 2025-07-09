<?php

namespace App\Contracts\Interfaces;

use App\Contracts\Interfaces\Eloquent\DeleteInterface;
use App\Contracts\Interfaces\Eloquent\DuplicateInterface;
use App\Contracts\Interfaces\Eloquent\GetInterface;
use App\Contracts\Interfaces\Eloquent\PaginateInterface;
use App\Contracts\Interfaces\Eloquent\ShowInterface;
use App\Contracts\Interfaces\Eloquent\StoreInterface;
use App\Contracts\Interfaces\Eloquent\UpdateInterface;
use App\Contracts\Interfaces\Eloquent\WhereInterface;
use App\Contracts\Interfaces\Eloquent\WhereSchoolInterface;
use App\Models\SchoolYear;
use Illuminate\Http\Request;

interface SchoolYearInterface extends GetInterface, StoreInterface, UpdateInterface, ShowInterface, DeleteInterface, PaginateInterface, WhereInterface
{
    public function active(): mixed;
    public function search(Request $request): mixed;
    public function whereSchoolYear(mixed $data): mixed;
    public function whereActive() : mixed;
    public function setNonactive(): mixed;
    public function setActive(array $data): mixed;
}
