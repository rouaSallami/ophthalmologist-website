@php use Illuminate\Support\Str; @endphp
<section id="services" class="relative py-16 sm:py-20 lg:py-24 bg-[#F8FAFC] overflow-hidden">
    <!-- Background effects -->
    <div class="absolute inset-0 pointer-events-none">
        <div class="absolute top-0 right-0 w-56 h-56 sm:w-72 sm:h-72 bg-accent rounded-full blur-3xl opacity-40"></div>
        <div class="absolute bottom-0 left-0 w-48 h-48 sm:w-64 sm:h-64 bg-light rounded-full blur-3xl opacity-30"></div>
    </div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Section Header -->
        <div class="max-w-2xl mx-auto text-center mb-12 lg:mb-16">
            <span class="inline-flex items-center px-4 py-2 rounded-full bg-accent text-secondary text-xs sm:text-sm font-semibold shadow-sm">
                Our Services
            </span>

            <h2 class="mt-5 text-3xl sm:text-4xl lg:text-5xl font-bold text-primary leading-tight">
                Advanced Eye Care Services Tailored to Your Needs
            </h2>

            <p class="mt-4 text-sm sm:text-base lg:text-lg text-muted leading-relaxed">
                Discover our specialized ophthalmology services designed to protect, improve, and maintain your vision with expert care and modern equipment.
            </p>
        </div>

        @if($services->isNotEmpty())
            <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-6 lg:gap-8">
                @foreach($services as $service)
                    <div class="group bg-white rounded-[1.75rem] border border-light shadow-sm hover:shadow-[0_20px_60px_rgba(27,42,89,0.10)] transition-all duration-500 overflow-hidden flex flex-col">
                        <!-- Image -->
                        <div class="relative h-56 overflow-hidden bg-accent/20">
                            @if($service->image)
                                <img
                                    src="{{ asset('storage/' . $service->image) }}"
                                    alt="{{ $service->title }}"
                                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700"
                                >
                            @else
                                <div class="w-full h-full flex items-center justify-center bg-accent/30">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 text-muted/40" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 15.75l4.5-4.5a2.121 2.121 0 013 0l4.5 4.5m-1.5-1.5l1.125-1.125a2.121 2.121 0 013 0l1.125 1.125M3.75 7.5A2.25 2.25 0 016 5.25h12A2.25 2.25 0 0120.25 7.5v9A2.25 2.25 0 0118 18.75H6A2.25 2.25 0 013.75 16.5v-9z" />
                                    </svg>
                                </div>
                            @endif

                            @if($service->featured)
                                <div class="absolute top-4 left-4">
                                    <span class="inline-flex items-center rounded-full bg-white/90 backdrop-blur px-3 py-1 text-xs font-semibold text-secondary shadow-sm">
                                        Featured
                                    </span>
                                </div>
                            @endif
                        </div>

                        <!-- Content -->
                        <div class="p-6 flex-1 flex flex-col">
                            <div class="mb-4">
                                <h3 class="text-xl font-bold text-primary group-hover:text-secondary transition">
                                    {{ $service->title }}
                                </h3>

                                @if(!empty($service->slug))
                                    <p class="mt-1 text-xs uppercase tracking-[0.18em] text-muted">
                                        {{ $service->slug }}
                                    </p>
                                @endif
                            </div>

                            <p class="text-sm sm:text-base text-muted leading-relaxed flex-1">
                                {{ $service->short_description ?? Str::limit($service->description, 110) ?? 'Professional eye care service designed with precision and patient comfort in mind.' }}
                            </p>

                            <div class="mt-6 pt-5 border-t border-light flex items-center justify-between">
                                <span class="text-sm font-semibold text-primary">
                                    Expert Care
                                </span>

                                <a href="#appointment"
                                   class="inline-flex items-center text-sm font-semibold text-secondary hover:text-primary transition">
                                    Book Now
                                    <svg xmlns="http://www.w3.org/2000/svg" class="ml-2 w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.75L21 12m0 0l-3.75 3.25M21 12H3" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- CTA -->
            <div class="mt-12 text-center">
                <a href="#appointment"
                   class="inline-flex items-center justify-center rounded-2xl bg-secondary px-6 py-3.5 text-white text-sm sm:text-base font-semibold shadow-lg hover:bg-primary transition duration-300">
                    Book Your Consultation
                </a>
            </div>
        @else
            <div class="max-w-2xl mx-auto rounded-[2rem] border border-dashed border-light bg-white p-10 sm:p-14 text-center shadow-sm">
                <div class="w-16 h-16 mx-auto rounded-full bg-accent flex items-center justify-center mb-5">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-secondary" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.7">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 12c0 4.418-4.03 8-9 8s-9-3.582-9-8 4.03-8 9-8 9 3.582 9 8z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                </div>

                <h3 class="text-2xl font-bold text-primary">Services Coming Soon</h3>
                <p class="mt-3 text-muted">
                    We are preparing to showcase our full range of eye care services. Please check back soon.
                </p>
            </div>
        @endif
    </div>
</section>