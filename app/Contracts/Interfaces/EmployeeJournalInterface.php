<?php

namespace App\Contracts\Interfaces;

use App\Contracts\Interfaces\Eloquent\DeleteInterface;
use App\Contracts\Interfaces\Eloquent\GetInterface;
use App\Contracts\Interfaces\Eloquent\ShowInterface;
use App\Contracts\Interfaces\Eloquent\StoreInterface;
use App\Contracts\Interfaces\Eloquent\UpdateInterface;
use Illuminate\Http\Request;

interface EmployeeJournalInterface extends GetInterface, StoreInterface, UpdateInterface, ShowInterface, DeleteInterface
{
    public function getEmployee(mixed $id, mixed $query) : mixed;
    public function getByStatus(string $status, Request $request): mixed;
    public function search(Request $request): mixed;
    public function export(Request $request): mixed;
    public function whereDate(mixed $id, mixed $date): mixed;
}
