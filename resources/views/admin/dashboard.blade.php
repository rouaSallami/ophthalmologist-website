@extends('layouts.admin')

@section('title', 'Admin Dashboard')

@section('content')
    <div class="mb-6">
        <h1 class="text-2xl sm:text-3xl font-bold text-primary">Dashboard</h1>
        <p class="text-sm text-gray-600 mt-2">Welcome back, {{ auth()->user()->name }}.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">
        <div class="bg-white rounded-2xl shadow-sm border border-light p-5">
            <p class="text-sm font-medium text-gray-500">Services</p>
            <h2 class="text-3xl font-bold text-primary mt-3">0</h2>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-light p-5">
            <p class="text-sm font-medium text-gray-500">Testimonials</p>
            <h2 class="text-3xl font-bold text-primary mt-3">0</h2>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-light p-5">
            <p class="text-sm font-medium text-gray-500">Appointments</p>
            <h2 class="text-3xl font-bold text-primary mt-3">0</h2>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-light p-5">
            <p class="text-sm font-medium text-gray-500">Messages</p>
            <h2 class="text-3xl font-bold text-primary mt-3">0</h2>
        </div>
    </div>
@endsection