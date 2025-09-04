<?php

namespace App\Traits\TicketPackageRideAccess;

use App\Models\TicketPackage;
use App\Models\Ride;
use Illuminate\Database\Eloquent\Factories\HasFactory;

trait TicketPackageRideAccessRelationships
{
    use HasFactory;

    public function ticketPackage()
    {
        return $this->belongsTo(TicketPackage::class);
    }

    public function ride()
    {
return $this->belongsTo(Ride::class);
    }
}
