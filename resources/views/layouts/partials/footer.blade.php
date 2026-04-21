<footer class="bg-[#1B2A59] text-white mt-20">
    <div class="max-w-7xl mx-auto px-6 py-16">

        <div class="grid md:grid-cols-4 gap-10">

            <!-- Brand -->
            <div>
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-10 h-10 bg-white text-[#1B2A59] rounded-xl flex items-center justify-center font-bold">
                        O
                    </div>
                    <div>
                        <h2 class="font-bold text-lg">Dr. Ophtha</h2>
                        <p class="text-xs text-[#B4C0D9]">Eye Clinic</p>
                    </div>
                </div>

                <!-- 🔥 dynamic description -->
                <p class="text-sm text-[#B4C0D9] leading-relaxed">
                    {{ $footer->description ?? 'Providing professional eye care services with modern technology and personalized treatment for better vision.' }}
                </p>

                <!-- Social -->
                <div class="flex gap-3 mt-5">
                    <a href="{{ $footer->facebook ?? '#' }}" class="w-9 h-9 flex items-center justify-center rounded-lg bg-[#143373] hover:bg-white hover:text-[#1B2A59] transition">F</a>
                    <a href="{{ $footer->instagram ?? '#' }}" class="w-9 h-9 flex items-center justify-center rounded-lg bg-[#143373] hover:bg-white hover:text-[#1B2A59] transition">I</a>
                    <a href="{{ $footer->linkedin ?? '#' }}" class="w-9 h-9 flex items-center justify-center rounded-lg bg-[#143373] hover:bg-white hover:text-[#1B2A59] transition">L</a>
                </div>
            </div>

            <!-- Links -->
            <div>
                <h3 class="font-semibold mb-4 text-white">Quick Links</h3>
                <ul class="space-y-3 text-sm">
                    <li><a href="#home" class="footer-link">Home</a></li>
                    <li><a href="#about" class="footer-link">About</a></li>
                    <li><a href="#services" class="footer-link">Services</a></li>
                    <li><a href="#contact" class="footer-link">Contact</a></li>
                </ul>
            </div>

            <!-- Services -->
            <div>
                <h3 class="font-semibold mb-4 text-white">Services</h3>
                <ul class="space-y-3 text-sm text-[#B4C0D9]">
                    <li>Eye Examination</li>
                    <li>Vision Correction</li>
                    <li>Laser Surgery</li>
                    <li>Contact Lenses</li>
                </ul>
            </div>

            <!-- Contact -->
            <div>
                <h3 class="font-semibold mb-4 text-white">Contact</h3>

                <ul class="space-y-3 text-sm text-[#B4C0D9]">
                    <li>📍 {{ $footer->address ?? 'Tunis, Tunisia' }}</li>
                    <li>📞 {{ $footer->phone ?? '+216 00 000 000' }}</li>
                    <li>✉️ {{ $footer->email ?? 'contact@ophtha.com' }}</li>
                    <li>🕒 {{ $footer->hours ?? 'Mon - Sat: 9:00 - 18:00' }}</li>
                </ul>
            </div>

        </div>

        <!-- Bottom -->
        <div class="border-t border-[#143373] mt-12 pt-6 flex flex-col md:flex-row justify-between items-center gap-4">

            <p class="text-sm text-[#B4C0D9]">
                © {{ date('Y') }} Dr. Ophtha Clinic. All rights reserved.
            </p>

            <div class="flex gap-6 text-sm">
                <a href="#" class="footer-link">Privacy Policy</a>
                <a href="#" class="footer-link">Terms of Service</a>
            </div>

        </div>
    </div>
</footer>