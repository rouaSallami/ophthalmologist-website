@extends('layouts.admin')

@section('title', 'Admin Dashboard')

@section('content')
<div class="mb-6">
    <h1 class="text-2xl sm:text-3xl font-bold text-primary">Dashboard</h1>
    <p class="text-sm text-gray-600 mt-2">
        Welcome back, {{ auth()->user()->name }}.
    </p>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">

    <!-- Services -->
    <div class="bg-white rounded-2xl shadow-sm border border-light p-5">
        <p class="text-sm font-medium text-gray-500">Services</p>
        <h2 class="text-3xl font-bold text-primary mt-3">
            {{ $servicesCount }}
        </h2>
        <p class="text-xs text-gray-500 mt-2">
            Manage clinic services and treatments
        </p>

        <a href="{{ route('admin.services.index') }}"
           class="inline-block mt-4 text-sm font-semibold text-secondary hover:text-primary transition">
            Manage Services →
        </a>
    </div>

    <!-- Appointments -->
    <div class="bg-white rounded-2xl shadow-sm border border-light p-5">
        <p class="text-sm font-medium text-gray-500">Appointments</p>
        <h2 class="text-3xl font-bold text-primary mt-3">
            {{ $appointmentsCount }}
        </h2>
        <p class="text-xs text-gray-500 mt-2">
            Track booking requests from patients
        </p>

        <a href="{{ route('admin.appointments.index') }}"
           class="inline-block mt-4 text-sm font-semibold text-secondary hover:text-primary transition">
            View Appointments →
        </a>
    </div>

    <!-- Testimonials -->
    <div class="bg-white rounded-2xl shadow-sm border border-light p-5">
        <p class="text-sm font-medium text-gray-500">Testimonials</p>
        <h2 class="text-3xl font-bold text-primary mt-3">
            {{ $testimonialsCount }}
        </h2>
        <p class="text-xs text-gray-500 mt-2">
            Manage patient reviews and feedback
        </p>

        <a href="{{ route('admin.testimonials.index') }}"
           class="inline-block mt-4 text-sm font-semibold text-secondary hover:text-primary transition">
            View Testimonials →
        </a>
    </div>

    <!-- Messages -->
    <div class="bg-white rounded-2xl shadow-sm border border-light p-5">
        <p class="text-sm font-medium text-gray-500">Messages</p>
        <h2 class="text-3xl font-bold text-primary mt-3">
            {{ $messagesCount }}
        </h2>
        <p class="text-xs text-gray-500 mt-2">
            Monitor contact form submissions
        </p>

        <a href="{{ route('admin.messages.index') }}"
           class="inline-block mt-4 text-sm font-semibold text-secondary hover:text-primary transition">
            View Messages →
        </a>
    </div>

</div>

<!-- Quick Actions -->
<div class="mt-8 bg-white rounded-2xl shadow-sm border border-light p-6">
    <h3 class="text-lg font-bold text-primary mb-4">
        Quick Actions
    </h3>

    <div class="flex flex-wrap gap-4">

        <a href="{{ route('admin.services.create') }}"
           class="px-5 py-3 rounded-xl bg-secondary text-white font-medium hover:bg-primary transition">
            + Add New Service
        </a>

        <a href="{{ route('admin.appointments.index') }}"
           class="px-5 py-3 rounded-xl border border-light text-primary font-medium hover:bg-accent transition">
            View Appointments
        </a>

        <a href="{{ route('admin.messages.index') }}"
           class="px-5 py-3 rounded-xl border border-light text-primary font-medium hover:bg-accent transition">
            View Messages
        </a>

    </div>
</div>
@endsection