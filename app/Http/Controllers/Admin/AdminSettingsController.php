<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class AdminSettingsController extends Controller
{
    public function index(Request $request)
    {
        $activeTab = $request->get('tab', 'general');

        // Get all general settings
        $settings = Setting::where('group', 'general')->pluck('value', 'key')->toArray();

        // Get current admin
        $admin = auth()->guard('admin')->user();

        // Available timezones
        $timezones = [
            'Asia/Manila' => 'Asia/Manila (PHT)',
            'UTC' => 'UTC',
            'America/New_York' => 'America/New_York (EST)',
            'Europe/London' => 'Europe/London (GMT)',
        ];

        // Available languages
        $languages = [
            'en' => 'English',
            'tl' => 'Tagalog',
        ];

        return view('admin.settings.index', compact('activeTab', 'settings', 'admin', 'timezones', 'languages'));
    }

    public function updateGeneral(Request $request)
    {
        $admin = auth()->guard('admin')->user();

        $validated = $request->validate([
            'platform_name' => 'required|string|max:255',
            'platform_tagline' => 'nullable|string|max:255',
            'contact_email' => 'required|email|max:255',
            'contact_phone' => 'required|string|max:20',
            'contact_address' => 'required|string|max:500',
            'timezone' => 'required|string',
            'default_language' => 'required|string|in:en,tl',
            'maintenance_mode' => 'nullable|boolean',
            'admin_name' => 'required|string|max:255',
            'admin_email' => ['required', 'email', 'max:255', Rule::unique('admins', 'email')->ignore($admin->id)],
        ]);

        // Update settings
        Setting::set('platform_name', $validated['platform_name'], 'string', 'general');
        Setting::set('platform_tagline', $validated['platform_tagline'] ?? '', 'string', 'general');
        Setting::set('contact_email', $validated['contact_email'], 'string', 'general');
        Setting::set('contact_phone', $validated['contact_phone'], 'string', 'general');
        Setting::set('contact_address', $validated['contact_address'], 'string', 'general');
        Setting::set('timezone', $validated['timezone'], 'string', 'general');
        Setting::set('default_language', $validated['default_language'], 'string', 'general');

        // Handle maintenance mode
        $maintenanceMode = $request->has('maintenance_mode') ? '1' : '0';
        $currentMaintenanceMode = Setting::get('maintenance_mode', '0');

        if ($maintenanceMode !== $currentMaintenanceMode) {
            if ($maintenanceMode === '1') {
                Artisan::call('down', ['--secret' => 'admin-secret']);
            } else {
                Artisan::call('up');
            }
        }

        Setting::set('maintenance_mode', $maintenanceMode, 'boolean', 'general');

        // Update admin profile
        $admin->name = $validated['admin_name'];
        $admin->email = $validated['admin_email'];
        $admin->save();

        return redirect()->route('admin.settings.index', ['tab' => 'general'])
            ->with('success', 'Settings updated successfully');
    }

    public function updatePassword(Request $request)
    {
        $admin = auth()->guard('admin')->user();

        $validated = $request->validate([
            'current_password' => 'required|string',
            'new_password' => 'required|string|min:8|confirmed',
            'new_password_confirmation' => 'required|string',
        ]);

        // Verify current password
        if (!Hash::check($validated['current_password'], $admin->password)) {
            return back()
                ->withErrors(['current_password' => 'The current password is incorrect'])
                ->withInput();
        }

        // Update password
        $admin->password = $validated['new_password'];
        $admin->save();

        return redirect()->route('admin.settings.index', ['tab' => 'security'])
            ->with('success', 'Password updated successfully');
    }
}
