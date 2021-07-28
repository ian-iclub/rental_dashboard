<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Tenant extends Model
{
    use HasFactory;

    protected $guarded = ['apartment_id'];

    // -----------------------------------------------------------------------------------------------------------------
    // Relationships from other models
    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @return BelongsTo
     */
    public function apartment():BelongsTo
    {
        return $this->belongsTo(Apartment::class);
    }

    // -----------------------------------------------------------------------------------------------------------------
    // Relationships to other models
    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @return HasOne
     */
    public function tenantApplication():HasOne
    {
        return $this->hasOne(TenantApplication::class);
    }

    /**
     * @return HasOne
     */
    public function employer():HasOne
    {
        return $this->hasOne(Employer::class);
    }

    /**
     * @return HasMany
     */
    public function tenantMates():HasMany
    {
        return $this->hasMany(TenantMate::class);
    }

    /**
     * @return HasMany
     */
    public function rentPayments():HasMany
    {
        return $this->hasMany(RentPayment::class);
    }

    /**
     * @return HasMany
     */
    public function waterPayments():HasMany
    {
        return $this->hasMany(WaterPayment::class);
    }

    /**
     * @return HasMany
     */
    public function deposits():HasMany
    {
        return $this->hasMany(Deposit::class);
    }

    /**
     * @return HasMany
     */
    public function referees():HasMany
    {
        return $this->hasMany(Referee::class);
    }

    /**
     * @return HasMany
     */
    public function documents():HasMany
    {
        return $this->hasMany(Document::class);
    }


}
