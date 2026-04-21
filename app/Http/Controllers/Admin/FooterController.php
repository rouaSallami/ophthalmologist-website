<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FooterSetting;

class FooterController extends Controller
{
   

public function edit()
{
    $footer = FooterSetting::first();

    if (!$footer) {
        $footer = FooterSetting::create([
            'description' => 'Providing professional eye care services with modern technology and personalized treatment for better vision.',
            'phone' => '+216 00 000 000',
            'email' => 'contact@ophtha.com',
            'address' => 'Tunis, Tunisia',
            'hours' => 'Mon - Sat: 9:00 - 18:00',
            'facebook' => '',
            'instagram' => '',
            'linkedin' => '',
        ]);
    }

    return view('admin.footer.edit', compact('footer'));
}

public function update(Request $request)
{
    $footer = FooterSetting::first();

    $validated = $request->validate([
        'description' => 'nullable|string',
        'phone' => 'nullable|string|max:255',
        'email' => 'nullable|email|max:255',
        'address' => 'nullable|string|max:255',
        'hours' => 'nullable|string|max:255',
        'facebook' => 'nullable|url|max:255',
        'instagram' => 'nullable|url|max:255',
        'linkedin' => 'nullable|url|max:255',
    ]);

    $footer->update($validated);

    return back()->with('success', 'Footer updated successfully.');
}


}
