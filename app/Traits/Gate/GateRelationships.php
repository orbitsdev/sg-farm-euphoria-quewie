<?php

namespace App\Traits\Gate;

use App\Models\Ride;
use App\Models\RideScan;
use App\Models\GateLog;

trait GateRelationships
{
    public function ride()
    {
        return $this->belongsTo(Ride::class);
    }


    public function logs()
    {
        return $this->hasMany(GateLog::class);
    }
}

