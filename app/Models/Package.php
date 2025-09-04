<?php

namespace App\Models;

use App\Traits\Package\PackageRelationships;
use App\Traits\Package\PackageFunctions;
use App\Traits\Package\PackageCustomAttributes;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use PackageRelationships, PackageCustomAttributes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'code',
        'price',
        'description',
        'is_active',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'price' => 'decimal:2',
        'is_active' => 'boolean',
    ];
}
