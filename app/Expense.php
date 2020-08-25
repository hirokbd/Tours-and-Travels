<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    // Mass Asignment
    protected $guarded = [];

    public function exname()
    {
        return $this->belongsTo('App\ExpenseName', 'expense_id');
    }

    public function income()
    {
        return $this->belongsToMany('App\Invoice');
    }
}
