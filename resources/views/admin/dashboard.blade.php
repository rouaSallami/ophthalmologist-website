@extends('layouts.admin')

@section('title', 'Admin Dashboard')

@section('content')
    <div class="mb-6">
        <h1 class="text-2xl sm:text-3xl font-bold text-primary">Dashboard</h1>
        <p class="text-sm text-gray-600 mt-2">Welcome back, {{ auth()->user()->name }}.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-5 gap-6">

        <!-- Hero -->
        <div class="bg-white rounded-2xl shadow-sm border border-light p-5">
            <div class="flex items-center justify-between">
                <p class="text-sm font-medium text-gray-500">Hero Section</p>
                <span class="text-xs px-2 py-1 rounded-full bg-green-100 text-green-700">Active</span>
            </div>
            <h2 class="text-3xl font-bold text-primary mt-3">1</h2>
            <p class="text-xs text-gray-500 mt-2">Manage homepage hero content</p>

            <a href="{{ route('admin.hero.edit') }}"
               class="inline-block mt-4 text-sm font-semibold text-secondary hover:text-primary transition">
                Edit Hero →
            </a>
        </div>

        <!-- Services -->
        <div class="bg-white rounded-2xl shadow-sm border border-light p-5">
            <p class="text-sm font-medium text-gray-500">Services</p>
            <h2 class="text-3xl font-bold text-primary mt-3">0</h2>
            <p class="text-xs text-gray-500 mt-2">Manage clinic services</p>
        </div>

        <!-- Testimonials -->
        <div class="bg-white rounded-2xl shadow-sm border border-light p-5">
            <p class="text-sm font-medium text-gray-500">Testimonials</p>
            <h2 class="text-3xl font-bold text-primary mt-3">0</h2>
            <p class="text-xs text-gray-500 mt-2">Manage patient reviews</p>
        </div>

        <!-- Appointments -->
        <div class="bg-white rounded-2xl shadow-sm border border-light p-5">
            <p class="text-sm font-medium text-gray-500">Appointments</p>
            <h2 class="text-3xl font-bold text-primary mt-3">0</h2>
            <p class="text-xs text-gray-500 mt-2">Track booking requests</p>
        </div>

        <!-- Messages -->
        <div class="bg-white rounded-2xl shadow-sm border border-light p-5">
            <p class="text-sm font-medium text-gray-500">Messages</p>
            <h2 class="text-3xl font-bold text-primary mt-3">0</h2>
            <p class="text-xs text-gray-500 mt-2">Monitor contact messages</p>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="mt-8 bg-white rounded-2xl shadow-sm border border-light p-6">
        <h3 class="text-lg font-bold text-primary mb-4">Quick Actions</h3>

        <div class="flex flex-wrap gap-4">
            <a href="{{ route('admin.hero.edit') }}"
               class="px-5 py-3 rounded-xl bg-secondary text-white font-medium hover:bg-primary transition">
                Edit Hero Section
            </a>

            <a href="{{ route('services.index') }}"
               class="px-5 py-3 rounded-xl border border-light text-primary font-medium hover:bg-accent transition">
                Add Service
            </a>

            <a href="#"
               class="px-5 py-3 rounded-xl border border-light text-primary font-medium hover:bg-accent transition">
                View Appointments
            </a>
        </div>
    </div>
@endsection