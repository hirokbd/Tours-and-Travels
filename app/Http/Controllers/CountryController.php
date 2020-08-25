<?php

namespace App\Http\Controllers;

use Validator;
use App\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index() {
        $country_id = Country::all();
        $title = 'Country';
        $icon = 'mdi mdi-map-marker';
        return view('setting.country', compact( 'country_id', 'title','icon'))->with('no', 1);
    }
    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'description' => 'nullable|max:255',
            'flag' => 'required|max:2048',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $image = $request->file('flag');
        if($image != '') {
            $imageclient = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME) . '-' . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads\flag'), $imageclient);
            Country::create([
                'name' => $request->get('name'),
                'description' => $request->get('description'),
                'flag' => $imageclient
            ]);
        }
        return redirect()->to('/settings/country');
    }

    public function delete($id) {
        $country = Country::findOrFail($id);
        $country->delete();
        return redirect()->to('/settings/country');
    }
}
