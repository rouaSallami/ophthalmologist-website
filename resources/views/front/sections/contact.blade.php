<section id="contact" class="py-8 bg-accent">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Title -->
        <div class="text-center mb-12">
            <span class="inline-block px-4 py-1 rounded-full bg-white text-primary text-sm font-semibold">
                Contact Us
            </span>

            <h2 class="mt-4 text-3xl sm:text-4xl font-bold text-primary">
                Get In Touch With Us
            </h2>

            <p class="mt-3 text-muted max-w-xl mx-auto">
                Have a question or need help? Send us a message and we’ll get back to you as soon as possible.
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 items-start">

            <!-- Left: Info -->
            <div class="space-y-6">
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-light">
                    <h3 class="text-lg font-semibold text-primary">Clinic Address</h3>
                    <p class="text-muted mt-2">Tunis, Tunisia</p>
                </div>

                <div class="bg-white p-6 rounded-2xl shadow-sm border border-light">
                    <h3 class="text-lg font-semibold text-primary">Call Us</h3>
                    <p class="text-muted mt-2">+216 00 000 000</p>
                </div>

                <div class="bg-white p-6 rounded-2xl shadow-sm border border-light">
                    <h3 class="text-lg font-semibold text-primary">Email</h3>
                    <p class="text-muted mt-2">contact@ophtha.com</p>
                </div>
            </div>

            <!-- Right: Form -->
             @if(session('success'))
    <div class="mb-4 rounded-xl bg-green-50 border border-green-200 px-4 py-3 text-green-700">
        {{ session('success') }}
    </div>
@endif

            <form action="{{ route('contact.store') }}" method="POST"
                  class="bg-white p-8 rounded-2xl shadow-md border border-light space-y-5">

                @csrf

                <div>
                    <label class="text-sm text-primary font-medium">Full Name</label>
                    <input type="text" name="name"
                        class="w-full mt-2 px-4 py-3 rounded-xl border border-light focus:ring-2 focus:ring-primary outline-none"
                        placeholder="Your name" required>
                </div>

                <div>
                    <label class="text-sm text-primary font-medium">Email</label>
                    <input type="email" name="email"
                        class="w-full mt-2 px-4 py-3 rounded-xl border border-light focus:ring-2 focus:ring-primary outline-none"
                        placeholder="Your email">
                </div>

                <div>
                    <label class="text-sm text-primary font-medium">Subject</label>
                    <input type="text" name="subject"
                        class="w-full mt-2 px-4 py-3 rounded-xl border border-light focus:ring-2 focus:ring-primary outline-none"
                        placeholder="Subject">
                </div>

                <div>
                    <label class="text-sm text-primary font-medium">Message</label>
                    <textarea name="message" rows="4"
                        class="w-full mt-2 px-4 py-3 rounded-xl border border-light focus:ring-2 focus:ring-primary outline-none"
                        placeholder="Write your message..." required></textarea>
                </div>

                <button type="submit"
                    class="w-full bg-secondary text-white py-3 rounded-xl font-semibold hover:bg-primary transition">
                    Send Message
                </button>

            </form>

        </div>
    </div>
</section>