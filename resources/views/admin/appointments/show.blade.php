@extends('layouts.admin')

@section('title', 'Appointment Details')

@section('content')
<div class="max-w-4xl mx-auto">

    <!-- Header -->
    <div class="mb-8 flex items-center justify-between">
        <div>
            <h1 class="text-3xl font-extrabold text-primary">Appointment Details</h1>
            <p class="text-sm text-gray-500 mt-1">View full patient request information</p>
        </div>

        <a href="{{ route('admin.appointments.index') }}"
           class="px-4 py-2 rounded-xl border border-light text-primary font-medium hover:bg-accent transition">
            ← Back
        </a>
    </div>

    <!-- Card -->
    <div class="bg-white rounded-3xl border border-light shadow-sm p-6 space-y-6">

        <!-- Patient -->
        <div class="flex items-center gap-4">
            <div class="w-14 h-14 rounded-2xl bg-accent flex items-center justify-center font-bold text-primary text-lg">
                {{ strtoupper(substr($appointment->name, 0, 1)) }}
            </div>

            <div>
                <h2 class="text-xl font-bold text-primary">{{ $appointment->name }}</h2>
                <p class="text-sm text-gray-500">
                    Requested {{ $appointment->created_at?->format('d M Y') }}
                </p>
            </div>
        </div>

        <!-- Info grid -->
        <div class="grid sm:grid-cols-2 gap-6">

            <div class="bg-[#F8FAFC] p-5 rounded-2xl border border-light">
                <p class="text-xs text-gray-500 mb-1">Phone</p>
                <p class="font-semibold text-primary">{{ $appointment->phone }}</p>
            </div>

            <div class="bg-[#F8FAFC] p-5 rounded-2xl border border-light">
                <p class="text-xs text-gray-500 mb-1">Email</p>
                <p class="font-semibold text-primary">
                    {{ $appointment->email ?? 'No email provided' }}
                </p>
            </div>

            <div class="bg-[#F8FAFC] p-5 rounded-2xl border border-light">
                <p class="text-xs text-gray-500 mb-1">Appointment Date</p>
                <p class="font-semibold text-primary">
                    {{ $appointment->appointment_date ?? 'Not selected' }}
                </p>
            </div>

            <div class="bg-[#F8FAFC] p-5 rounded-2xl border border-light">
                <p class="text-xs text-gray-500 mb-1">Service</p>
                <p class="font-semibold text-primary">
                    {{ $appointment->service ?? '-' }}
                </p>
            </div>

        </div>

        <!-- Message -->
        <div class="bg-[#F8FAFC] p-6 rounded-2xl border border-light">
            <p class="text-xs text-gray-500 mb-2">Message</p>

            <p class="text-primary leading-relaxed">
                {{ $appointment->message ?? 'No message provided.' }}
            </p>
        </div>

        <!-- Status + Actions -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 pt-4 border-t border-light">

            <!-- Status -->
            <form action="{{ route('admin.appointments.status', $appointment) }}" method="POST">
                @csrf
                @method('PATCH')

                <select name="status"
                        onchange="this.form.submit()"
                        class="rounded-xl border-light text-sm font-semibold text-primary focus:border-secondary focus:ring-secondary">
                    <option value="pending" @selected($appointment->status === 'pending')>Pending</option>
<option value="contacted" @selected($appointment->status === 'contacted')>Contacted</option>
<option value="completed" @selected($appointment->status === 'completed')>Completed</option>
                </select>
            </form>

            <!-- Delete -->
            <form action="{{ route('admin.appointments.destroy', $appointment) }}"
                  method="POST"
                  onsubmit="return confirm('Delete this appointment?')">
                @csrf
                @method('DELETE')

                <button type="submit"
                        class="px-5 py-2 rounded-xl border border-red-200 bg-red-50 text-red-600 font-semibold hover:bg-red-100 transition">
                    Delete Appointment
                </button>
            </form>

        </div>

    </div>
</div>
@endsection