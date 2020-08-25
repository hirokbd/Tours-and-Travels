<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
     // Mass Asignment
    protected $guarded = [];

    public function parent() {
        return $this->hasOne('App\Location', 'id', 'district_id');
    }

    public function children() {
        return $this->hasOne('App\Location', 'id', 'upazila_id');
    }

    public function client(){
        return $this->hasMany('App\Client');
    }
}
