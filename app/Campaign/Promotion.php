<?php

namespace App\Campaign;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model {
    protected $fillable = [
        'code',
        'name',
        'active'
    ];
    protected $casts = [
        'active'=>'boolean'
    ];
    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName() {
        return 'code';
    }
}
