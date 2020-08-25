<?php

namespace App\Http\Controllers;

use App\Agent;
use App\Client;
use App\Location;
use Validator;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index() {
        $client_id = Client::get();
        $title = 'All Passenger';
        $icon = 'mdi mdi-account-outline';
        return view('passenger.index', compact('title','icon', 'client_id'))->with('no', 1);
    }

    public function add() {
        $location_id = Location::where("parent_id",0)->get();
        $agent_id = Agent::where("status",1)->get();
        $title = 'Add Passenger';
        $icon = 'mdi mdi-account-outline';
        return view('passenger.add', compact('location_id', 'agent_id', 'title','icon'));
    }
    public function getSubLocation(Request $request)
    {
        $upazila = Location::where("parent_id",$request->district_id)
            ->pluck("name","id");
        return response()->json($upazila);
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'agent_id' => 'required|max:255',
            'email' => 'required|email|unique:clients,email|max:255',
            'phone' => 'required|min:11|unique:clients,phone',
            'phone2' => 'min:11|unique:clients,phone2|nullable',
            'address' => 'max:255|nullable',
            'client_photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048|nullable',
            'district_id' => 'required|max:255',
            'upazila_id' => 'required|max:255',
            'passport_no' => 'required|max:255',
            'birth_date' => 'required|max:255',
            'passport_issue' => 'required|max:255',
            'passport_expired' => 'required|max:255',
            'em_name' => 'nullable|max:255',
            'em_email' => 'nullable|email|max:255',
            'em_phone' => 'nullable|min:11',
            'em_insurance' => 'nullable|max:255',
            'em_insurance_no' => 'nullable|max:255',
            'em_company_phone' => 'nullable|min:11'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $image = $request->file('client_photo');
        if($image != '') {
            $imageclient = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME) . '-' . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads\clients'), $imageclient);
            $form_data = array(
                'name' => $request->get('name'),
                'agent_id' => $request->get('agent_id'),
                'email' => $request->get('email'),
                'phone' => $request->get('phone'),
                'phone2' => $request->get('phone2'),
                'address' => $request->get('address'),
                'client_photo' => $imageclient,
                'district_id' => $request->get('district_id'),
                'upazila_id' => $request->get('upazila_id'),
                'passport_no' => $request->get('passport_no'),
                'birth_date' => $request->get('birth_date'),
                'passport_issue' => $request->get('passport_issue'),
                'passport_expired' => $request->get('passport_expired'),
                'em_name' => $request->get('em_name'),
                'em_email' => $request->get('em_email'),
                'em_phone' => $request->get('em_phone'),
                'em_insurance' => $request->get('em_insurance'),
                'em_insurance_no' => $request->get('em_insurance_no'),
                'em_company_phone' => $request->get('em_company_phone')
            );
        } else {
            $form_data = array(
                'name' => $request->get('name'),
                'agent_id' => $request->get('agent_id'),
                'email' => $request->get('email'),
                'phone' => $request->get('phone'),
                'phone2' => $request->get('phone2'),
                'address' => $request->get('address'),
                'district_id' => $request->get('district_id'),
                'upazila_id' => $request->get('upazila_id'),
                'passport_no' => $request->get('passport_no'),
                'birth_date' => $request->get('birth_date'),
                'passport_issue' => $request->get('passport_issue'),
                'passport_expired' => $request->get('passport_expired'),
                'em_name' => $request->get('em_name'),
                'em_email' => $request->get('em_email'),
                'em_phone' => $request->get('em_phone'),
                'em_insurance' => $request->get('em_insurance'),
                'em_insurance_no' => $request->get('em_insurance_no'),
                'em_company_phone' => $request->get('em_company_phone')
            );
        }
        Client::create($form_data);
        return redirect()->to('/passenger');
    }


    public function edit($id) {
        $location_id = Location::where("parent_id",0)->get();
        $areas = Location::has('parent')->get();
        $agent_id = Agent::get();
        $clientId = Client::findOrFail($id);
        $title = 'Edit Passenger';
        $icon = 'mdi mdi-account-outline';
        return view('passenger.edit', compact( 'areas', 'clientId', 'agent_id', 'location_id','title','icon'));
    }
    public function update(Request $request, $id) {
        $clientId = Client::findOrFail($id);
        $image_name = $request->hidden_image;
        $image = $request->file('client_photo');
        if($image != '')
        {
            $imagename = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME) . '-' . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads\clients'), $imagename);

            $clientId->name = request('name');
            $clientId->agent_id = request('agent_id');
            $clientId->email = request('email');
            $clientId->phone = request('phone');
            $clientId->phone2 = request('phone2');
            $clientId->address = request('address');
            $clientId->client_photo = $imagename;
            $clientId->district_id = request('district_id');
            $clientId->upazila_id = request('upazila_id');
            $clientId->passport_no = request('passport_no');
            $clientId->birth_date = request('birth_date');
            $clientId->passport_issue = request('passport_issue');
            $clientId->passport_expired = request('passport_expired');
            $clientId->em_name = request('em_name');
            $clientId->em_email = request('em_email');
            $clientId->em_phone = request('em_phone');
            $clientId->em_insurance = request('em_insurance');
            $clientId->em_insurance_no = request('em_insurance_no');
            $clientId->em_company_phone = request('em_company_phone');
            $clientId->status = request('status');
        }
        else
        {
            $clientId->name = request('name');
            $clientId->agent_id = request('agent_id');
            $clientId->email = request('email');
            $clientId->phone = request('phone');
            $clientId->phone2 = request('phone2');
            $clientId->address = request('address');
            $clientId->client_photo = $image_name;
            $clientId->district_id = request('district_id');
            $clientId->upazila_id = request('upazila_id');
            $clientId->passport_no = request('passport_no');
            $clientId->birth_date = request('birth_date');
            $clientId->passport_issue = request('passport_issue');
            $clientId->passport_expired = request('passport_expired');
            $clientId->em_name = request('em_name');
            $clientId->em_email = request('em_email');
            $clientId->em_phone = request('em_phone');
            $clientId->em_insurance = request('em_insurance');
            $clientId->em_insurance_no = request('em_insurance_no');
            $clientId->em_company_phone = request('em_company_phone');
            $clientId->status = request('status');
        }

            $clientId->update();

        return redirect()->to('/passenger');
    }

    public function delete($id) {
        $clientId = Client::findOrFail($id);
        $clientId->delete();
        return redirect()->to('/passenger');
    }

    public function view($id) {
        $clientId = Client::findOrFail($id);
        $title = 'View Passenger';
        $icon = 'mdi mdi-account-outline';
        return view('passenger.view', compact( 'clientId', 'title','icon'))->with('no', 1);
    }
}
