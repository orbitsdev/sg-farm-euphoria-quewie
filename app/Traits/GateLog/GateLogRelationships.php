<?php

namespace App\Traits\GateLog;

use App\Models\Gate;
use App\Models\Ride;
use App\Models\Ticket;

trait GateLogRelationships
{
    public function gate()
    {
        return $this->belongsTo(Gate::class);
    }

    public function ride()
    {
        return $this->belongsTo(Ride::class);
    }

    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }
}
