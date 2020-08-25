<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    // Mass Asignment
    protected $guarded = [];

    public function invoices()
    {
        return $this->belongsTo('App\Invoice', 'inv_id');
    }

    public function remittance()
    {
        return $this->belongsTo('App\Remittance', 'rem_id');
    }
}
