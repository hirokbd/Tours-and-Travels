<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Remittance extends Model
{
    // Mass Asignment
    protected $guarded = [];

    public function foffice() 
    {
        return $this->belongsTo('App\ForeignOffice', 'office_id');
    }
    public function income()
    {
        return $this->belongsToMany('App\Income');
    }
}
