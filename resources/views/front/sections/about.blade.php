<section id="about" class="relative py-16 sm:py-20 lg:py-24 bg-white overflow-hidden">
    <div class="absolute inset-0 pointer-events-none">
        <div class="absolute top-0 left-0 w-56 h-56 bg-accent rounded-full blur-3xl opacity-40"></div>
        <div class="absolute bottom-0 right-0 w-64 h-64 bg-light rounded-full blur-3xl opacity-30"></div>
    </div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="max-w-3xl mx-auto text-center mb-12 lg:mb-16">
            <span class="inline-flex items-center px-4 py-2 rounded-full bg-accent text-secondary text-xs sm:text-sm font-semibold shadow-sm">
                {{ $about->badge ?? 'About Us' }}
            </span>

            <h2 class="mt-5 text-3xl sm:text-4xl lg:text-5xl font-bold text-primary leading-tight">
                {{ $about->title ?? 'We Provide The Best Eye Care Solutions With Modern Technology' }}
            </h2>

            <p class="mt-4 text-sm sm:text-base lg:text-lg text-muted leading-relaxed">
                {{ $about->description ?? 'At Dr. Ophtha Clinic, we are dedicated to delivering high-quality ophthalmology services using advanced technology and personalized care.' }}
            </p>
        </div>

        <div class="grid lg:grid-cols-2 gap-10 lg:gap-14 items-center">

            <div class="relative lg:order-last">
                <div class="rounded-[2rem] overflow-hidden border border-light shadow-lg bg-[#F8FAFC]">
                    <img
                        src="{{ !empty($about?->image) ? asset('storage/' . $about->image) : asset('images/about.jpg') }}"
                        alt="About Clinic"
                        class="w-full h-[320px] sm:h-[420px] lg:h-[460px] object-cover"
                    >
                </div>

                <div class="absolute -bottom-5 left-5 bg-white px-5 py-4 rounded-2xl shadow-lg border border-light">
                    <p class="text-primary font-bold text-xl">
                        {{ $about->experience_text ?? '15+ Years' }}
                    </p>
                    <p class="text-sm text-muted">Experience</p>
                </div>
            </div>

            <div class="grid sm:grid-cols-2 gap-6 lg:order-first">
                @if(!empty($about?->point_one))
                    <div class="bg-[#F8FAFC] rounded-2xl p-6 border border-light hover:shadow-md transition">
                        <h3 class="text-lg font-bold text-primary mb-3">Advanced Care</h3>
                        <p class="text-sm text-muted leading-relaxed">
                            {{ $about->point_one }}
                        </p>
                    </div>
                @endif

                @if(!empty($about?->point_two))
                    <div class="bg-[#F8FAFC] rounded-2xl p-6 border border-light hover:shadow-md transition">
                        <h3 class="text-lg font-bold text-primary mb-3">Expert Team</h3>
                        <p class="text-sm text-muted leading-relaxed">
                            {{ $about->point_two }}
                        </p>
                    </div>
                @endif

                @if(!empty($about?->point_three))
                    <div class="bg-[#F8FAFC] rounded-2xl p-6 border border-light hover:shadow-md transition sm:col-span-2">
                        <h3 class="text-lg font-bold text-primary mb-3">Personalized Treatment</h3>
                        <p class="text-sm text-muted leading-relaxed">
                            {{ $about->point_three }}
                        </p>
                    </div>
                @endif

                <div class="sm:col-span-2 pt-2">
                    <a href="{{ $about->button_link ?? '#contact' }}"
                       class="inline-block px-6 py-3 rounded-xl bg-secondary text-white font-medium hover:bg-primary transition">
                        {{ $about->button_text ?? 'Book Appointment' }}
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>