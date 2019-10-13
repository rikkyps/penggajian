<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
use Alert;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::first();
        return view('settings.index', compact('settings'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'company_name' => 'required|max:50',
            'email' => 'required|email',
            'address' => 'required',
            'phone' => 'required',
        ]);

        Setting::updateOrCreate([
            'id' => 1
        ], $request->all());

        Alert::success('Berhasil', 'Data berhasil diubah');
        return redirect()->route('settings.index');
    }
}
