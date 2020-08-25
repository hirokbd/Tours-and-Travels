<?php

namespace App\Http\Controllers;

use Validator;
use App\ExpenseName;
use App\Expense;
use App\Bank;

use Illuminate\Http\Request;

class ExpenseController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $expense = Expense::orderBy('id', 'desc')->get();
        $title = 'All Expense';
        $icon = 'mdi mdi-cash';
        return view('accounts.all_expense', compact( 'expense', 'title','icon'))->with('no', 1);
    }

    public function add() {
        $expense_name = ExpenseName::all();
        $bank = Bank::where("status",1)->get();
        $title = 'Add Expense';
        $icon = 'mdi mdi-cash';
        return view('accounts.expense', compact( 'expense_name', 'bank', 'title','icon'))->with('no', 1);
    }
    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'expense_id' => 'required|max:255',
            'payment_type' => 'required|max:255',
            'bank_id' => 'nullable|max:255',
            'amount' => 'required|max:255',
            'ex_date' => 'required|max:255',
            'ex_note' => 'nullable',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        Expense::create([
            'expense_id' => $request->get('expense_id'),
            'payment_type' => $request->get('payment_type'),
            'bank_id' => $request->get('bank_id'),
            'amount' => $request->get('amount'),
            'ex_date' => date('Y-m-d',strtotime($request->get('ex_date'))),
            'ex_note' => $request->get('ex_note')
        ]);
        return redirect()->to('/accounts/expense');
    }

    public function delete($id) {
        $expense = Expense::findOrFail($id);
        $expense->delete();
        return redirect()->to('/accounts/expense');
    }
}
