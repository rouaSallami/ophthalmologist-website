<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WhyChooseUsSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WhyChooseUsController extends Controller
{
    public function edit()
    {
        $section = WhyChooseUsSection::with('features')->first();

        if (!$section) {
            $section = WhyChooseUsSection::create([
                'badge' => 'Why Choose Us',
                'title' => 'Excellence in Eye Care You Can Trust',
                'description' => 'We combine expertise, advanced technology, and personalized care to deliver the best possible vision outcomes for our patients.',
            ]);

            $section->features()->createMany([
                [
                    'title' => 'Experienced Specialists',
                    'description' => 'Our team of certified ophthalmologists ensures precise diagnosis and treatment.',
                    'sort_order' => 1,
                ],
                [
                    'title' => 'Advanced Technology',
                    'description' => 'We use modern equipment for accurate and efficient eye care procedures.',
                    'sort_order' => 2,
                ],
                [
                    'title' => 'Personalized Care',
                    'description' => 'Every patient receives tailored treatment based on their specific needs.',
                    'sort_order' => 3,
                ],
                [
                    'title' => 'Patient Satisfaction',
                    'description' => 'We focus on comfort, trust, and long-term vision health outcomes.',
                    'sort_order' => 4,
                ],
            ]);

            $section->load('features');
        }

        return view('admin.why-choose-us.edit', compact('section'));
    }

    public function update(Request $request)
    {
        $section = WhyChooseUsSection::with('features')->firstOrFail();

        $validated = $request->validate([
            'badge' => 'nullable|string|max:255',
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'features.*.title' => 'nullable|string|max:255',
            'features.*.description' => 'nullable|string',
            'features.*.sort_order' => 'nullable|integer',
        ]);

        if ($request->hasFile('image')) {
            if ($section->image && Storage::disk('public')->exists($section->image)) {
                Storage::disk('public')->delete($section->image);
            }

            $validated['image'] = $request->file('image')->store('why-choose-us', 'public');
        }

        $section->update([
            'badge' => $request->badge,
            'title' => $request->title,
            'description' => $request->description,
            'image' => $validated['image'] ?? $section->image,
        ]);

        if ($request->has('features')) {
            foreach ($request->features as $featureId => $featureData) {
                $feature = $section->features()->find($featureId);

                if ($feature) {
                    $feature->update([
                        'title' => $featureData['title'] ?? '',
                        'description' => $featureData['description'] ?? '',
                        'sort_order' => $featureData['sort_order'] ?? 0,
                    ]);
                }
            }
        }

        return back()->with('success', 'Why Choose Us section updated successfully.');
    }
}