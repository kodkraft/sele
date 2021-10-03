<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SettingController extends Controller
{
    public function index()
    {
        return view('admin/settings-index')
            ->with('settings', Setting::all());
    }

    public function update(Setting $setting, Request $request)
    {
        $setting->value = $request->value;
        $setting->save();
        Log::info($message = $setting->name . ' updated to '.$setting->value);
        return redirect()->back()->with('success', $message);
    }
}
