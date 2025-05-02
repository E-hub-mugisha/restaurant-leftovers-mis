<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RestaurantSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RestaurantSettingController extends Controller
{
    public function edit()
    {
        $setting = RestaurantSetting::first();
        return view('admin.settings.edit', compact('setting'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'restaurant_name' => 'required|string|max:255',
            'email' => 'nullable|email',
            'phone' => 'nullable|string',
            'address' => 'nullable|string',
            'days_open' => 'nullable|string', // e.g. "Monday, Tuesday, Wednesday"
            'opening_hours' => 'nullable|string',
            'facebook' => 'nullable|url',
            'instagram' => 'nullable|url',
            'twitter' => 'nullable|url',
            'about_us' => 'nullable|string',
            'logo' => 'nullable|image|max:2048',
        ]);

        $setting = RestaurantSetting::firstOrNew();

        if ($request->hasFile('logo')) {
            if ($setting->logo && Storage::exists('public/logos/' . $setting->logo)) {
                Storage::delete('public/logos/' . $setting->logo);
            }

            $fileName = time() . '.' . $request->logo->extension();
            $request->logo->storeAs('public/logos', $fileName);
            $setting->logo = $fileName;
        }

        $setting->fill($request->except('logo'))->save();

        return redirect()->back()->with('success', 'Settings updated successfully!');
    }
}
