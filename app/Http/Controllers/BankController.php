<?php

namespace App\Http\Controllers;

use App\Bank;
use Validator;
use Illuminate\Http\Request;

class BankController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $bank_id = Bank::get();
        $title = 'All Bank';
        $icon = 'mdi mdi-bank';
        return view('bank.index', compact('bank_id', 'title','icon'))->with('no', 1);
    }

    public function add() {
        $title = 'Add Bank';
        $icon = 'mdi mdi-bank';
        return view('bank.add', compact('title','icon'));
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'account_name' => 'required|max:255',
            'account_number' => 'required|max:255',
            'branch' => 'required|max:255',
            'sing_photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048|nullable',
            'op_balance' => 'nullable',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $image = $request->file('sing_photo');
        if($image != '') {
            $imageclient = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME) . '-' . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads\bank'), $imageclient);
            $form_data = array(
                'name' => $request->get('name'),
                'account_name' => $request->get('account_name'),
                'account_number' => $request->get('account_number'),
                'branch' => $request->get('branch'),
                'op_balance' => $request->get('op_balance'),
                'sing_photo' => $imageclient
            );
        } else {
            $form_data = array(
                'name' => $request->get('name'),
                'account_name' => $request->get('account_name'),
                'account_number' => $request->get('account_number'),
                'branch' => $request->get('branch'),
                'op_balance' => $request->get('op_balance')
            );
        }
        Bank::create($form_data);
        return redirect()->to('/bank');
    }

    public function edit($id) {
        $bankId = Bank::findOrFail($id);
        $title = 'Edit Bank';
        $icon = 'mdi mdi-bank';
        return view('bank.edit', compact('bankId','title','icon'));
    }
    public function update(Request $request, $id) {
        $bankId = Bank::findOrFail($id);

        $image_name = $request->hidden_image;
        $image = $request->file('sing_photo');
        if($image != '')
        {
            $imagename = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME) . '-' . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads\bank'), $imagename);

            $bankId->name = request('name');
            $bankId->account_name = request('account_name');
            $bankId->account_number = request('account_number');
            $bankId->branch = request('branch');
            $bankId->op_balance = request('op_balance');
            $bankId->sing_photo = $imagename;
            $bankId->status = request('status');
        }
        else
        {
            $bankId->name = request('name');
            $bankId->account_name = request('account_name');
            $bankId->account_number = request('account_number');
            $bankId->branch = request('branch');
            $bankId->op_balance = request('op_balance');
            $bankId->sing_photo = $image_name;
            $bankId->status = request('status');
        }

        $bankId->update();
        return redirect()->to('/bank');
    }

    public function delete($id) {
        $bankId = Bank::findOrFail($id);
        $bankId->delete();
        return redirect()->to('/bank');
    }
}
