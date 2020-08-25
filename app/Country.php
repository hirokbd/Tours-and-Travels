<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    // Mass Asignment
    protected $guarded = [];

    public function visa_app(){
        return $this->hasMany('App\VisaApp');
    }

    public function invoice(){
        return $this->hasMany('App\Invoice');
    }

    public function office(){
        return $this->hasMany('App\Invoice');
    }
}
