<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentType extends Model
{
    // Mass Asignment
    protected $guarded = [];

    public function visa_app(){
        return $this->hasMany('App\VisaApp');
    }
}
