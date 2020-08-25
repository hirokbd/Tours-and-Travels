<?php

namespace App\Http\Controllers;

use App\ForeignOffice;
use Validator;
use App\Country;

use Illuminate\Http\Request;

class ForeignOfficeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $office_id = ForeignOffice::get();
        $title = 'All Foreign Office';
        $icon = 'mdi mdi-earth';
        return view('foreign_office.index', compact('office_id', 'title','icon'))->with('no', 1);
    }

    public function add() {
        $country_id = Country::orderBy('name')->where("status",1)->get();
        $title = 'Add Foreign Office';
        $icon = 'mdi mdi-earth';
        return view('foreign_office.add', compact('country_id', 'title','icon'));
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'email|unique:foreign_offices,email|max:255|required',
            'email2' => 'email|unique:foreign_offices,email2|max:255|nullable',
            'phone' => 'required|min:11|unique:foreign_offices,phone',
            'phone2' => 'min:11|unique:foreign_offices,phone2|nullable',
            'address' => 'max:255|nullable',
            'country_id' => 'required|numeric',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        ForeignOffice::create([
            'name'=> $request->get('name'),
            'email'=> $request->get('email'),
            'email2'=> $request->get('email2'),
            'phone'=> $request->get('phone'),
            'phone2'=> $request->get('phone2'),
            'address'=> $request->get('address'),
            'country_id'=> $request->get('country_id')
        ]);
        return redirect()->to('/office');
    }

    public function edit($id) {
        $country_id = Country::orderBy('name')->where("status",1)->get();
        $for_office = ForeignOffice::findOrFail($id);
        $title = 'Edit Foreign Office';
        $icon = 'mdi mdi-earth';
        return view('foreign_office.edit', compact('for_office', 'country_id','title','icon'));
    }
    public function update(Request $request, $id) {
        $for_office = ForeignOffice::findOrFail($id);

       	$for_office->name = request('name');
        $for_office->email = request('email');
        $for_office->email2 = request('email2');
        $for_office->phone = request('phone');
        $for_office->phone2 = request('phone2');
        $for_office->address = request('address');
        $for_office->country_id = request('country_id');
        $for_office->status = request('status');

        $for_office->update();
        return redirect()->to('/office');
    }

    public function delete($id) {
        $for_office = ForeignOffice::findOrFail($id);
        $for_office->delete();
        return redirect()->to('/office');
    }
}
