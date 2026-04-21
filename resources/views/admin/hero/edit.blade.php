@extends('layouts.admin')

@section('content')
<div class="max-w-4xl mx-auto p-6">
    <h1 class="text-2xl font-bold mb-6">Edit Hero Section</h1>

    @if(session('success'))
        <div class="mb-4 p-4 rounded-lg bg-green-100 text-green-700">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('admin.hero.update') }}" method="POST" enctype="multipart/form-data" class="space-y-6 bg-white p-6 rounded-2xl shadow">
        @csrf

        <div>
            <label class="block mb-2 font-medium">Subtitle</label>
            <input type="text" name="subtitle" value="{{ old('subtitle', $hero->subtitle) }}" class="w-full border rounded-xl px-4 py-3">
        </div>

        <div>
            <label class="block mb-2 font-medium">Title</label>
            <input type="text" name="title" value="{{ old('title', $hero->title) }}" class="w-full border rounded-xl px-4 py-3">
        </div>

        <div>
            <label class="block mb-2 font-medium">Description</label>
            <textarea name="description" rows="4" class="w-full border rounded-xl px-4 py-3">{{ old('description', $hero->description) }}</textarea>
        </div>

        <div>
            <label class="block mb-2 font-medium">Phone</label>
            <input type="text" name="phone" value="{{ old('phone', $hero->phone) }}" class="w-full border rounded-xl px-4 py-3">
        </div>

        <div class="grid md:grid-cols-2 gap-4">
            <div>
                <label class="block mb-2 font-medium">Primary Button Text</label>
                <input type="text" name="button_text" value="{{ old('button_text', $hero->button_text) }}" class="w-full border rounded-xl px-4 py-3">
            </div>
            <div>
                <label class="block mb-2 font-medium">Primary Button Link</label>
                <input type="text" name="button_link" value="{{ old('button_link', $hero->button_link) }}" class="w-full border rounded-xl px-4 py-3">
            </div>
        </div>

        <div class="grid md:grid-cols-2 gap-4">
            <div>
                <label class="block mb-2 font-medium">Secondary Button Text</label>
                <input type="text" name="secondary_button_text" value="{{ old('secondary_button_text', $hero->secondary_button_text) }}" class="w-full border rounded-xl px-4 py-3">
            </div>
            <div>
                <label class="block mb-2 font-medium">Secondary Button Link</label>
                <input type="text" name="secondary_button_link" value="{{ old('secondary_button_link', $hero->secondary_button_link) }}" class="w-full border rounded-xl px-4 py-3">
            </div>
        </div>

        <div class="grid md:grid-cols-3 gap-4">
            <div>
                <label class="block mb-2 font-medium">Badge Text</label>
                <input type="text" name="badge_text" value="{{ old('badge_text', $hero->badge_text) }}" class="w-full border rounded-xl px-4 py-3">
            </div>
            <div>
                <label class="block mb-2 font-medium">Experience Text</label>
                <input type="text" name="experience_text" value="{{ old('experience_text', $hero->experience_text) }}" class="w-full border rounded-xl px-4 py-3">
            </div>
            <div>
                <label class="block mb-2 font-medium">Patients Text</label>
                <input type="text" name="patients_text" value="{{ old('patients_text', $hero->patients_text) }}" class="w-full border rounded-xl px-4 py-3">
            </div>
        </div>

        <div>
            <label class="block mb-2 font-medium">Hero Image</label>
            <input type="file" name="image" class="w-full border rounded-xl px-4 py-3">
            @if($hero->image)
                <img src="{{ asset('storage/' . $hero->image) }}" class="mt-4 w-48 rounded-xl shadow">
            @endif
        </div>

        <div class="flex items-center gap-3">
            <input type="checkbox" name="is_active" value="1" {{ $hero->is_active ? 'checked' : '' }}>
            <label>Hero Active</label>
        </div>

        <button type="submit" class="px-6 py-3 rounded-xl bg-[#143373] text-white font-semibold">
            Save Changes
        </button>
    </form>
</div>
@endsection