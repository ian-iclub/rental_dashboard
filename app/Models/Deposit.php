<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deposit extends Model
{
    use HasFactory;

    protected $guarded = ['tenant_id'];

    protected $casts = [
        'date_paid' => 'datetime:d-m-Y'
    ];
}
