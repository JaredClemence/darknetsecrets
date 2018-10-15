<?php

namespace App\Campaign;

use Illuminate\Database\Eloquent\Model;
use App\Campaign\Promotion;

/**
 * @property integer $promotion_id
 * @property string $email
 * @property boolean $verified
 * @property string $secure_token
 */
class Referrer extends Model
{
    protected $fillable = [
        'promotion_id',
        'email',
        'verified'
    ];
    
    protected $casts = [
        'verified'=>'boolean'
    ];
    
    public function promotion(){
        return $this->belongsTo(Promotion::class);
    }
    
    public function referredBy(){
        return $this->belongsTo(Referrer::class,'referred_by');
    }
}
