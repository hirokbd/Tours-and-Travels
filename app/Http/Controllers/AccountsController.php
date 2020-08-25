<?php

namespace App\Http\Controllers;

use App\Income;
use App\Expense;


use Illuminate\Http\Request;

class AccountsController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }
    public function index() {
        $invoice = Income::get();
        $gtotal = Income::sum('pay_amount');
        $expense = Expense::get();
        $etotal = Expense::sum('amount');
        $title = 'Income Statement';
        $icon = 'mdi mdi-trophy-variant';
        return view('accounts.index', compact( 'invoice', 'expense', 'gtotal', 'etotal', 'title','icon'))->with('no', 1);
    }

    public function incomeSearch(Request $request) {
    	//$localtime = now();

    	$start = date("Y-m-d", strtotime($request->from_date));
    	$end = date("Y-m-d", strtotime($request->to_date));

       $invoice_search = Invoice::whereBetween('invoice_date', array($start, $end))
         ->get();
       $expense_search = Expense::whereBetween('ex_date', array($start, $end))
         ->get();
       $in_total = $invoice_search->sum('grand_total');

       $ex_total = $expense_search->sum('amount');

       $start_date = date("d-m-Y", strtotime($start));
    	$end_date = date("d-m-Y", strtotime($end));

       $title = 'Income Statement';
        $icon = 'mdi mdi-trophy-variant';

      return view('accounts.search', compact( 'invoice_search', 'expense_search', 'in_total', 'ex_total', 'start_date', 'end_date', 'title','icon'));
    }

    

}
