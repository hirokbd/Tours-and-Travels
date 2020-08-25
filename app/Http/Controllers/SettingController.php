<?php

namespace App\Http\Controllers;

use App\CompanyInfo;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index() {
        $companyinfo = CompanyInfo::all();
        $title = 'Company Setting';
        $icon = 'mdi mdi-settings';
        return view('setting.view', compact( 'companyinfo', 'title','icon'))->with('no', 1);
    }

    public function edit($id) {
        $company_info = CompanyInfo::findOrFail($id);
        $title = 'Edit Company Info';
        $icon = 'mdi mdi-settings';
        return view('setting.edit', compact('company_info','title','icon'));
    }
    public function update(Request $request, $id) {
        $companyInfo = CompanyInfo::findOrFail($id);

        $image_name = $request->hidden_image;
        $image = $request->file('logo');
        if($image != '')
        {
            $imagename = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME) . '-' . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads\company'), $imagename);

            $companyInfo->name = request('name');
            $companyInfo->tagline = request('tagline');
            $companyInfo->description = request('description');
            $companyInfo->email = request('email');
            $companyInfo->email2 = request('email2');
            $companyInfo->phone = request('phone');
            $companyInfo->phone2 = request('phone2');
            $companyInfo->address = request('address');
            $companyInfo->website = request('website');
            $companyInfo->start_date = request('start_date');
            $companyInfo->logo = $imagename;



        }
        else
        {
            $companyInfo->name = request('name');
            $companyInfo->tagline = request('tagline');
            $companyInfo->description = request('description');
            $companyInfo->email = request('email');
            $companyInfo->email2 = request('email2');
            $companyInfo->phone = request('phone');
            $companyInfo->phone2 = request('phone2');
            $companyInfo->address = request('address');
            $companyInfo->website = request('website');
            $companyInfo->start_date = request('start_date');
            $companyInfo->logo = $image_name;
            ;
        }

        $companyInfo->update();
        return redirect()->to('/settings');
    }
}
