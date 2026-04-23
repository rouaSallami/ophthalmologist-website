@extends('layouts.admin')

@section('title', 'Testimonials')

@section('content')
<div class="mb-8 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
    <div>
        <h1 class="text-3xl font-extrabold text-primary tracking-tight">Testimonials</h1>
        <p class="text-sm text-gray-500 mt-1">Manage patient reviews and featured testimonials.</p>
    </div>

    <a href="{{ route('admin.testimonials.create') }}"
       class="inline-flex items-center justify-center bg-secondary hover:bg-primary text-white px-5 py-2.5 rounded-xl text-sm font-semibold transition">
        Add Testimonial
    </a>
</div>

@if(session('success'))
    <div class="mb-6 rounded-2xl border border-green-100 bg-green-50 p-4 text-sm text-green-700">
        {{ session('success') }}
    </div>
@endif

@if($testimonials->isNotEmpty())
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
        @foreach($testimonials as $testimonial)
            <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden flex flex-col">
                <div class="p-6 flex items-center gap-4 border-b border-gray-50">
                    <div class="w-16 h-16 rounded-full overflow-hidden bg-accent/30 shrink-0">
                        @if($testimonial->image)
                            <img src="{{ asset('storage/' . $testimonial->image) }}" alt="{{ $testimonial->name }}" class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full flex items-center justify-center text-primary font-bold">
                                {{ strtoupper(substr($testimonial->name, 0, 1)) }}
                            </div>
                        @endif
                    </div>

                    <div class="min-w-0">
                        <h2 class="text-lg font-bold text-primary truncate">{{ $testimonial->name }}</h2>
                        <p class="text-sm text-muted">{{ $testimonial->role ?? 'Patient' }}</p>
                        <p class="text-sm text-yellow-500 mt-1">
                            @for($i = 1; $i <= 5; $i++)
                                {{ $i <= $testimonial->rating ? '★' : '☆' }}
                            @endfor
                        </p>
                    </div>
                </div>

                <div class="p-6 flex-1">
                    <p class="text-sm text-gray-600 leading-relaxed">
                        "{{ \Illuminate\Support\Str::limit($testimonial->review, 140) }}"
                    </p>
                </div>

                <div class="px-6 pb-6 flex items-center justify-between">
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider {{ $testimonial->status === 'active' ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-600' }}">
                        {{ $testimonial->status }}
                    </span>

                    <div class="flex items-center gap-2">
                        <form action="{{ route('admin.testimonials.toggleFeatured', $testimonial) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="p-2 rounded-lg hover:bg-yellow-50 transition">
                                <span class="text-lg {{ $testimonial->featured ? 'text-yellow-500' : 'text-gray-300' }}">
                                    {{ $testimonial->featured ? '★' : '☆' }}
                                </span>
                            </button>
                        </form>

                        <a href="{{ route('admin.testimonials.edit', $testimonial) }}" class="text-sm font-semibold text-primary hover:text-secondary transition">
                            Edit
                        </a>

                        <form action="{{ route('admin.testimonials.destroy', $testimonial) }}" method="POST" onsubmit="return confirm('Delete this testimonial?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-sm font-semibold text-red-500 hover:text-red-700 transition">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@else
    <div class="bg-white rounded-3xl shadow-sm border-2 border-dashed border-gray-200 p-16 text-center">
        <h3 class="text-lg font-bold text-primary">No testimonials yet</h3>
        <p class="text-gray-500 max-w-xs mx-auto mt-2">Create your first testimonial to build trust on the website.</p>
        <a href="{{ route('admin.testimonials.create') }}" class="mt-6 inline-flex items-center text-secondary font-bold hover:underline">
            Add your first testimonial →
        </a>
    </div>
@endif
@endsection