<?php

namespace App\Contracts\Interfaces;

use App\Contracts\Interfaces\Eloquent\DeleteInterface;
use App\Contracts\Interfaces\Eloquent\GetInterface;
use App\Contracts\Interfaces\Eloquent\PaginateInterface;
use App\Contracts\Interfaces\Eloquent\ShowWithSlugInterface;
use App\Contracts\Interfaces\Eloquent\StoreInterface;
use App\Contracts\Interfaces\Eloquent\UpdateInterface;
use App\Contracts\Interfaces\Eloquent\WhereUserIdInterface;
use Illuminate\Http\Request;

interface SchoolInterface extends GetInterface, StoreInterface, UpdateInterface, ShowWithSlugInterface, DeleteInterface, PaginateInterface, WhereUserIdInterface
{
    public function getActiveCount(mixed $query): mixed;
    public function search(Request $request):mixed;
    public function where(mixed $data, Request $request): mixed;

}
