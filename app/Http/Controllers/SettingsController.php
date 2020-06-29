<?php

namespace App\Http\Controllers;

use App\Settings;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index()
    {
        return view('settings.index')->with('settings', Settings::first());
    }

    public function update(Request $request)
    {
        $data = $request->only(['site_name', 'address', 'contact', 'email']);

        $setting = Settings::first();

        $setting->update($data);

        session()->flash('success', 'Updated Successfully');

        return redirect()->back();
    }
}
