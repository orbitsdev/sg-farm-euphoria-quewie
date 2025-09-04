<?php

namespace App\Traits\Ride;

trait RideCustomAttributes
{
    /**
     * Get the status label attribute.
     */
    public function getStatusLabelAttribute()
    {
        return $this->is_active ? 'Active' : 'Inactive';
    }
    
    /**
     * Get the formatted price attribute.
     */
    public function getFormattedPriceAttribute()
    {
        // Get the individual package price for this ride
        $package = $this->packages()->where('name', $this->name)->first();
        return $package ? 'S$' . number_format($package->price, 2) : 'N/A';
    }
}
