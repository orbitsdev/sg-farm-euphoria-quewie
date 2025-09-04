<?php

namespace App\Traits\AppliedPromo;

trait AppliedPromoCustomAttributes
{
    public function getDiscountAmountAttribute()
    {
        return $this->promo->discount_amount;
    }
}
