<?php

namespace App\Traits\Ride;

use App\Models\Package;
use App\Models\TicketPackageRideAccess;
use App\Models\RideScan;
use App\Models\Gate;
use App\Models\PackageRide;

trait RideRelationships
{
    /**
     * Get the packages that include this ride.
     */
    public function packages()
    {
        return $this->belongsToMany(Package::class, 'package_rides')
                    ->withTimestamps();
    }
    public function packagesRides()
    {
        return $this->hasMany(PackageRide::class);
    }

    public function ticketPackageAccesses()
    {
        return $this->hasMany(TicketPackageRideAccess::class);
    }

    public function rideScans()
    {
        return $this->hasMany(RideScan::class);
    }

    public function gates()
    {
        return $this->hasMany(Gate::class);
    }
}
