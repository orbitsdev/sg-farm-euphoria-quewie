<?php

namespace App\Traits\Package;

trait PackageCustomAttributes
{
    public function getFormattedPriceAttribute()
    {
        return number_format($this->price, 2);
    }
}
