<?php

namespace App\Http\Controllers;

use App\PaymentType;
use Validator;
use Illuminate\Http\Request;

class PaymentTypeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index() {
        $payment_type = PaymentType::all();
        $title = 'Currency Type';
        $icon = 'mdi mdi-cash-multiple';
        return view('setting.payment-type', compact( 'payment_type', 'title','icon'))->with('no', 1);
    }
    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'description' => 'nullable|max:255',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        PaymentType::create([
            'name' => $request->get('name'),
            'description' => $request->get('description')
        ]);
        return redirect()->to('/settings/currency-type');
    }

    public function delete($id) {
        $payment_type = PaymentType::findOrFail($id);
        $payment_type->delete();
        return redirect()->to('/settings/currency-type');
    }
}
