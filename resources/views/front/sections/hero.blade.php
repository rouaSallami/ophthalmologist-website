<section id="home" class="relative overflow-hidden bg-white pt-4 pb-16 sm:pt-8 sm:pb-20 lg:pt-10 lg:pb-28">
    <!-- Background effects -->
    <div class="absolute inset-0 pointer-events-none">
        <div class="absolute top-0 left-0 w-48 h-48 sm:w-72 sm:h-72 bg-accent rounded-full blur-3xl opacity-50"></div>
        <div class="absolute bottom-0 right-0 w-56 h-56 sm:w-80 sm:h-80 bg-light rounded-full blur-3xl opacity-30"></div>
    </div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-10 lg:gap-14 items-center">

            <!-- Left Content -->
            <div class="order-2 lg:order-1 text-center lg:text-left">
                @if(!empty($hero?->badge_text))
                    <div class="inline-flex items-center px-4 py-2 rounded-full bg-accent text-secondary text-xs sm:text-sm font-semibold mb-5 shadow-sm">
                        {{ $hero->badge_text }}
                    </div>
                @endif

                @if(!empty($hero?->subtitle))
                    <p class="text-xs sm:text-sm font-semibold uppercase tracking-[0.2em] text-muted mb-4">
                        {{ $hero->subtitle }}
                    </p>
                @endif

                <h1 class="text-3xl sm:text-4xl lg:text-6xl font-bold text-primary leading-tight max-w-2xl mx-auto lg:mx-0">
                    {{ $hero->title ?? 'Professional Eye Care for Better Vision' }}
                </h1>

                <p class="mt-5 text-sm sm:text-base lg:text-lg text-muted leading-relaxed max-w-2xl mx-auto lg:mx-0">
                    {{ $hero->description ?? 'We provide advanced ophthalmology services with modern technology, precise diagnosis, and personalized treatment to protect and improve your vision.' }}
                </p>

                <!-- Buttons -->
                <div class="mt-8 flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
                    <a href="{{ $hero->button_link ?? '#appointment' }}"
                       class="inline-flex items-center justify-center rounded-2xl bg-secondary px-6 py-3.5 text-white text-sm sm:text-base font-semibold shadow-lg hover:bg-primary transition duration-300">
                        {{ $hero->button_text ?? 'Book Appointment' }}
                    </a>

                    <a href="{{ $hero->secondary_button_link ?? ('tel:' . preg_replace('/\s+/', '', $hero->phone ?? '+21600000000')) }}"
                       class="inline-flex items-center justify-center rounded-2xl border border-light bg-white px-6 py-3.5 text-primary text-sm sm:text-base font-semibold hover:bg-accent transition duration-300">
                        {{ $hero->secondary_button_text ?? 'Call Now' }}
                    </a>
                </div>

                <!-- Phone -->
                @if(!empty($hero?->phone))
                    <div class="mt-6">
                        <p class="text-sm text-muted">Call us directly</p>
                        <a href="tel:{{ preg_replace('/\s+/', '', $hero->phone) }}"
                           class="text-base sm:text-lg font-bold text-primary hover:text-secondary transition">
                            {{ $hero->phone }}
                        </a>
                    </div>
                @endif

                <!-- Stats -->
                <div class="mt-10 grid grid-cols-1 sm:grid-cols-3 gap-4">
                    <div class="rounded-2xl border border-light bg-white p-4 shadow-sm text-center sm:text-left">
                        <h3 class="text-xl sm:text-2xl font-bold text-primary">
                            {{ $hero->experience_text ?? '15+ Years' }}
                        </h3>
                        <p class="text-sm text-muted mt-1">Experience</p>
                    </div>

                    <div class="rounded-2xl border border-light bg-white p-4 shadow-sm text-center sm:text-left">
                        <h3 class="text-xl sm:text-2xl font-bold text-primary">
                            {{ $hero->patients_text ?? '5k+ Patients' }}
                        </h3>
                        <p class="text-sm text-muted mt-1">Satisfied Patients</p>
                    </div>

                    <div class="rounded-2xl border border-light bg-white p-4 shadow-sm text-center sm:text-left">
                        <h3 class="text-xl sm:text-2xl font-bold text-primary">
                            Modern Care
                        </h3>
                        <p class="text-sm text-muted mt-1">Advanced Equipment</p>
                    </div>
                </div>
            </div>

            <!-- Right Image -->
            <div class="relative order-1 lg:order-2">
                <div class="absolute -top-4 -left-4 sm:-top-6 sm:-left-6 w-20 h-20 sm:w-32 sm:h-32 bg-accent rounded-full blur-3xl opacity-70"></div>
                <div class="absolute -bottom-4 -right-4 sm:-bottom-6 sm:-right-6 w-24 h-24 sm:w-40 sm:h-40 bg-light rounded-full blur-3xl opacity-40"></div>

                <div class="relative rounded-[2rem] bg-white p-2 sm:p-3 shadow-[0_20px_60px_rgba(27,42,89,0.12)] border border-light max-w-[300px] sm:max-w-[420px] lg:max-w-[580px] mx-auto">
                    <div class="relative w-full h-[240px] sm:h-[360px] lg:h-[500px] overflow-hidden rounded-[1.5rem]">
                        <img
                            src="{{ !empty($hero?->image) ? asset('storage/' . $hero->image) : asset('images/hero-doctor.jpg') }}"
                            alt="Eye clinic hero image"
                            class="w-full h-full object-cover"
                        >

                        <!-- Floating cards -->
                        <div class="absolute top-3 left-3 sm:top-6 sm:left-6 bg-white/95 backdrop-blur rounded-2xl px-3 py-2 sm:px-4 sm:py-3 shadow-lg border border-light max-w-[140px] sm:max-w-none">
                            <p class="text-[10px] sm:text-xs text-muted">Trusted Care</p>
                            <p class="text-xs sm:text-sm font-bold text-primary leading-snug">Certified Specialist</p>
                        </div>

                        <div class="absolute bottom-3 right-3 sm:bottom-6 sm:right-6 bg-white/95 backdrop-blur rounded-2xl px-3 py-2 sm:px-4 sm:py-3 shadow-lg border border-light max-w-[150px] sm:max-w-none">
                            <p class="text-[10px] sm:text-xs text-muted">Available Support</p>
                            <p class="text-xs sm:text-sm font-bold text-primary leading-snug">Book or Call Anytime</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>