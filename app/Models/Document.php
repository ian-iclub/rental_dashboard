<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Document extends Model
{
    use HasFactory;

    protected $guarded = ['tenant_id'];

    /**
     * @return BelongsTo
     */
    public function tenant():BelongsTo
    {
        return $this->belongsTo(Tenant::class);
    }
}
