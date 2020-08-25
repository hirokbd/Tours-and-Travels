<?php

namespace App\Http\Controllers;

use App\Agent;
use Validator;
use App\Location;
use Illuminate\Http\Request;

class AgentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $agent_id = Agent::get();
        $title = 'All Agents';
        $icon = 'mdi mdi-account-multiple-outline';
        return view('agent.index', compact('agent_id', 'title','icon'))->with('no', 1);
    }

    public function add() {
        $location_id = Location::where("parent_id",0)->get();
        $title = 'Add Agent';
        $icon = 'mdi mdi-account-multiple-outline';
        return view('agent.add', compact('location_id', 'title','icon'));
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
            'email' => 'email|unique:agents,email|max:255|nullable',
            'phone' => 'required|min:11|unique:agents,phone',
            'phone2' => 'min:11|unique:agents,phone2|nullable',
            'address' => 'max:255|nullable',
            'agent_photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048|nullable',
            'district_id' => 'required|max:255',
            'upazila_id' => 'nullable|max:255',
            'commission' => 'numeric|nullable|max:255',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $image = $request->file('agent_photo');
        if($image != '') {
            $imageagent = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME) . '-' . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads\agents'), $imageagent);
            $form_data = array(
                'name'=> $request->get('name'),
                'agent_id'=> $request->get('agent_id'),
                'email'=> $request->get('email'),
                'phone'=> $request->get('phone'),
                'phone2'=> $request->get('phone2'),
                'address'=> $request->get('address'),
                'district_id'=> $request->get('district_id'),
                'upazila_id'=> $request->get('upazila_id'),
                'commission'=> $request->get('commission'),
                'agent_photo'=> $imageagent

            );
        } else {
            $form_data = array(
                'name'=> $request->get('name'),
                'agent_id'=> $request->get('agent_id'),
                'email'=> $request->get('email'),
                'phone'=> $request->get('phone'),
                'phone2'=> $request->get('phone2'),
                'address'=> $request->get('address'),
                'district_id'=> $request->get('district_id'),
                'upazila_id'=> $request->get('upazila_id'),
                'commission'=> $request->get('commission')
            );
        }
        Agent::create($form_data);
        return redirect()->to('/agent');
    }

    public function edit($id) {
        $location_id = Location::where("parent_id",0)->get();
        $agentId = Agent::findOrFail($id);
        $title = 'Edit Agent';
        $icon = 'mdi mdi-account-multiple-outline';
        return view('agent.edit', compact('agentId', 'location_id','title','icon'));
    }
    public function update(Request $request, $id) {
        $agentId = Agent::findOrFail($id);

        $image_name = $request->hidden_image;
        $image = $request->file('agent_photo');
        if($image != '')
        {
            $imagename = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME) . '-' . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads\agents'), $imagename);

            $agentId->name = request('name');
            $agentId->agent_id = request('agent_id');
            $agentId->email = request('email');
            $agentId->phone = request('phone');
            $agentId->phone2 = request('phone2');
            $agentId->address = request('address');
            $agentId->district_id = request('district_id');
            $agentId->upazila_id = request('upazila_id');
            $agentId->commission = request('commission');
            $agentId->status = request('status');
            $agentId->agent_photo = $imagename;



        }
        else
        {
            $agentId->name = request('name');
            $agentId->agent_id = request('agent_id');
            $agentId->email = request('email');
            $agentId->phone = request('phone');
            $agentId->phone2 = request('phone2');
            $agentId->address = request('address');
            $agentId->district_id = request('district_id');
            $agentId->upazila_id = request('upazila_id');
            $agentId->commission = request('commission');
            $agentId->status = request('status');
            $agentId->agent_photo = $image_name;
            ;
        }

        $agentId->update();
        return redirect()->to('/agent');
    }

    public function delete($id) {
        $agentId = Agent::findOrFail($id);
        $agentId->delete();
        return redirect()->to('/agent');
    }

}
