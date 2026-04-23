<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutSectionController extends Controller
{
    public function edit()
    {
        $about = AboutSection::first();

        if (!$about) {
            $about = AboutSection::create([
                'badge' => 'About Us',
                'title' => 'We Provide The Best Eye Care Solutions With Modern Technology',
                'description' => 'At Dr. Ophtha Clinic, we are dedicated to delivering high-quality ophthalmology services using advanced technology and personalized care. Our mission is to protect and improve your vision with professionalism and compassion.',
                'experience_text' => '15+ Years',
                'point_one' => 'Advanced diagnostic equipment',
                'point_two' => 'Experienced and certified specialists',
                'point_three' => 'Personalized treatment for every patient',
                'button_text' => 'Book Appointment',
                'button_link' => '#contact',
            ]);
        }

        return view('admin.about.edit', compact('about'));
    }

    public function update(Request $request)
    {
        $about = AboutSection::firstOrFail();

        $validated = $request->validate([
            'badge' => 'nullable|string|max:255',
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'experience_text' => 'nullable|string|max:255',
            'point_one' => 'nullable|string|max:255',
            'point_two' => 'nullable|string|max:255',
            'point_three' => 'nullable|string|max:255',
            'button_text' => 'nullable|string|max:255',
            'button_link' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($about->image && Storage::disk('public')->exists($about->image)) {
                Storage::disk('public')->delete($about->image);
            }

            $validated['image'] = $request->file('image')->store('about', 'public');
        }

        $about->update($validated);

        return back()->with('success', 'About section updated successfully.');
    }
}