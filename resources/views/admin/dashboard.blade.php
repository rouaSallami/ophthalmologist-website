@extends('layouts.admin')

@section('title', 'Admin Dashboard')

@section('content')
    <div class="mb-6">
        <h1 class="text-2xl sm:text-3xl font-bold text-primary">Dashboard</h1>
        <p class="text-sm text-gray-600 mt-2">Welcome back, {{ auth()->user()->name }}.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">

        <div class="bg-white rounded-2xl shadow-sm border border-light p-5">
            <div class="flex items-center justify-between">
                <p class="text-sm font-medium text-gray-500">Website Sections</p>
                <span class="text-xs px-2 py-1 rounded-full bg-green-100 text-green-700">Active</span>
            </div>

            <h2 class="text-3xl font-bold text-primary mt-3">3</h2>
            <p class="text-xs text-gray-500 mt-2">Manage hero, why choose us, and footer content</p>

            <div class="mt-4 flex flex-col gap-2 border-t border-gray-50 pt-4">
                <a href="{{ route('admin.hero.edit') }}"
                   class="text-sm font-semibold text-secondary hover:text-primary transition flex items-center justify-between">
                    <span>Edit Hero</span>
                    <span>→</span>
                </a>

                <a href="{{ route('admin.why-choose-us.edit') }}"
                   class="text-sm font-semibold text-secondary hover:text-primary transition flex items-center justify-between">
                    <span>Edit Why Choose Us</span>
                    <span>→</span>
                </a>

                <a href="{{ route('admin.footer.edit') }}"
                   class="text-sm font-semibold text-secondary hover:text-primary transition flex items-center justify-between">
                    <span>Edit Footer</span>
                    <span>→</span>
                </a>
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-light p-5 flex flex-col justify-between">
            <div>
                <p class="text-sm font-medium text-gray-500">Services</p>
                <h2 class="text-3xl font-bold text-primary mt-3">0</h2>
                <p class="text-xs text-gray-500 mt-2">Manage clinic services and treatments</p>
            </div>
            <a href="{{ route('admin.services.index') }}" class="mt-4 text-sm font-semibold text-secondary hover:text-primary transition">
                Manage Services →
            </a>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-light p-5 flex flex-col justify-between">
            <div>
                <p class="text-sm font-medium text-gray-500">Appointments</p>
                <h2 class="text-3xl font-bold text-primary mt-3">0</h2>
                <p class="text-xs text-gray-500 mt-2">Track booking requests from patients</p>
            </div>
            <a href="#" class="mt-4 text-sm font-semibold text-secondary hover:text-primary transition">
                View All →
            </a>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-light p-5">
            <p class="text-sm font-medium text-gray-500">Testimonials</p>
            <h2 class="text-3xl font-bold text-primary mt-3">0</h2>
            <p class="text-xs text-gray-500 mt-2">Manage patient reviews and feedback</p>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-light p-5">
            <p class="text-sm font-medium text-gray-500">Messages</p>
            <h2 class="text-3xl font-bold text-primary mt-3">0</h2>
            <p class="text-xs text-gray-500 mt-2">Monitor contact form submissions</p>
        </div>

    </div>

    <div class="mt-8 bg-white rounded-2xl shadow-sm border border-light p-6">
        <h3 class="text-lg font-bold text-primary mb-4">Quick Actions</h3>

        <div class="flex flex-wrap gap-4">
            <a href="{{ route('admin.services.index') }}"
               class="px-5 py-3 rounded-xl bg-secondary text-white font-medium hover:bg-primary transition shadow-sm shadow-secondary/20">
                + Add New Service
            </a>

            <a href="{{ route('admin.why-choose-us.edit') }}"
               class="px-5 py-3 rounded-xl border border-light text-primary font-medium hover:bg-accent transition">
                Update Why Choose Us
            </a>

            <a href="#"
               class="px-5 py-3 rounded-xl border border-light text-primary font-medium hover:bg-accent transition">
                View Appointments
            </a>
        </div>
    </div>
@endsection