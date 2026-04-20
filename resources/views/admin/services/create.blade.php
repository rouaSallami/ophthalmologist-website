@extends('layouts.admin')

@section('title', 'Add Service')

@section('content')
    <div class="mb-6">
        <h1 class="text-2xl sm:text-3xl font-bold text-primary">Add Service</h1>
        <p class="text-sm text-gray-600 mt-2">Create a new service for the website.</p>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-light p-6">
        <form action="{{ route('admin.services.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            @if ($errors->any())
    <div class="rounded-xl border border-red-200 bg-red-50 p-4">
        <ul class="list-disc list-inside text-sm text-red-600 space-y-1">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div>
    <label class="block text-sm font-medium text-primary mb-2">Image</label>
    <input
        type="file"
        name="image"
        class="w-full rounded-xl border border-light p-2"
    >
</div>

            <div>
                <label class="block text-sm font-medium text-primary mb-2">Title</label>
                <input
    type="text"
    name="title"
    value="{{ old('title') }}"
    class="w-full rounded-xl border border-light focus:border-secondary focus:ring-secondary"
    placeholder="Enter service title"
>

            <div>
                <label class="block text-sm font-medium text-primary mb-2">Slug</label>
                <input
    type="text"
    name="slug"
    value="{{ old('slug') }}"
    class="w-full rounded-xl border border-light focus:border-secondary focus:ring-secondary"
    placeholder="enter-service-slug"
>
            </div>

            <div>
                <label class="block text-sm font-medium text-primary mb-2">Short Description</label>
                <textarea
    name="short_description"
    rows="4"
    class="w-full rounded-xl border border-light focus:border-secondary focus:ring-secondary"
    placeholder="Write a short description"
>{{ old('short_description') }}</textarea>
            </div>

            <div>
                <label class="block text-sm font-medium text-primary mb-2">Status</label>
                <select
    name="status"
    class="w-full rounded-xl border border-light focus:border-secondary focus:ring-secondary"
>
    <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
    <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Draft</option>
</select>
            </div>

            <div class="flex items-center gap-3">
                <button
                    type="submit"
                    class="bg-secondary hover:bg-primary text-white px-5 py-2.5 rounded-xl text-sm font-medium transition"
                >
                    Save Service
                </button>

                <a
                    href="{{ route('admin.services.index') }}"
                    class="px-5 py-2.5 rounded-xl text-sm font-medium border border-light text-gray-700 hover:bg-gray-50 transition"
                >
                    Cancel
                </a>
            </div>
        </form>
    </div>
@endsection