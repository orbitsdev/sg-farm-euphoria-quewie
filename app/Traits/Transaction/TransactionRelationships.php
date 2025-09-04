<?php

namespace App\Traits\Transaction;

use App\Models\AppliedPromo;
use App\Models\Ticket;
use App\Models\User;

trait TransactionRelationships
{

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }

    public function promos()
    {
        return $this->morphMany(AppliedPromo::class, 'promotable');
    }
}
