@extends('layouts.admin')

@section('title', 'Edit Footer')

@section('content')
    <div class="max-w-5xl mx-auto">
        <!-- Page Header -->
        <div class="mb-8">
            <h1 class="text-2xl sm:text-3xl font-bold text-primary">Footer Settings</h1>
            <p class="text-sm text-gray-600 mt-2">
                Update footer content, contact information, social links, and clinic details.
            </p>
        </div>

        @if(session('success'))
            <div class="mb-6 rounded-2xl border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-700">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="mb-6 rounded-2xl border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700">
                <ul class="space-y-1">
                    @foreach($errors->all() as $error)
                        <li>• {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.footer.update') }}" method="POST" class="space-y-8">
            @csrf

            <!-- Main Card -->
            <div class="bg-white rounded-3xl shadow-sm border border-light overflow-hidden">
                <div class="px-6 py-5 border-b border-light bg-white">
                    <h2 class="text-lg font-semibold text-primary">Footer Content</h2>
                    <p class="text-sm text-gray-500 mt-1">Manage the public information displayed in the website footer.</p>
                </div>

                <div class="p-6 space-y-8">

                    <!-- Description -->
                    <div>
                        <label for="description" class="block text-sm font-medium text-primary mb-2">
                            Description
                        </label>
                        <textarea
                            id="description"
                            name="description"
                            rows="4"
                            class="w-full rounded-2xl border-light focus:border-secondary focus:ring-secondary text-sm"
                            placeholder="Write a short description about the clinic..."
                        >{{ old('description', $footer->description ?? '') }}</textarea>
                    </div>

                    <!-- Contact Info -->
                    <div>
                        <h3 class="text-base font-semibold text-primary mb-4">Contact Information</h3>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                            <div>
                                <label for="phone" class="block text-sm font-medium text-primary mb-2">
                                    Phone Number
                                </label>
                                <input
                                    type="text"
                                    id="phone"
                                    name="phone"
                                    value="{{ old('phone', $footer->phone ?? '') }}"
                                    class="w-full rounded-2xl border-light focus:border-secondary focus:ring-secondary text-sm"
                                    placeholder="+216 00 000 000"
                                >
                            </div>

                            <div>
                                <label for="email" class="block text-sm font-medium text-primary mb-2">
                                    Email Address
                                </label>
                                <input
                                    type="email"
                                    id="email"
                                    name="email"
                                    value="{{ old('email', $footer->email ?? '') }}"
                                    class="w-full rounded-2xl border-light focus:border-secondary focus:ring-secondary text-sm"
                                    placeholder="contact@ophtha.com"
                                >
                            </div>

                            <div>
                                <label for="address" class="block text-sm font-medium text-primary mb-2">
                                    Address
                                </label>
                                <input
                                    type="text"
                                    id="address"
                                    name="address"
                                    value="{{ old('address', $footer->address ?? '') }}"
                                    class="w-full rounded-2xl border-light focus:border-secondary focus:ring-secondary text-sm"
                                    placeholder="Tunis, Tunisia"
                                >
                            </div>

                            <div>
                                <label for="hours" class="block text-sm font-medium text-primary mb-2">
                                    Working Hours
                                </label>
                                <input
                                    type="text"
                                    id="hours"
                                    name="hours"
                                    value="{{ old('hours', $footer->hours ?? '') }}"
                                    class="w-full rounded-2xl border-light focus:border-secondary focus:ring-secondary text-sm"
                                    placeholder="Mon - Sat: 9:00 - 18:00"
                                >
                            </div>
                        </div>
                    </div>

                    <!-- Social Links -->
                    <div>
                        <h3 class="text-base font-semibold text-primary mb-4">Social Media Links</h3>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                            <div>
                                <label for="facebook" class="block text-sm font-medium text-primary mb-2">
                                    Facebook URL
                                </label>
                                <input
                                    type="url"
                                    id="facebook"
                                    name="facebook"
                                    value="{{ old('facebook', $footer->facebook ?? '') }}"
                                    class="w-full rounded-2xl border-light focus:border-secondary focus:ring-secondary text-sm"
                                    placeholder="https://facebook.com/..."
                                >
                            </div>

                            <div>
                                <label for="instagram" class="block text-sm font-medium text-primary mb-2">
                                    Instagram URL
                                </label>
                                <input
                                    type="url"
                                    id="instagram"
                                    name="instagram"
                                    value="{{ old('instagram', $footer->instagram ?? '') }}"
                                    class="w-full rounded-2xl border-light focus:border-secondary focus:ring-secondary text-sm"
                                    placeholder="https://instagram.com/..."
                                >
                            </div>

                            <div>
                                <label for="linkedin" class="block text-sm font-medium text-primary mb-2">
                                    LinkedIn URL
                                </label>
                                <input
                                    type="url"
                                    id="linkedin"
                                    name="linkedin"
                                    value="{{ old('linkedin', $footer->linkedin ?? '') }}"
                                    class="w-full rounded-2xl border-light focus:border-secondary focus:ring-secondary text-sm"
                                    placeholder="https://linkedin.com/..."
                                >
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Preview Card -->
            <div class="bg-white rounded-3xl shadow-sm border border-light overflow-hidden">
                <div class="px-6 py-5 border-b border-light">
                    <h2 class="text-lg font-semibold text-primary">Quick Preview</h2>
                    <p class="text-sm text-gray-500 mt-1">This gives you an idea of how your footer data will appear.</p>
                </div>

                <div class="p-6">
                    <div class="rounded-3xl bg-primary text-white p-6">
                        <div class="grid md:grid-cols-4 gap-6">
                            <div>
                                <h3 class="font-bold text-lg">Dr. Ophtha</h3>
                                <p class="text-xs text-light mt-1">Eye Clinic</p>
                                <p class="text-sm text-light mt-4 leading-7">
                                    {{ old('description', $footer->description ?? 'Your clinic description will appear here.') }}
                                </p>
                            </div>

                            <div>
                                <h4 class="font-semibold mb-3">Quick Links</h4>
                                <ul class="space-y-2 text-sm text-light">
                                    <li>Home</li>
                                    <li>About</li>
                                    <li>Services</li>
                                    <li>Contact</li>
                                </ul>
                            </div>

                            <div>
                                <h4 class="font-semibold mb-3">Services</h4>
                                <ul class="space-y-2 text-sm text-light">
                                    <li>Eye Examination</li>
                                    <li>Vision Correction</li>
                                    <li>Laser Surgery</li>
                                    <li>Contact Lenses</li>
                                </ul>
                            </div>

                            <div>
                                <h4 class="font-semibold mb-3">Contact</h4>
                                <ul class="space-y-2 text-sm text-light">
                                    <li>{{ old('address', $footer->address ?? 'Tunis, Tunisia') }}</li>
                                    <li>{{ old('phone', $footer->phone ?? '+216 00 000 000') }}</li>
                                    <li>{{ old('email', $footer->email ?? 'contact@ophtha.com') }}</li>
                                    <li>{{ old('hours', $footer->hours ?? 'Mon - Sat: 9:00 - 18:00') }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Actions -->
            <div class="flex flex-col sm:flex-row items-center justify-between gap-4">
                <p class="text-sm text-gray-500">
                    Make sure all footer information is accurate before saving.
                </p>

                <button
                    type="submit"
                    class="inline-flex items-center justify-center rounded-2xl bg-secondary px-6 py-3 text-sm font-semibold text-white shadow-lg hover:bg-primary transition duration-300"
                >
                    Save Footer Settings
                </button>
            </div>
        </form>
    </div>
@endsection