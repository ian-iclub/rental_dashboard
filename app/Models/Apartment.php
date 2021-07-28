<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Apartment extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * @return HasOne
     */
    public function tenant():HasOne
    {
        return $this->hasOne(Tenant::class);
    }
}
