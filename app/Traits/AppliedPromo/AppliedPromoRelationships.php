<?php

namespace App\Traits\AppliedPromo;

use App\Models\Promo;

trait AppliedPromoRelationships
{
    public function promotable()
    {
        return $this->morphTo();
    }

    public function promo()
    {
        return $this->belongsTo(Promo::class);
    }
}
