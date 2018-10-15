<?php

namespace App\Campaign;

use Illuminate\Database\Eloquent\Model;
use App\Campaign\Promotion;

class Referrer extends Model
{
    protected $fillable = [
        'promotion_id',
        'email',
        'verified'
    ];
    
    public function promotion(){
        return $this->belongsTo(Promotion::class);
    }
}
