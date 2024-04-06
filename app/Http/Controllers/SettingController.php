<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Helpers\AppHelper;

class SettingController extends Controller
{
    protected array $validation_rules;

    public function __construct()
    {
        $this->validation_rules = [
            'key' => 'required|string|max:250',
            'value' => 'required|string|max:250',
            'name' => 'required|string|max:250',
        ];
    }

    public function index(): View
    {
        $settings = Setting::all();
        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate($this->validation_rules);
        Setting::findOrFail($id)->update($validatedData);
        return redirect('settings')->with('message', 'تنظیمات با موفقیت ویرایش شد');
    }

    public function updateAll(Request $request)
    {
        $settings = $request->except('_token', '_method');
        if ($request->hasFile('logo')) {
            $request->logo->store('public/upload');
            $validatedData['logo'] = $request->logo->hashName();
        }
        foreach ($settings as $key => $value) {
            if ($key === 'logo') {
                $value = $validatedData['logo'];
            } else {
                $value = AppHelper::formatNumber($value);
            }
            Setting::updateOrCreate(['key' => $key], ['value' => $value]);
        }
        return redirect()->route('settings.index')->with('success', 'تنظیمات با موفقیت به‌روزرسانی شدند');
    }
}
