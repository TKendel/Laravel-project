<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Settings;
use Session;


class SettingsController extends Controller
{
    public function index()
    {
    	$currentSettings = Settings::first();

    	return view("auth/settings/index")->with("settings", $currentSettings);
    }

    public function update(Request $request)
    {
    	$settings = Settings::first();

    	$this->validate($request,[
    		'siteName'=>'required',
    		'contactNumber'=>'required',
    		'contactAddress'=>'required',
    		'email'=>'required',
    	]);

    	$settings->name = $request->siteName;
    	$settings->contact_number = $request->contactNumber;
    	$settings->contact_address = $request->contactAddress;
    	$settings->email = $request->email;

    	$settings->save();

    	Session::flash("success","Settings changed");

    	return redirect()->route("Content.index");

    }
}
