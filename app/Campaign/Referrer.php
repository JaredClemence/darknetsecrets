<?php

namespace App\Campaign;

use Illuminate\Database\Eloquent\Model;

class Referrer extends Model
{
    protected $fillable = [
        'promotion_id',
        'email',
        'verified'
    ];
}
