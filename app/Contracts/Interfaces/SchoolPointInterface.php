<?php
        
namespace App\Contracts\Interfaces;

use App\Contracts\Interfaces\Eloquent\GetInterface;
use App\Contracts\Interfaces\Eloquent\StoreInterface;
        
interface SchoolPointInterface extends GetInterface, StoreInterface
{
    public function deleteAll(): mixed;
    public function getMaxPoint(): mixed;
}