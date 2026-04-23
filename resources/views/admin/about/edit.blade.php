@extends('layouts.admin')

@section('title', 'Edit About')

@section('content')
<div class="max-w-5xl mx-auto">
    <div class="mb-8">
        <h1 class="text-2xl sm:text-3xl font-bold text-primary">About Section</h1>
        <p class="text-sm text-gray-600 mt-2">Manage the about section displayed on the homepage.</p>
    </div>

    @if(session('success'))
        <div class="mb-6 rounded-2xl border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-700">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('admin.about.update') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
        @csrf

        <div class="bg-white rounded-3xl shadow-sm border border-light p-6 space-y-6">
            <div>
                <label class="block text-sm font-medium text-primary mb-2">Badge</label>
                <input type="text" name="badge" value="{{ old('badge', $about->badge) }}" class="w-full rounded-2xl border-light">
            </div>

            <div>
                <label class="block text-sm font-medium text-primary mb-2">Title</label>
                <input type="text" name="title" value="{{ old('title', $about->title) }}" class="w-full rounded-2xl border-light">
            </div>

            <div>
                <label class="block text-sm font-medium text-primary mb-2">Description</label>
                <textarea name="description" rows="4" class="w-full rounded-2xl border-light">{{ old('description', $about->description) }}</textarea>
            </div>

            <div>
                <label class="block text-sm font-medium text-primary mb-2">Image</label>
                <input type="file" name="image" class="w-full rounded-2xl border-light">
                @if($about->image)
                    <img src="{{ asset('storage/' . $about->image) }}" class="mt-4 w-40 rounded-2xl shadow">
                @endif
            </div>

            <div>
                <label class="block text-sm font-medium text-primary mb-2">Experience Text</label>
                <input type="text" name="experience_text" value="{{ old('experience_text', $about->experience_text) }}" class="w-full rounded-2xl border-light">
            </div>

            <div>
                <label class="block text-sm font-medium text-primary mb-2">Point One</label>
                <input type="text" name="point_one" value="{{ old('point_one', $about->point_one) }}" class="w-full rounded-2xl border-light">
            </div>

            <div>
                <label class="block text-sm font-medium text-primary mb-2">Point Two</label>
                <input type="text" name="point_two" value="{{ old('point_two', $about->point_two) }}" class="w-full rounded-2xl border-light">
            </div>

            <div>
                <label class="block text-sm font-medium text-primary mb-2">Point Three</label>
                <input type="text" name="point_three" value="{{ old('point_three', $about->point_three) }}" class="w-full rounded-2xl border-light">
            </div>

            <div class="grid md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-primary mb-2">Button Text</label>
                    <input type="text" name="button_text" value="{{ old('button_text', $about->button_text) }}" class="w-full rounded-2xl border-light">
                </div>

                <div>
                    <label class="block text-sm font-medium text-primary mb-2">Button Link</label>
                    <input type="text" name="button_link" value="{{ old('button_link', $about->button_link) }}" class="w-full rounded-2xl border-light">
                </div>
            </div>
        </div>

        <button type="submit" class="px-6 py-3 rounded-2xl bg-secondary text-white font-semibold hover:bg-primary transition">
            Save Changes
        </button>
    </form>
</div>
@endsection