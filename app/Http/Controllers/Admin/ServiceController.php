<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
{
    $services = Service::latest()->take(6)->get();

    return view('admin.services.index', compact('services'));
}

    public function create()
    {
        return view('admin.services.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'slug' => 'required|string|max:255|unique:services,slug',
        'short_description' => 'nullable|string',
        'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'status' => 'required|in:active,draft',
    ]);

    $imagePath = null;

    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('services', 'public');
    }

    Service::create([
        'title' => $request->title,
        'slug' => $request->slug,
        'short_description' => $request->short_description,
        'image' => $imagePath,
        'status' => $request->status,
    ]);

    return redirect()->route('admin.services.index')->with('success', 'Service created successfully.');
}

    public function edit(Service $service)
{
    return view('admin.services.edit', compact('service'));
}

public function update(Request $request, Service $service)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'slug' => 'required|string|max:255|unique:services,slug,' . $service->id,
        'short_description' => 'nullable|string',
        'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'status' => 'required|in:active,draft',
    ]);

    $imagePath = $service->image;

    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('services', 'public');
    }

    $service->update([
        'title' => $request->title,
        'slug' => $request->slug,
        'short_description' => $request->short_description,
        'image' => $imagePath,
        'status' => $request->status,
    ]);

    return redirect()->route('admin.services.index')->with('success', 'Service updated successfully.');
}

public function destroy(Service $service)
{
    $service->delete();

    return redirect()->route('admin.services.index')->with('success', 'Service deleted successfully.');
}


public function toggleFeatured(Service $service)
{
    $service->update([
        'featured' => !$service->featured
    ]);

    return back()->with('success', 'Featured status updated.');
}

}