@extends('layouts.admin')

@section('title', 'Message Details')

@section('content')
<div class="max-w-4xl mx-auto">

    <div class="mb-8 flex items-center justify-between">
        <div>
            <h1 class="text-3xl font-extrabold text-primary">Message Details</h1>
            <p class="text-sm text-gray-500 mt-1">Full contact message information</p>
        </div>

        <a href="{{ route('admin.messages.index') }}"
           class="px-4 py-2 rounded-xl border border-light text-primary font-medium hover:bg-accent transition">
            ← Back
        </a>
    </div>

    <div class="bg-white rounded-3xl border border-light shadow-sm p-6 space-y-6">

        <div>
            <h2 class="text-xl font-bold text-primary">{{ $message->name }}</h2>
            <p class="text-sm text-gray-500">{{ $message->created_at?->format('d M Y H:i') }}</p>
        </div>

        <div class="grid sm:grid-cols-2 gap-6">
            <div class="bg-[#F8FAFC] p-5 rounded-2xl border border-light">
                <p class="text-xs text-gray-500 mb-1">Email</p>
                <p class="font-semibold text-primary">{{ $message->email }}</p>
            </div>

            <div class="bg-[#F8FAFC] p-5 rounded-2xl border border-light">
                <p class="text-xs text-gray-500 mb-1">Phone</p>
                <p class="font-semibold text-primary">{{ $message->phone ?? '-' }}</p>
            </div>

            <div class="bg-[#F8FAFC] p-5 rounded-2xl border border-light sm:col-span-2">
                <p class="text-xs text-gray-500 mb-1">Subject</p>
                <p class="font-semibold text-primary">{{ $message->subject ?? '-' }}</p>
            </div>
        </div>

        <div class="bg-[#F8FAFC] p-6 rounded-2xl border border-light">
            <p class="text-xs text-gray-500 mb-2">Message</p>
            <p class="text-primary leading-relaxed">{{ $message->message }}</p>
        </div>

        <form action="{{ route('admin.messages.destroy', $message) }}"
              method="POST"
              onsubmit="return confirm('Delete this message?')">
            @csrf
            @method('DELETE')

            <button type="submit"
                    class="px-5 py-2 rounded-xl border border-red-200 bg-red-50 text-red-600 font-semibold hover:bg-red-100 transition">
                Delete Message
            </button>
        </form>

    </div>
</div>
@endsection