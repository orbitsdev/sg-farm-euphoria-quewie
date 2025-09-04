<?php

namespace App\Traits\RideScan;

use App\Models\Gate;
use App\Models\Ride;
use App\Models\Ticket;

trait RideScanRelationships
{

    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }

    public function ride()
    {
        return $this->belongsTo(Ride::class);
    }

    public function gate()
    {
        return $this->belongsTo(Gate::class);
    }
}
