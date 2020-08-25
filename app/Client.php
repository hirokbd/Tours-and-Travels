<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    // Mass Asignment
    protected $guarded = [];

    public function agent()
    {
        return $this->belongsTo('App\Agent');
    }
    public function districts() {
        return $this->hasOne('App\Location', 'id');
    }

    public function areas() {
        return $this->hasOne('App\Location', 'parent_id');
    }

    public function visa_app()
    {
        return $this->hasMany('App\VisaApp');
    }

    public function invoice(){
        return $this->hasMany('App\Invoice');
    }
}
