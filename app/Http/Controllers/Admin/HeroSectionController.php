<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HeroSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HeroSectionController extends Controller
{
    public function index()
    {
        $hero = HeroSection::where('is_active', true)->first();
        return view('front.home', compact('hero'));
    }

    public function edit()
    {
        $hero = HeroSection::first();

        if (!$hero) {
            $hero = HeroSection::create([
                'title' => 'Professional Eye Care for Better Vision',
                'subtitle' => 'Welcome to Dr. Ophtha Clinic',
                'description' => 'We provide advanced ophthalmology services with personalized care for every patient.',
                'phone' => '+216 00 000 000',
                'button_text' => 'Book Appointment',
                'button_link' => '#appointment',
                'secondary_button_text' => 'Call Now',
                'secondary_button_link' => 'tel:+21600000000',
                'badge_text' => 'Trusted Eye Care Clinic',
                'experience_text' => '15+ Years of Experience',
                'patients_text' => '5k+ Happy Patients',
                'is_active' => true,
            ]);
        }

        return view('admin.hero.edit', compact('hero'));
    }

    public function update(Request $request)
    {
        $hero = HeroSection::first();

        $validated = $request->validate([
            'title' => 'nullable|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'phone' => 'nullable|string|max:50',
            'button_text' => 'nullable|string|max:255',
            'button_link' => 'nullable|string|max:255',
            'secondary_button_text' => 'nullable|string|max:255',
            'secondary_button_link' => 'nullable|string|max:255',
            'badge_text' => 'nullable|string|max:255',
            'experience_text' => 'nullable|string|max:255',
            'patients_text' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'is_active' => 'nullable|boolean',
        ]);

        if ($request->hasFile('image')) {
            if ($hero && $hero->image && Storage::disk('public')->exists($hero->image)) {
                Storage::disk('public')->delete($hero->image);
            }

            $validated['image'] = $request->file('image')->store('hero', 'public');
        }

        $validated['is_active'] = $request->has('is_active');

        $hero->update($validated);

        return redirect()->back()->with('success', 'Hero section updated successfully.');
    }
}