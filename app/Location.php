<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    // Mass Asignment
    protected $guarded = [];

    public function parent() {
        return $this->belongsTo('App\Location', 'parent_id');
    }

    public function children() {
        return $this->hasMany('App\Location', 'parent_id');
    }

    public function agents() {
        return $this->hasMany('App\Agent', 'id');
    }

    public function clients() {
        return $this->hasMany('App\Client', 'id');
    }
}
