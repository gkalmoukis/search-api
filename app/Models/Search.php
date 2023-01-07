<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Search extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function locations()
    {
        return $this->belongsToMany(Location::class, 'search_location');
    }

    public function types()
    {
        return $this->belongsToMany(Type::class, 'search_type');
    }
}
