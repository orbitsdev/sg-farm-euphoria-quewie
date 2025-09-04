<?php

namespace App\Traits\Package;

use App\Models\Ride;
use App\Models\Ticket;

trait PackageRelationships
{
    public function rides()
    {
        return $this->belongsToMany(Ride::class, 'package_rides')
                    ->withTimestamps();
    }

    public function tickets()
    {
        return $this->belongsToMany(Ticket::class, 'ticket_packages')
                    ->withTimestamps();
    }
}
