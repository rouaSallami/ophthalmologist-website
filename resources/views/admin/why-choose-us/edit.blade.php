@extends('layouts.admin')

@section('title', 'Edit Why Choose Us')

@section('content')
<div class="max-w-5xl mx-auto">
    <div class="mb-8">
        <h1 class="text-2xl sm:text-3xl font-bold text-primary">Why Choose Us</h1>
        <p class="text-sm text-gray-600 mt-2">Manage this homepage section and its feature cards.</p>
    </div>

    @if(session('success'))
        <div class="mb-6 rounded-2xl border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-700">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('admin.why-choose-us.update') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
        @csrf

        <div class="bg-white rounded-3xl shadow-sm border border-light p-6 space-y-6">
            <div>
                <label class="block text-sm font-medium text-primary mb-2">Badge</label>
                <input type="text" name="badge" value="{{ old('badge', $section->badge) }}" class="w-full rounded-2xl border-light">
            </div>

            <div>
                <label class="block text-sm font-medium text-primary mb-2">Title</label>
                <input type="text" name="title" value="{{ old('title', $section->title) }}" class="w-full rounded-2xl border-light">
            </div>

            <div>
                <label class="block text-sm font-medium text-primary mb-2">Description</label>
                <textarea name="description" rows="4" class="w-full rounded-2xl border-light">{{ old('description', $section->description) }}</textarea>
            </div>

            <div>
                <label class="block text-sm font-medium text-primary mb-2">Image</label>
                <input type="file" name="image" class="w-full rounded-2xl border-light">
                @if($section->image)
                    <img src="{{ asset('storage/' . $section->image) }}" class="mt-4 w-40 rounded-2xl shadow">
                @endif
            </div>
        </div>

        <div class="bg-white rounded-3xl shadow-sm border border-light p-6">
            <h2 class="text-lg font-semibold text-primary mb-6">Feature Cards</h2>

            <div class="grid gap-6">
                @foreach($section->features as $feature)
                    <div class="rounded-2xl border border-light p-5 bg-[#F8FAFC]">
                        <div class="grid md:grid-cols-3 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-primary mb-2">Title</label>
                                <input type="text" name="features[{{ $feature->id }}][title]" value="{{ old("features.{$feature->id}.title", $feature->title) }}" class="w-full rounded-2xl border-light">
                            </div>

                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium text-primary mb-2">Description</label>
                                <input type="text" name="features[{{ $feature->id }}][description]" value="{{ old("features.{$feature->id}.description", $feature->description) }}" class="w-full rounded-2xl border-light">
                            </div>
                        </div>

                        <div class="mt-4">
                            <label class="block text-sm font-medium text-primary mb-2">Sort Order</label>
                            <input type="number" name="features[{{ $feature->id }}][sort_order]" value="{{ old("features.{$feature->id}.sort_order", $feature->sort_order) }}" class="w-full max-w-[140px] rounded-2xl border-light">
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <button type="submit" class="px-6 py-3 rounded-2xl bg-secondary text-white font-semibold hover:bg-primary transition">
            Save Changes
        </button>
    </form>
</div>
@endsection