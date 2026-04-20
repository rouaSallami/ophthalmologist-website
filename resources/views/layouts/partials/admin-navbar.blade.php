<nav class="bg-primary shadow-md border-b border-white/10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
            
            <div class="flex items-center gap-8">
                <a href="{{ route('admin.dashboard') }}" class="text-white text-xl font-bold tracking-wide">
                    Ophthalmologist Admin
                </a>

                <div class="hidden md:flex items-center gap-6">
                    <a href="{{ route('admin.dashboard') }}"
                       class="text-white/90 hover:text-white transition font-medium text-sm">
                        Dashboard
                    </a>

                    <a href="#"
                       class="text-white/70 hover:text-white transition font-medium text-sm">
                        Services
                    </a>

                    <a href="#"
                       class="text-white/70 hover:text-white transition font-medium text-sm">
                        Testimonials
                    </a>

                    <a href="#"
                       class="text-white/70 hover:text-white transition font-medium text-sm">
                        Settings
                    </a>
                </div>
            </div>

            <div class="flex items-center gap-4">
                <div class="hidden sm:flex flex-col text-right">
                    <span class="text-white text-sm font-semibold">{{ auth()->user()->name }}</span>
                    <span class="text-white/70 text-xs">{{ auth()->user()->email }}</span>
                </div>

                

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="bg-white/10 hover:bg-white/20 text-white text-sm font-medium px-4 py-2 rounded-lg transition">
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </div>
</nav>


