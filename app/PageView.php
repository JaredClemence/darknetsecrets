<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PageView extends Model
{
    protected $fillable = [
        'remote_addr',
        'user_agent',
        'utm_campaign',
        'utm_source',
        'utm_medium',
        'server_global'
    ];
    
    public function setServerGlobalAttribute( $value ){
        $this->attributes['server_global'] = json_encode($value, JSON_PRETTY_PRINT);
    }
    
    public function getServerGlobalAttribute(){
        $value = $this->attributes['server_global'];
        if( json_decode( $value ) == false ){
            $value = "{}";
        }
        return (array)json_decode($value);
    }
}
