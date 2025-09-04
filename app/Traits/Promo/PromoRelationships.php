<?php

namespace App\Traits\Promo;

use App\Models\AppliedPromo;

trait PromoRelationships
{
    public function appliedPromos()
    {
        return $this->hasMany(AppliedPromo::class);
    }
}
