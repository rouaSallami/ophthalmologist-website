<div>
    <!-- Mobile overlay -->
    <div
        x-show="sidebarOpen"
        x-transition.opacity
        class="fixed inset-0 bg-black/50 z-40 lg:hidden"
        @click="sidebarOpen = false"
        style="display: none;"
    ></div>

    <!-- Sidebar -->
    <aside
        x-show="sidebarOpen || window.innerWidth >= 1024"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="-translate-x-full"
        x-transition:enter-end="translate-x-0"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="translate-x-0"
        x-transition:leave-end="-translate-x-full"
        class="fixed top-0 left-0 z-50 w-64 h-screen bg-primary text-white flex flex-col lg:translate-x-0 lg:block"
        style="display: none;"
    >
        <div class="flex items-center justify-between px-6 py-5 border-b border-white/10">
            <div>
                <h2 class="text-lg font-bold">Admin Panel</h2>
                <p class="text-xs text-white/70 mt-1">Ophthalmologist Website</p>
            </div>

            <button
                @click="sidebarOpen = false"
                class="lg:hidden text-white/80 hover:text-white text-xl"
            >
                ×
            </button>
        </div>

        <div class="px-6 py-4 border-b border-white/10">
            <p class="text-sm font-medium">{{ auth()->user()->name }}</p>
            <p class="text-xs text-white/70">{{ auth()->user()->email }}</p>
        </div>

        <nav class="flex-1 px-4 py-6 space-y-2">
            <a
                href="{{ route('admin.dashboard') }}"
                class="flex items-center px-4 py-3 rounded-xl transition
                {{ request()->routeIs('admin.dashboard') ? 'bg-secondary text-white shadow' : 'text-white/80 hover:bg-white/10 hover:text-white' }}"
            >
                {{ __('messages.dashboard') }}
            </a>

            <a
                href="{{ route('admin.services.index') }}"
                class="flex items-center px-4 py-3 rounded-xl transition
                {{ request()->routeIs('admin.services.index') ? 'bg-secondary text-white shadow' : 'text-white/80 hover:bg-white/10 hover:text-white' }}"
            >
                Services
            </a>

            <a
                href="#"
                class="flex items-center px-4 py-3 rounded-xl text-white/80 hover:bg-white/10 hover:text-white transition"
            >
                Testimonials
            </a>

            <a
                href="#"
                class="flex items-center px-4 py-3 rounded-xl text-white/80 hover:bg-white/10 hover:text-white transition"
            >
                Appointments
            </a>

            <a
                href="#"
                class="flex items-center px-4 py-3 rounded-xl text-white/80 hover:bg-white/10 hover:text-white transition"
            >
                Settings
            </a>
        </nav>

        <div class="p-4 border-t border-white/10">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button
                    type="submit"
                    class="w-full bg-white/10 hover:bg-white/20 text-white rounded-xl px-4 py-3 text-sm font-medium transition"
                >
                    Logout
                </button>
            </form>
        </div>
    </aside>
</div>