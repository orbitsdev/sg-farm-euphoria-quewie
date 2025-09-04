<?php

namespace App\Models;

use App\Traits\Ride\RideRelationships;
use App\Traits\Ride\RideFunctions;
use App\Traits\Ride\RideCustomAttributes;
use Illuminate\Database\Eloquent\Model;

class Ride extends Model
{
    use RideRelationships, RideFunctions, RideCustomAttributes;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
        'is_active',
    ];
    
    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'is_active' => 'boolean',
    ];
}
