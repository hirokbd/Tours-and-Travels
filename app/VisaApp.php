<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VisaApp extends Model
{
    // Mass Asignment
    protected $guarded = [];

    public function visatype()
    {
        return $this->hasOne('App\VisaType', 'id');
    }

    public function country()
    {
        return $this->belongsTo('App\Country');
    }



    public function paytype()
    {
        return $this->belongsTo('App\PaymentType', 'id');
    }

    public function clients()
    {
        return $this->belongsTo('App\Client', 'id');
    }
}
