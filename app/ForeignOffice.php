<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ForeignOffice extends Model
{
    // Mass Asignment
    protected $guarded = [];

     public function country()
    {
        return $this->belongsTo('App\Country', 'country_id');
    }

    public function remittances(){
        return $this->hasMany('App\Remittance');
    }
}
