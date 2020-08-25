<?php

namespace App\Http\Controllers;

use Validator;
use App\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index() {
        $location_id = Location::where("parent_id",0)->get();
        $location = Location::select('*')->where('parent_id','=' , 0)->get();
        $sub_location = Location::select('*')->where('parent_id', '!=' , 0)->get();
        $title = 'Location';
        $icon = 'mdi mdi-map-marker';
        return view('agent.location', compact('location_id', 'location', 'sub_location', 'title','icon'))->with('no', 1);
    }
    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'parent_id' => 'nullable',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        Location::create([
            'name'=> $request->get('name'),
            'parent_id'=> $request->get('parent_id')
        ]);
        return redirect()->to('/location');
    }
    public function sub_delete($id) {
        $location = Location::findOrFail($id);
        $location->delete();
        return redirect()->to('/location');
    }
    public function delete($id) {
        $location = Location::findOrFail($id);
        $location->delete();
        $location->where('parent_id',$id)->delete();
        return redirect()->to('/location');
    }
}