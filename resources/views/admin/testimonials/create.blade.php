@extends('layouts.admin')

@section('title', 'Create Testimonial')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="mb-8">
        <h1 class="text-2xl sm:text-3xl font-bold text-primary">Add Testimonial</h1>
        <p class="text-sm text-gray-600 mt-2">Create a new patient review for the website.</p>
    </div>

    <form action="{{ route('admin.testimonials.store') }}" method="POST" enctype="multipart/form-data" class="bg-white rounded-3xl border border-light shadow-sm p-6 space-y-6">
        @csrf

        <div>
            <label class="block text-sm font-medium text-primary mb-2">Image</label>
            <input type="file" name="image" class="w-full rounded-2xl border-light">
        </div>

        <div>
            <label class="block text-sm font-medium text-primary mb-2">Name</label>
            <input type="text" name="name" class="w-full rounded-2xl border-light" placeholder="Enter patient name" value="{{ old('name') }}">
        </div>

        <div>
            <label class="block text-sm font-medium text-primary mb-2">Role</label>
            <input type="text" name="role" class="w-full rounded-2xl border-light" placeholder="Patient / Client" value="{{ old('role') }}">
        </div>

        <div>
            <label class="block text-sm font-medium text-primary mb-2">Review</label>
            <textarea name="review" rows="5" class="w-full rounded-2xl border-light" placeholder="Write testimonial...">{{ old('review') }}</textarea>
        </div>

        <div class="grid md:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-primary mb-2">Rating</label>
                <select name="rating" class="w-full rounded-2xl border-light">
                    @for($i = 5; $i >= 1; $i--)
                        <option value="{{ $i }}">{{ $i }} Star{{ $i > 1 ? 's' : '' }}</option>
                    @endfor
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-primary mb-2">Status</label>
                <select name="status" class="w-full rounded-2xl border-light">
                    <option value="active">Active</option>
                    <option value="draft">Draft</option>
                </select>
            </div>
        </div>

        <div class="flex items-center gap-3">
            <input type="checkbox" name="featured" value="1" id="featured">
            <label for="featured" class="text-sm text-primary">Featured testimonial</label>
        </div>

        <div class="flex gap-4">
            <button type="submit" class="px-6 py-3 rounded-2xl bg-secondary text-white font-semibold hover:bg-primary transition">
                Save Testimonial
            </button>

            <a href="{{ route('admin.testimonials.index') }}" class="px-6 py-3 rounded-2xl border border-light text-primary font-semibold hover:bg-accent transition">
                Cancel
            </a>
        </div>
    </form>
</div>
@endsection