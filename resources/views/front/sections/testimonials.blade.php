<style>
.testimonials-swiper {
    padding: 10px 6px 20px;
}

.testimonials-swiper .swiper-slide {
    height: auto;
}

.testimonial-card {
    background: linear-gradient(180deg, #f8fafc 0%, #ffffff 100%);
    border: 1px solid #dbeafe;
    border-radius: 28px;
    padding: 24px;
    height: 100%;
    box-shadow: 0 10px 30px rgba(15, 23, 42, 0.06);
    transition: all 0.3s ease;
}

.testimonial-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 18px 40px rgba(15, 23, 42, 0.10);
    border-color: #bfdbfe;
}

.testimonial-image {
    width: 58px;
    height: 58px;
    border-radius: 9999px;
    overflow: hidden;
    background: #e0e7ff;
    border: 3px solid #ffffff;
    box-shadow: 0 4px 14px rgba(30, 58, 138, 0.12);
    flex-shrink: 0;
}

.testimonial-stars {
    color: #f59e0b;
    font-size: 18px;
    letter-spacing: 2px;
    margin-bottom: 14px;
}

.testimonial-quote {
    font-size: 15px;
    line-height: 1.9;
    color: #64748b;
}

.testimonial-meta h3 {
    font-size: 22px;
    line-height: 1.2;
}

.testimonial-role {
    font-size: 14px;
    color: #94a3b8;
    margin-top: 4px;
}

.swiper-pagination {
    position: static !important;
    margin-top: 24px;
}

.swiper-pagination .swiper-pagination-bullet {
    width: 10px;
    height: 10px;
    background: #cbd5e1;
    opacity: 1;
}

.swiper-pagination .swiper-pagination-bullet-active {
    background: #1e3a8a;
    width: 24px;
    border-radius: 9999px;
}

.swiper-nav-wrapper {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 16px;
    margin-top: 20px;
}

.swiper-nav-wrapper .swiper-button-next,
.swiper-nav-wrapper .swiper-button-prev {
    position: static !important;
    width: 48px !important;
    height: 48px !important;
    margin: 0 !important;
    background: #ffffff;
    border: 1px solid #dbeafe;
    border-radius: 9999px;
    color: #1e3a8a !important;
    box-shadow: 0 8px 20px rgba(30, 58, 138, 0.08);
    transition: all 0.3s ease;
}

.swiper-nav-wrapper .swiper-button-next::after,
.swiper-nav-wrapper .swiper-button-prev::after {
    font-size: 16px !important;
    font-weight: 700;
}

.swiper-nav-wrapper .swiper-button-next:hover,
.swiper-nav-wrapper .swiper-button-prev:hover {
    background: #1e3a8a;
    color: white !important;
    border-color: #1e3a8a;
    transform: translateY(-2px);
}

.swiper-nav-wrapper .swiper-button-disabled {
    opacity: 0.4;
    cursor: not-allowed;
    transform: none !important;
    box-shadow: none;
}
</style>

<section id="testimonials" class="relative py-16 sm:py-20 lg:py-24 bg-white overflow-hidden">
    <div class="absolute inset-0 pointer-events-none">
        <div class="absolute top-0 right-0 w-56 h-56 bg-accent rounded-full blur-3xl opacity-40"></div>
        <div class="absolute bottom-0 left-0 w-64 h-64 bg-light rounded-full blur-3xl opacity-30"></div>
    </div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-2xl mx-auto text-center mb-12 lg:mb-16">
            <span class="inline-flex items-center px-4 py-2 rounded-full bg-accent text-secondary text-xs sm:text-sm font-semibold shadow-sm">
                Testimonials
            </span>
            <h2 class="mt-5 text-3xl sm:text-4xl lg:text-5xl font-bold text-primary leading-tight">
                What Our Patients Say
            </h2>
            <p class="mt-4 text-sm sm:text-base lg:text-lg text-muted leading-relaxed">
                Real experiences from patients who trusted our clinic for their eye care journey.
            </p>
        </div>

        @if($testimonials->isNotEmpty())
    <div class="testimonials-swiper-outer">
        <div class="swiper mySwiper testimonials-swiper">
            <div class="swiper-wrapper">
                @foreach($testimonials as $testimonial)
                    <div class="swiper-slide">
                        <div class="testimonial-card">
                            <div class="flex items-center gap-4 mb-5">
                                <div class="testimonial-image">
                                    @if($testimonial->image)
                                        <img src="{{ asset('storage/' . $testimonial->image) }}" alt="{{ $testimonial->name }}" class="w-full h-full object-cover">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center text-primary font-bold">
                                            {{ strtoupper(substr($testimonial->name, 0, 1)) }}
                                        </div>
                                    @endif
                                </div>

                                <div>
                                    <h3 class="font-bold text-primary">{{ $testimonial->name }}</h3>
                                    <p class="text-sm text-slate-400">{{ $testimonial->role ?? 'Patient' }}</p>
                                </div>
                            </div>

                            <div class="testimonial-stars">
                                @for($i=1; $i<=5; $i++)
                                    {{ $i <= $testimonial->rating ? '★' : '☆' }}
                                @endfor
                            </div>

                            <p class="testimonial-quote">
                                “{{ Str::limit($testimonial->review, 140) }}”
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="swiper-pagination"></div>
        </div>

        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
    </div>
@endif
    </div>
</section>