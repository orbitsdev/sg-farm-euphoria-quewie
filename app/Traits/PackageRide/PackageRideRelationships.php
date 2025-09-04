<?php

namespace App\Traits\PackageRide;

use App\Models\Package;
use App\Models\Ride;

trait PackageRideRelationships
{
    protected $table = 'package_rides';

    public function package()
    {
        return $this->belongsTo(Package::class);
    }

    public function ride()
    {
        return $this->belongsTo(Ride::class);
    }
}
