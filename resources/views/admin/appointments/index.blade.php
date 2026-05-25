@extends('layouts.admin')

@section('title', 'Appointments')

@section('content')
<div class="max-w-7xl mx-auto">
    <div class="mb-8 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-3xl font-extrabold text-primary tracking-tight">Appointments</h1>
            <p class="text-sm text-gray-500 mt-1">Manage and track patient appointment requests.</p>
        </div>

        <div class="inline-flex items-center rounded-2xl bg-white border border-light px-4 py-3 shadow-sm">
            <span class="text-sm text-gray-500">Total:</span>
            <span class="ml-2 text-lg font-bold text-primary">{{ $appointments->total() }}</span>
        </div>
    </div>

    @if(session('success'))
        <div class="mb-6 rounded-2xl border border-green-100 bg-green-50 px-4 py-3 text-sm text-green-700 shadow-sm">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded-3xl shadow-sm border border-light overflow-hidden">
        <div class="px-6 py-5 border-b border-light bg-white">
            <h2 class="text-lg font-bold text-primary">Appointment Requests</h2>
            <p class="text-sm text-gray-500 mt-1">Update status, view details, or remove old requests.</p>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left">
                <thead class="bg-[#F8FAFC] text-primary">
                    <tr>
                        <th class="px-6 py-4 font-semibold">Patient</th>
                        <th class="px-6 py-4 font-semibold">Contact</th>
                        <th class="px-6 py-4 font-semibold">Date</th>
                        <th class="px-6 py-4 font-semibold">Service</th>
                        <th class="px-6 py-4 font-semibold">Status</th>
                        <th class="px-6 py-4 font-semibold text-right">Actions</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-light">
                    @forelse($appointments as $appointment)
                        <tr class="hover:bg-[#F8FAFC] transition">
                            <td class="px-6 py-5">
                                <div class="flex items-center gap-3">
                                    <div class="w-11 h-11 rounded-2xl bg-accent text-primary flex items-center justify-center font-bold">
                                        {{ strtoupper(substr($appointment->name, 0, 1)) }}
                                    </div>

                                    <div>
                                        <div class="font-bold text-primary">{{ $appointment->name }}</div>
                                        <div class="text-xs text-gray-500 mt-1">
                                            Requested {{ $appointment->created_at?->format('d M Y') }}
                                        </div>
                                    </div>
                                </div>
                            </td>

                            <td class="px-6 py-5">
                                <div class="font-medium text-primary">{{ $appointment->phone }}</div>
                                <div class="text-xs text-gray-500 mt-1">
                                    {{ $appointment->email ?? 'No email provided' }}
                                </div>
                            </td>

                            <td class="px-6 py-5">
                                <span class="inline-flex rounded-full bg-accent px-3 py-1 text-xs font-semibold text-secondary">
                                    {{ $appointment->appointment_date ?? 'Not selected' }}
                                </span>
                            </td>

                            <td class="px-6 py-5 text-gray-600">
                                {{ $appointment->service ?? '-' }}
                            </td>

                            <td class="px-6 py-5">
                                <form action="{{ route('admin.appointments.status', $appointment) }}" method="POST">
                                    @csrf
                                    @method('PATCH')

                                    <select
                                        name="status"
                                        onchange="this.form.submit()"
                                        class="rounded-2xl border-light text-sm font-semibold text-primary focus:border-secondary focus:ring-secondary"
                                    >
                                        <option value="pending" @selected($appointment->status === 'pending')>Pending</option>
<option value="contacted" @selected($appointment->status === 'contacted')>Contacted</option>
<option value="completed" @selected($appointment->status === 'completed')>Completed</option>
                                    </select>
                                </form>
                            </td>

                            <td class="px-6 py-5">
                                <div class="flex justify-end gap-2">
                                    <a href="{{ route('admin.appointments.show', $appointment) }}"
                                       class="px-4 py-2 rounded-2xl bg-secondary text-white font-semibold hover:bg-primary transition shadow-sm">
                                        View
                                    </a>

                                    <form action="{{ route('admin.appointments.destroy', $appointment) }}"
                                          method="POST"
                                          onsubmit="return confirm('Delete this appointment?')">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                class="px-4 py-2 rounded-2xl border border-red-200 bg-red-50 text-red-600 font-semibold hover:bg-red-100 transition">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-16">
                                <div class="text-center">
                                    <div class="w-16 h-16 mx-auto rounded-full bg-accent flex items-center justify-center text-primary font-bold mb-4">
                                        A
                                    </div>
                                    <h3 class="text-lg font-bold text-primary">No appointments yet</h3>
                                    <p class="text-sm text-gray-500 mt-2">
                                        New patient appointment requests will appear here.
                                    </p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-6">
        {{ $appointments->links() }}
    </div>
</div>
@endsection