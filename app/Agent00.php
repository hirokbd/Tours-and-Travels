<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    // Mass Asignment
    protected $guarded = [];

    public function parent() {
        return $this->hasOne('App\Location', 'id');
    }

    public function children() {
        return $this->hasOne('App\Location', 'parent_id');
    }

    public function client(){
        return $this->hasMany('App\Client');
    }
}
