<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvoiceInfo extends Model
{
    // Mass Asignment
    protected $guarded = [];

    public function invoice()
    {
        return $this->hasMany('App\Invoice', 'invoice_id');
    }

    public function packages()
    {
        return $this->belongsTo('App\Package', 'invoice_id');
    }
}
