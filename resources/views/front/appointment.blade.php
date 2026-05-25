@extends('layouts.front')

@section('content')
<section class="relative py-16 sm:py-20 lg:py-24 overflow-hidden bg-white">
    <div class="absolute inset-0 pointer-events-none">
        <div class="absolute -top-24 -left-24 w-80 h-80 rounded-full bg-accent blur-3xl opacity-50"></div>
        <div class="absolute bottom-0 right-0 w-96 h-96 rounded-full bg-light blur-3xl opacity-25"></div>
    </div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl mx-auto text-center mb-14">
            <span class="inline-flex items-center px-4 py-2 rounded-full bg-accent text-secondary text-sm font-semibold shadow-sm">
                Online Booking
            </span>

            <h1 class="mt-5 text-3xl sm:text-4xl lg:text-5xl font-bold text-primary leading-tight">
                Take Care of Your Vision Today
            </h1>

            <p class="mt-4 text-base sm:text-lg text-muted leading-relaxed">
                Book your consultation with our specialists in just a few clicks. Simple, fast, and secure.
            </p>
        </div>

        <div class="grid lg:grid-cols-12 gap-10 lg:gap-12 items-start">
            <div class="lg:col-span-5 space-y-6">
                <div class="bg-white rounded-3xl border border-light shadow-sm p-6">
                    <h2 class="text-2xl font-bold text-primary mb-5">Why Choose Us?</h2>

                    <div class="space-y-4">
                        <div class="flex gap-4 rounded-2xl bg-[#F8FAFC] border border-light p-4">
                            <div class="w-11 h-11 rounded-xl bg-accent text-secondary flex items-center justify-center font-bold shrink-0">✓</div>
                            <div>
                                <h4 class="font-bold text-primary">Medical Expertise</h4>
                                <p class="text-sm text-muted mt-1">A team of highly qualified specialists at your service.</p>
                            </div>
                        </div>

                        <div class="flex gap-4 rounded-2xl bg-[#F8FAFC] border border-light p-4">
                            <div class="w-11 h-11 rounded-xl bg-accent text-secondary flex items-center justify-center font-bold shrink-0">✓</div>
                            <div>
                                <h4 class="font-bold text-primary">Speed & Punctuality</h4>
                                <p class="text-sm text-muted mt-1">Organized management designed to respect your time.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-primary rounded-3xl p-7 text-white shadow-xl relative overflow-hidden">
                    <div class="relative z-10">
                        <h3 class="text-xl font-bold mb-4">Need Help?</h3>

                        <div class="space-y-4">
                            <a href="tel:+21600000000" class="flex items-center">
                                <div class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center mr-4">☎</div>
                                <span class="text-base font-semibold">+216 00 000 000</span>
                            </a>

                            <div class="flex items-center">
                                <div class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center mr-4">📍</div>
                                <span class="text-base font-semibold">Tunis, Tunisia</span>
                            </div>
                        </div>
                    </div>

                    <div class="absolute -bottom-10 -right-10 w-36 h-36 bg-white/10 rounded-full blur-2xl"></div>
                </div>
            </div>

            <div class="lg:col-span-7">
                <div class="bg-white rounded-3xl p-6 sm:p-8 lg:p-10 shadow-[0_20px_60px_rgba(27,42,89,0.10)] border border-light">
                    @if(session('appointment_success'))
                        <div class="mb-6 rounded-2xl border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-700">
                            {{ session('appointment_success') }}
                        </div>
                    @endif

                    <form action="{{ route('appointment.store') }}" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        @csrf

                        <div class="md:col-span-2">
                            <label class="block text-sm font-semibold text-primary mb-2">Full Name</label>
                            <input type="text" name="name" placeholder="e.g., Ahmed Ben Salem"
                                class="w-full px-5 py-3.5 rounded-2xl bg-[#F8FAFC] border border-light focus:bg-white focus:border-secondary focus:ring-4 focus:ring-secondary/10 transition outline-none text-primary"
                                required>
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-primary mb-2">Email Address</label>
                            <input type="email" name="email" placeholder="name@example.com"
                                class="w-full px-5 py-3.5 rounded-2xl bg-[#F8FAFC] border border-light focus:bg-white focus:border-secondary focus:ring-4 focus:ring-secondary/10 transition outline-none text-primary">
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-primary mb-2">Phone Number</label>
                            <input type="text" name="phone" placeholder="+216 -- --- ---"
                                class="w-full px-5 py-3.5 rounded-2xl bg-[#F8FAFC] border border-light focus:bg-white focus:border-secondary focus:ring-4 focus:ring-secondary/10 transition outline-none text-primary"
                                required>
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-primary mb-2">Preferred Date</label>
                            <input type="date" name="appointment_date"
                                class="w-full px-5 py-3.5 rounded-2xl bg-[#F8FAFC] border border-light focus:bg-white focus:border-secondary focus:ring-4 focus:ring-secondary/10 transition outline-none text-primary">
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-primary mb-2">Service</label>
                            <select name="service"
                                class="w-full px-5 py-3.5 rounded-2xl bg-[#F8FAFC] border border-light focus:bg-white focus:border-secondary focus:ring-4 focus:ring-secondary/10 transition outline-none text-primary">
                                <option value="">Choose a service</option>
                                <option value="Eye Examination">Eye Examination</option>
                                <option value="Vision Correction">Vision Correction</option>
                                <option value="Laser Surgery">Laser Surgery</option>
                            </select>
                        </div>

                        <div class="md:col-span-2">
                            <label class="block text-sm font-semibold text-primary mb-2">Message or Note</label>
                            <textarea name="message" rows="4" placeholder="Tell us more about your needs..."
                                class="w-full px-5 py-3.5 rounded-2xl bg-[#F8FAFC] border border-light focus:bg-white focus:border-secondary focus:ring-4 focus:ring-secondary/10 transition outline-none text-primary"></textarea>
                        </div>

                        <div class="md:col-span-2 pt-2">
                            <button type="submit"
                                class="w-full bg-secondary hover:bg-primary text-white py-4 rounded-2xl font-bold text-base sm:text-lg shadow-lg shadow-secondary/20 transition active:scale-[0.98]">
                                Confirm Appointment →
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection