<?php

namespace App\Http\Controllers;

use Validator;
use App\ExpenseName;

use Illuminate\Http\Request;

class ExpenseNameController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }
    public function index() {
        $expense_name = ExpenseName::all();
        $title = 'Expense Head';
        $icon = 'mdi mdi-cash';
        return view('setting.expense', compact( 'expense_name', 'title','icon'))->with('no', 1);
    }
    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'ex_name' => 'required|max:255',
            'ex_desc' => 'nullable|max:255',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        ExpenseName::create([
            'ex_name' => $request->get('ex_name'),
            'ex_desc' => $request->get('ex_desc')
        ]);
        return redirect()->to('/settings/exname');
    }

    public function delete($id) {
        $expense_name = ExpenseName::findOrFail($id);
        $expense_name->delete();
        return redirect()->to('/settings/exname');
    }
}
