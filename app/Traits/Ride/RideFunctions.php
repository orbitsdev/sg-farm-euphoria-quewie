<?php

namespace App\Traits\Ride;

trait RideFunctions
{
    /**
     * Scope a query to only include active rides.
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
    
    /**
     * Check if the ride is included in a specific package.
     */
    public function isInPackage($packageId)
    {
        return $this->packages()->where('packages.id', $packageId)->exists();
    }
}
