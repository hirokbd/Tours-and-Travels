<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Client;
use App\Agent;
use App\Invoice;
use App\Income;
use App\Expense;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function dashboard()
    {
        $user = User::get()->count();
        $agent = Agent::get()->count();
        $client = Client::get()->count();
        $invoice = Invoice::get()->count();

        $gtotal = Income::sum('pay_amount');
        $etotal = Expense::sum('amount');
        $title = 'Dashboard';
        $icon = 'mdi mdi-gauge';
        return view('layouts.index', compact('title', 'icon', 'user', 'agent', 'client', 'invoice', 'gtotal', 'etotal'));
    }



}
