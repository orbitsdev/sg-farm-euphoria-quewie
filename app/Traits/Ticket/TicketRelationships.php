<?php

namespace App\Traits\Ticket;

use App\Models\AppliedPromo;
use App\Models\Package;
use App\Models\RideScan;
use App\Models\Transaction;
use App\Models\TicketPackage;

trait TicketRelationships
{

public function transaction()
{
    return $this->belongsTo(Transaction::class, 'transactions_id');
}

public function packages()
{
    return $this->belongsToMany(Package::class, 'ticket_packages')
                ->using(TicketPackage::class)
                ->withTimestamps();
}

public function rideScans()
{
    return $this->hasMany(RideScan::class);
}

public function promos()
{
    return $this->morphMany(AppliedPromo::class, 'promotable');
}
}
