<?php

namespace App\Http\Controllers;

use Validator;
use App\VisaType;
use Illuminate\Http\Request;

class VisaTypeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index() {
        $visa_type = VisaType::all();
        $title = 'Visa Type';
        $icon = 'mdi mdi-cash-multiple';
        return view('setting.visa-type', compact( 'visa_type', 'title','icon'))->with('no', 1);
    }
    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'description' => 'nullable|max:255',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
            VisaType::create([
                'name' => $request->get('name'),
                'description' => $request->get('description')
            ]);
        return redirect()->to('/settings/visa-type');
    }

    public function delete($id) {
        $visa_type = VisaType::findOrFail($id);
        $visa_type->delete();
        return redirect()->to('/settings/visa-type');
    }
}
