<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
use Illuminate\Support\Facades\Session;

class SettingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $settings = Setting::first();
        return view('admin.settings.settings', ['settings' => $settings]);
    }

    public function update()
    {
        $this->validate(\request(),[
            'site_name' => 'required',
            'contact_number' => 'required',
            'contact_email' => 'required',
            'address' => 'required',
            'about' => 'required',
            'opening_hours' => 'required',
            'contact_email_desc' => 'required',
            'address_detailed' => 'required',
        ]);

        $settings = Setting::first();

        $settings->site_name = \request()->site_name;
        $settings->contact_number = \request()->contact_number;
        $settings->contact_email = \request()->contact_email;
        $settings->address = \request()->address;
        $settings->about = \request()->about;
        $settings->opening_hours = \request()->opening_hours;
        $settings->contact_email_desc = \request()->contact_email_desc;
        $settings->address_detailed = \request()->address_detailed;

        $settings->save();

        Session::flash('success', 'Settings updated.');

        return redirect()->back();
    }
}
