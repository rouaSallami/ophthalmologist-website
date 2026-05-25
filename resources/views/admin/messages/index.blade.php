@extends('layouts.admin')

@section('title', 'Messages')

@section('content')
<div class="max-w-7xl mx-auto">

    <div class="mb-8">
        <h1 class="text-3xl font-extrabold text-primary">Messages</h1>
        <p class="text-sm text-gray-500 mt-1">
            Contact messages received from visitors.
        </p>
    </div>

    @if(session('success'))
        <div class="mb-4 rounded-xl bg-green-50 border border-green-200 px-4 py-3 text-green-700">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded-3xl shadow-sm border border-light overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-[#F8FAFC]">
                <tr>
                    <th class="px-6 py-4 text-left">Name</th>
                    <th class="px-6 py-4 text-left">Email</th>
                    <th class="px-6 py-4 text-left">Subject</th>
                    <th class="px-6 py-4 text-left">Status</th>
                    <th class="px-6 py-4 text-right">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($messages as $message)
                    <tr class="border-t">
                        <td class="px-6 py-4">{{ $message->name }}</td>
                        <td class="px-6 py-4">{{ $message->email }}</td>
                        <td class="px-6 py-4">{{ $message->subject }}</td>

                        <td class="px-6 py-4">
                            @if($message->is_read)
                                <span class="text-green-600 font-semibold">Read</span>
                            @else
                                <span class="text-red-600 font-semibold">Unread</span>
                            @endif
                        </td>

                        <td class="px-6 py-4 text-right">
                            <a href="{{ route('admin.messages.show', $message) }}"
                               class="text-blue-600 font-semibold">
                                View
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="p-4">
            {{ $messages->links() }}
        </div>
    </div>

</div>
@endsection