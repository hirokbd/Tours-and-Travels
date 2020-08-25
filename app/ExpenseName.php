<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExpenseName extends Model
{
   // Mass Asignment
    protected $guarded = [];

    public function expense(){
        return $this->hasMany('App\Expense');
    }
}
