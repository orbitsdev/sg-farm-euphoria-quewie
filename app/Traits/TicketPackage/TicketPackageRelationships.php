<?php

namespace App\Traits\TicketPackage;

use App\Models\Ticket;
use App\Models\Package;
use App\Models\TicketPackageRideAccess;

trait TicketPackageRelationships
{
    protected $table = 'ticket_packages';

    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }

    public function package()
    {
        return $this->belongsTo(Package::class);
    }

    public function rideAccesses()
    {
        return $this->hasMany(TicketPackageRideAccess::class);
    }
}
