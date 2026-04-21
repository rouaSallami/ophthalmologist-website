<section class="relative py-16 sm:py-20 lg:py-24 bg-white overflow-hidden">
    <div class="absolute inset-0 pointer-events-none">
        <div class="absolute top-0 left-0 w-56 h-56 bg-accent rounded-full blur-3xl opacity-40"></div>
        <div class="absolute bottom-0 right-0 w-64 h-64 bg-light rounded-full blur-3xl opacity-30"></div>
    </div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-2xl mx-auto text-center mb-12 lg:mb-16">
            <span class="inline-flex items-center px-4 py-2 rounded-full bg-accent text-secondary text-xs sm:text-sm font-semibold shadow-sm">
                {{ $whyChooseUs->badge ?? 'Why Choose Us' }}
            </span>

            <h2 class="mt-5 text-3xl sm:text-4xl lg:text-5xl font-bold text-primary leading-tight">
                {{ $whyChooseUs->title ?? 'Excellence in Eye Care You Can Trust' }}
            </h2>

            <p class="mt-4 text-sm sm:text-base lg:text-lg text-muted leading-relaxed">
                {{ $whyChooseUs->description ?? 'We combine expertise, advanced technology, and personalized care to deliver the best possible vision outcomes for our patients.' }}
            </p>
        </div>

        <div class="grid lg:grid-cols-2 gap-12 lg:gap-16 items-center">
            <div class="relative">
                <div class="absolute -top-6 -left-6 w-32 h-32 bg-accent rounded-full blur-3xl opacity-60"></div>
                <div class="absolute -bottom-6 -right-6 w-40 h-40 bg-light rounded-full blur-3xl opacity-40"></div>

                <div class="relative rounded-[2rem] overflow-hidden border border-light shadow-lg">
                    <img
                        src="{{ !empty($whyChooseUs?->image) ? asset('storage/' . $whyChooseUs->image) : asset('images/why-choose-us.jpg') }}"
                        alt="Why choose us"
                        class="w-full h-[320px] sm:h-[420px] object-cover"
                    >
                </div>
            </div>

            <div class="grid sm:grid-cols-2 gap-6">
                @forelse($whyChooseUs?->features ?? [] as $feature)
                    <div class="bg-[#F8FAFC] rounded-2xl p-6 border border-light hover:shadow-md transition">
                        <h3 class="text-lg font-bold text-primary">{{ $feature->title }}</h3>
                        <p class="mt-2 text-sm text-muted">
                            {{ $feature->description }}
                        </p>
                    </div>
                @empty
                    <div class="bg-[#F8FAFC] rounded-2xl p-6 border border-light">
                        <h3 class="text-lg font-bold text-primary">Experienced Specialists</h3>
                        <p class="mt-2 text-sm text-muted">Professional eye care with patient-focused treatment.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</section>