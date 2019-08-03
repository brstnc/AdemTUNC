<?php

namespace App\Http\Controllers\Admin;

use App\Models\Company;
use App\Models\UserDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CompanyController extends Controller
{
    public function form()
    {
        $company_detail = Company::all()->first();
        return view('admin.company.index', compact('company_detail'));
    }

    public function form_post(Request $request)
    {
        $company_detail = Company::all()->first();
        $company_detail->name = $request->name;
        $company_detail->address = $request->address;
        $company_detail->phone = $request->phone;
        $company_detail->fax = $request->fax;
        $company_detail->facebook_url = $request->facebook_url;
        $company_detail->twitter_url = $request->twitter_url;
        $company_detail->instagram_url = $request->instagram_url;
        $company_detail->youtube_url = $request->youtube_url;

        if ($request->hasFile('company_img')) {
            $file = $request->company_img;
            $name = time() . '.jpg';
            $file->move('images/company/', $name);
            $adres = '/images/company' . '/' . $name;
            $company_detail->company_img = $adres;
        }

        $company_detail->saveOrFail();

        return redirect()->route('admin.company_detail');

    }
}
