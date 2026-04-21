<div>
    <!-- Overlay (mobile) -->
    <div
        x-show="sidebarOpen"
        x-transition.opacity
        @click="sidebarOpen = false"
        class="fixed inset-0 bg-black/50 z-40 lg:hidden"
        x-cloak
    ></div>

    <!-- Sidebar -->
    <aside
        x-cloak
        :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
        class="fixed top-0 left-0 z-50 w-64 h-screen bg-primary text-white flex flex-col shadow-[0_20px_50px_rgba(0,0,0,0.25)] transform transition-transform duration-300 ease-in-out lg:translate-x-0"
    >

        <!-- Header -->
        <div class="px-6 py-5 border-b border-white/10">
            <h2 class="text-lg font-bold">Admin Panel</h2>
            <p class="text-xs text-white/70 mt-1">Ophthalmologist Website</p>
        </div>

        <!-- User Info -->
        <div class="px-6 py-4 border-b border-white/10">
            <p class="text-sm font-medium">{{ auth()->user()->name }}</p>
            <p class="text-xs text-white/70">{{ auth()->user()->email }}</p>
        </div>

        <!-- Navigation -->
        <nav class="flex-1 px-4 py-6 space-y-2">

            <a href="{{ route('admin.dashboard') }}"
               class="sidebar-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                Dashboard
            </a>

            <div
    x-data="{ openSections: {{ request()->routeIs('admin.hero.*') || request()->routeIs('admin.footer.*') ? 'true' : 'false' }} }"
    class="relative"
    @mouseenter="if (window.innerWidth >= 1024) openSections = true"
    @mouseleave="if (window.innerWidth >= 1024) openSections = false"
>
    <button
        type="button"
        @click="openSections = !openSections"
        class="sidebar-link w-full flex items-center justify-between {{ request()->routeIs('admin.hero.*') || request()->routeIs('admin.footer.*') ? 'active' : '' }}"
    >
        <span>Website Sections</span>
        <span
            class="text-xs transition-transform duration-300"
            :class="openSections ? 'rotate-180' : ''"
        >
            ▼
        </span>
    </button>

    <div
        x-show="openSections"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 -translate-y-1"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 -translate-y-1"
        x-cloak
        class="mt-2 ml-3 space-y-2 rounded-2xl border border-white/10 bg-white/5 p-2"
    >
        <a
            href="{{ route('admin.hero.edit') }}"
            class="sidebar-sublink {{ request()->routeIs('admin.hero.*') ? 'sub-active' : '' }}"
        >
            Hero
        </a>

        <a
            href="{{ route('admin.footer.edit') }}"
            class="sidebar-sublink {{ request()->routeIs('admin.footer.*') ? 'sub-active' : '' }}"
        >
            Footer
        </a>
    </div>
</div>

            <a href="{{ route('admin.services.index') }}"
               class="sidebar-link {{ request()->routeIs('admin.services.*') ? 'active' : '' }}">
                Services
            </a>

            <a href="#"
               class="sidebar-link">
                Testimonials
            </a>

            <a href="#"
               class="sidebar-link">
                Appointments
            </a>

            <a href="#"
               class="sidebar-link">
                Messages
            </a>

            <a href="#"
               class="sidebar-link">
                Settings
            </a>

        </nav>

        <!-- Logout -->
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