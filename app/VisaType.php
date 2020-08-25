<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VisaType extends Model
{
    // Mass Asignment
    protected $guarded = [];

    public function visa_app(){
        return $this->hasMany('App\VisaApp');
    }

    public function invoice(){
        return $this->hasMany('App\Invoice');
    }
}
