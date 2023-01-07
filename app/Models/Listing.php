<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enums\ListingAvailabilityEnum;
use App\Traits\Filterable;

class Listing extends Model
{
    use HasFactory, Filterable;

    protected $guarded = [];

    protected $casts = [
        'availability' => ListingAvailabilityEnum::class
    ];

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function types()
    {
        return $this->belongsToMany(Type::class);
    }
}
