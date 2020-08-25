<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    // Mass Asignment
    protected $guarded = [];

    public function clients() 
    {
        return $this->belongsTo('App\Client', 'client_id');
    }
    public function country()
    {
        return $this->belongsTo('App\Country', 'country_id');
    }

    public function visatype()
    {
        return $this->hasOne('App\VisaType', 'id');
    }
    public function agents()
    {
        return $this->belongsTo('App\Agent', 'agent_id');
    }
    public function invinfo()
    {
        return $this->belongsToMany('App\InvoiceInfo', 'invoice_id');
    }

    public function expenses()
    {
        return $this->belongsToMany('App\Expense');
    }

    public function income(){
        return $this->belongsToMany('App\Income');
    }

}
