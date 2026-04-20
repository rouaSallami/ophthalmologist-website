@extends('layouts.admin')

@section('title', 'Services')

@section('content')
    {{-- Header Section --}}
    <div class="mb-8 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-3xl font-extrabold text-primary tracking-tight">{{ __('messages.services') }}</h1>
            <p class="text-sm text-gray-500 mt-1">Manage and organize your service offerings.</p>
        </div>

        <a href="{{ route('admin.services.create') }}" class="inline-flex items-center justify-center bg-secondary hover:bg-primary text-white px-5 py-2.5 rounded-xl text-sm font-semibold transition-all duration-300 shadow-sm hover:shadow-md">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            {{ __('messages.add_service') }}
        </a>
    </div>

    {{-- Alert Success --}}
    @if (session('success'))
        <div 
            x-data="{ show: true }" 
            x-init="setTimeout(() => show = false, 3000)" 
            x-show="show"
            x-transition:leave="transition ease-in duration-300"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            class="mb-6 rounded-2xl border border-green-100 bg-green-50 p-4 text-sm text-green-700 flex items-center shadow-sm"
        >
            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
            </svg>
            {{ session('success') }}
        </div>
    @endif

    {{-- Grid Layout --}}
    @if ($services->count())
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 2xl:grid-cols-4 gap-6">
            @foreach ($services as $service)
                <div class="group bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-xl transition-all duration-500 flex flex-col">
                    
                    {{-- Card Image --}}
                    <div class="relative h-52 bg-gray-100 overflow-hidden">
                        @if ($service->image)
                            <img 
                                src="{{ asset('storage/' . $service->image) }}" 
                                alt="{{ $service->title }}"
                                class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700"
                            >
                        @else
                            <div class="w-full h-full flex items-center justify-center bg-accent/30">
                                <svg class="w-12 h-12 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                        @endif

                        {{-- Status Badge Overlay --}}
                        <div class="absolute top-4 left-4">
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider shadow-sm {{ $service->status === 'active' ? 'bg-green-500 text-white' : 'bg-gray-500 text-white' }}">
                                {{ $service->status }}
                            </span>
                        </div>

                        @if ($service->featured)
                            <div class="absolute top-4 right-4 bg-white/90 backdrop-blur-sm p-1.5 rounded-xl shadow-sm">
                                <span class="text-yellow-500 text-lg">⭐</span>
                            </div>
                        @endif
                    </div>

                    {{-- Card Content --}}
                    <div class="p-6 flex-1 flex flex-col">
                        <div class="mb-4">
                            <h2 class="text-xl font-bold text-primary truncate group-hover:text-secondary transition-colors">{{ $service->title }}</h2>
                            <p class="text-xs font-medium text-gray-400 mt-1 uppercase tracking-widest">{{ $service->slug }}</p>
                        </div>

                        @if ($service->short_description)
                            <p class="text-sm text-gray-600 line-clamp-2 mb-6 italic">
                                "{{ $service->short_description }}"
                            </p>
                        @endif

                        <div class="mt-auto pt-5 border-t border-gray-50 flex items-center justify-between">
                            <a href="{{ route('admin.services.edit', $service) }}"
                               class="flex items-center text-sm font-bold text-gray-700 hover:text-secondary transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                                Edit
                            </a>

                            <div class="flex items-center gap-2">
                                {{-- Star Toggle --}}
                                <form action="{{ route('admin.services.toggleFeatured', $service) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="p-2 rounded-lg hover:bg-yellow-50 transition-colors group/star">
                                        <span class="text-xl {{ $service->featured ? 'text-yellow-500' : 'text-gray-300 group-hover/star:text-yellow-400' }}">
                                            {{ $service->featured ? '★' : '☆' }}
                                        </span>
                                    </button>
                                </form>

                                {{-- Delete Button --}}
                                <form action="{{ route('admin.services.destroy', $service) }}" method="POST" onsubmit="return confirm('Delete this service?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="p-2 text-red-400 hover:text-red-600 hover:bg-red-50 rounded-lg transition-all">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="bg-white rounded-3xl shadow-sm border-2 border-dashed border-gray-200 p-16 text-center">
            <div class="bg-gray-50 w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-4">
                <svg class="w-10 h-10 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                </svg>
            </div>
            <h3 class="text-lg font-bold text-primary">No services yet</h3>
            <p class="text-gray-500 max-w-xs mx-auto mt-2">Get started by creating your first service to display on the website.</p>
            <a href="{{ route('admin.services.create') }}" class="mt-6 inline-flex items-center text-secondary font-bold hover:underline">
                Add your first service →
            </a>
        </div>
    @endif
@endsection