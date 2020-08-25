<?php

namespace App\Http\Controllers;

use Validator;
use App\Client;
use App\Country;
use App\PaymentType;
use App\VisaApp;
use App\VisaType;

use Illuminate\Http\Request;

class VisaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $visa_app = VisaApp::get();
        $title = 'All Visa Application';
        $icon = 'mdi mdi-web';
        return view('visa.index', compact('visa_app', 'title','icon'))->with('no', 1);
    }

    public function add() {
        $country_id = Country::where("status",1)->get();
        $client_id = Client::where("status",1)->get();
        $visa_id = VisaType::where("status",1)->get();
        $payment_id = PaymentType::where("status",1)->get();
        $title = 'Add Visa Application';
        $icon = 'mdi mdi-web';
        return view('visa.add', compact('country_id', 'client_id', 'visa_id', 'payment_id', 'title','icon'));
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'client_id' => 'required',
            'visa_type' => 'required',
            'country_id' => 'required',
            'visa_duration' => 'required|max:255',
            'visa_duration_type' => 'required|max:255',
            'app_date' => 'nullable|max:255',
            'processing_time' => 'nullable|max:255',
            'down_payment' => 'nullable|max:255',
            'down_payment_type' => 'nullable|max:255',
            'app_fee' => 'nullable|max:255',
            'app_fee_type' => 'nullable|max:255',
            'document' => 'nullable|max:255',
            'remarks' => 'nullable|max:255',
            'status' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $image = $request->file('document');
        if($image != '') {
            $imagevisa = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME) . '-' . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads\documents'), $imagevisa);
            $form_data = array(
                'client_id'=> $request->get('client_id'),
                'visa_type'=> $request->get('visa_type'),
                'country_id'=> $request->get('country_id'),
                'visa_duration'=> $request->get('visa_duration'),
                'visa_duration_type'=> $request->get('visa_duration_type'),
                'app_date'=> $request->get('app_date'),
                'processing_time'=> $request->get('processing_time'),
                'down_payment'=> $request->get('down_payment'),
                'down_payment_type'=> $request->get('down_payment_type'),
                'app_fee'=> $request->get('app_fee'),
                'app_fee_type'=> $request->get('app_fee_type'),
                'remarks'=> $request->get('remarks'),
                'status'=> $request->get('status'),
                'document'=> $imagevisa

            );
        } else {
            $form_data = array(
                'client_id'=> $request->get('client_id'),
                'visa_type'=> $request->get('visa_type'),
                'country_id'=> $request->get('country_id'),
                'visa_duration'=> $request->get('visa_duration'),
                'visa_duration_type'=> $request->get('visa_duration_type'),
                'app_date'=> $request->get('app_date'),
                'processing_time'=> $request->get('processing_time'),
                'down_payment'=> $request->get('down_payment'),
                'down_payment_type'=> $request->get('down_payment_type'),
                'app_fee'=> $request->get('app_fee'),
                'app_fee_type'=> $request->get('app_fee_type'),
                'remarks'=> $request->get('remarks'),
                'status'=> $request->get('status')
            );
        }
        VisaApp::create($form_data);
        return redirect()->to('/visa');
    }

    public function edit($id) {
        $visaId = VisaApp::findOrFail($id);
        $country_id = Country::where("status",1)->get();
        $client_id = Client::where("status",1)->get();
        $visa_id = VisaType::where("status",1)->get();
        $payment_id = PaymentType::where("status",1)->get();
        $title = 'Edit Visa Application';
        $icon = 'mdi mdi-web';
        return view('visa.edit', compact('visaId', 'country_id', 'client_id', 'visa_id', 'payment_id', 'title','icon'));
    }
    public function update(Request $request, $id) {
        $visaId = VisaApp::findOrFail($id);

        $image_name = $request->hidden_image;
        $image = $request->file('document');
        if($image != '')
        {
            $imagename = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME) . '-' . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads\documents'), $imagename);

            $visaId->client_id = request('client_id');
            $visaId->visa_type = request('visa_type');
            $visaId->country_id = request('country_id');
            $visaId->visa_duration = request('visa_duration');
            $visaId->visa_duration_type = request('visa_duration_type');
            $visaId->app_date = request('app_date');
            $visaId->processing_time = request('processing_time');
            $visaId->down_payment = request('down_payment');
            $visaId->down_payment_type = request('down_payment_type');
            $visaId->app_fee = request('app_fee');
            $visaId->app_fee_type = request('app_fee_type');
            $visaId->remarks = request('remarks');
            $visaId->status = request('status');
            $visaId->document = $imagename;

        }
        else
        {
            $visaId->client_id = request('client_id');
            $visaId->visa_type = request('visa_type');
            $visaId->country_id = request('country_id');
            $visaId->visa_duration = request('visa_duration');
            $visaId->visa_duration_type = request('visa_duration_type');
            $visaId->app_date = request('app_date');
            $visaId->processing_time = request('processing_time');
            $visaId->down_payment = request('down_payment');
            $visaId->down_payment_type = request('down_payment_type');
            $visaId->app_fee = request('app_fee');
            $visaId->app_fee_type = request('app_fee_type');
            $visaId->remarks = request('remarks');
            $visaId->status = request('status');
            $visaId->agent_photo = $image_name;
            ;
        }

        $visaId->update();
        return redirect()->to('/visa');
    }

    public function delete($id) {
        $visaId = VisaApp::findOrFail($id);
        $visaId->delete();
        return redirect()->to('/visa');
    }
}
