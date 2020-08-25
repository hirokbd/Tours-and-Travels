<?php

namespace App\Http\Controllers;

use App\Remittance;
use Validator;
use App\ForeignOffice;
use App\Income;

use Illuminate\Http\Request;

class RemittanceController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }
    public function index() {
        $remittance = Remittance::all();
        $for_office = ForeignOffice::where('status', 1)->get();
        $title = 'Remittance';
        $icon = 'mdi mdi-map-marker';
        return view('foreign_office.remittance', compact( 'remittance', 'for_office', 'title','icon'))->with('no', 1);
    }
    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'office_id' => 'required|numeric',
            'rem_amount' => 'required|numeric',
            'note' => 'nullable|max:255',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $remittance= new Remittance;
        $remittance->office_id=$request->office_id;
        $remittance->rem_amount=$request->rem_amount;
        $remittance->note=$request->note;

        if($remittance->save()){
            $id=$remittance->id;
            $data = array(
                'rem_id'=>$id,
                'pay_amount'=>$request->rem_amount,
            );
            Income::insert($data);
        }
        return redirect()->to('/office/remittance');
    }

    public function delete($id) {
        $remittance = Remittance::findOrFail($id);
        $remittance->delete();
        return redirect()->to('/office/remittance');
    }
}
