<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class City extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'type',
        'province_id',
    ];

    /**
     * Get the province that owns the City
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function province(): BelongsTo
    {
        return $this->belongsTo(Province::class);
    }

    /**
     * Get all of the subDistricts for the City
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function subDistricts(): HasMany
    {
        return $this->hasMany(SubDistrict::class);
    }

}
