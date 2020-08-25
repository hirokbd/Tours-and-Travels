<?php

namespace App\Http\Controllers;

use Validator;
use App\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index() {
        $package = Package::all();
        $title = 'Package';
        $icon = 'mdi mdi-package-variant';
        return view('package.package', compact( 'package', 'title','icon'))->with('no', 1);
    }
    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'pack_name' => 'required|max:255',
            'pack_desc' => 'nullable|max:255',
            'pack_amount' => 'required|numeric',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        Package::create([
            'pack_name' => $request->get('pack_name'),
            'pack_desc' => $request->get('pack_desc'),
            'pack_amount' => $request->get('pack_amount')
        ]);
        return redirect()->to('/package');
    }

    public function delete($id) {
        $package = Package::findOrFail($id);
        $package->delete();
        return redirect()->to('/package');
    }
}
