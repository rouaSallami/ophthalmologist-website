<div>
    <div
        x-show="sidebarOpen"
        x-transition.opacity
        @click="sidebarOpen = false"
        class="fixed inset-0 bg-black/50 z-40 lg:hidden"
        x-cloak
    ></div>

    <aside
        x-cloak
        :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
        class="fixed top-0 left-0 z-50 w-64 h-screen bg-primary text-white flex flex-col shadow-2xl transform transition-transform duration-300 ease-in-out lg:translate-x-0"
    >

        <div class="px-6 py-5 border-b border-white/10">
            <h2 class="text-lg font-bold">Admin Panel</h2>
            <p class="text-xs text-white/70 mt-1">Ophthalmologist Website</p>
        </div>

        <div class="px-6 py-4 border-b border-white/10">
            <p class="text-sm font-medium">{{ auth()->user()->name }}</p>
            <p class="text-xs text-white/70 truncate">{{ auth()->user()->email }}</p>
        </div>

        <nav class="flex-1 px-4 py-6 space-y-2 overflow-y-auto">

            <a href="{{ route('admin.dashboard') }}"
               class="sidebar-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <span>Dashboard</span>
            </a>

            <div
                x-data="{ 
                    openSections: {{ request()->routeIs('admin.hero.*', 'admin.about.*', 'admin.why-choose-us.*', 'admin.testimonials.*', 'admin.footer.*') ? 'true' : 'false' }} 
                }"
                class="relative"
            >
                <button
                    type="button"
                    @click="openSections = !openSections"
                    class="sidebar-link w-full flex items-center justify-between {{ request()->routeIs('admin.hero.*', 'admin.about.*', 'admin.why-choose-us.*', 'admin.testimonials.*', 'admin.footer.*') ? 'active' : '' }}"
                >
                    <span>Website Sections</span>
                    <svg 
                        class="w-4 h-4 transition-transform duration-300" 
                        :class="openSections ? 'rotate-180' : ''" 
                        fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    >
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>

                <div
                    x-show="openSections"
                    x-collapse
                    x-cloak
                    class="mt-2 ml-3 space-y-1 rounded-xl border border-white/5 bg-white/5 p-2"
                >
                    <a href="{{ route('admin.hero.edit') }}"
                       class="sidebar-sublink block px-4 py-2 text-sm rounded-lg transition {{ request()->routeIs('admin.hero.*') ? 'bg-white/20 text-white' : 'text-white/70 hover:bg-white/10' }}">
                        Hero Section
                    </a>

                    <a href="{{ route('admin.about.edit') }}"
                       class="sidebar-sublink block px-4 py-2 text-sm rounded-lg transition {{ request()->routeIs('admin.about.*') ? 'bg-white/20 text-white' : 'text-white/70 hover:bg-white/10' }}">
                        About Section
                    </a>

                    <a href="{{ route('admin.why-choose-us.edit') }}"
                       class="sidebar-sublink block px-4 py-2 text-sm rounded-lg transition {{ request()->routeIs('admin.why-choose-us.*') ? 'bg-white/20 text-white' : 'text-white/70 hover:bg-white/10' }}">
                        Why Choose Us
                    </a>

                    <a href="{{ route('admin.testimonials.index') }}"
                       class="sidebar-sublink block px-4 py-2 text-sm rounded-lg transition {{ request()->routeIs('admin.testimonials.*') ? 'bg-white/20 text-white' : 'text-white/70 hover:bg-white/10' }}">
                        Testimonials
                    </a>

                    <a href="{{ route('admin.footer.edit') }}"
                       class="sidebar-sublink block px-4 py-2 text-sm rounded-lg transition {{ request()->routeIs('admin.footer.*') ? 'bg-white/20 text-white' : 'text-white/70 hover:bg-white/10' }}">
                        Footer Section
                    </a>
                </div>
            </div>

            <a href="{{ route('admin.services.index') }}"
               class="sidebar-link {{ request()->routeIs('admin.services.*') ? 'active' : '' }}">
                Services
            </a>

            <a href="#" class="sidebar-link text-white/70 hover:text-white transition">Appointments</a>
            <a href="#" class="sidebar-link text-white/70 hover:text-white transition">Messages</a>
            <a href="#" class="sidebar-link text-white/70 hover:text-white transition">Settings</a>

        </nav>

        <div class="p-4 border-t border-white/10">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button
                    type="submit"
                    class="w-full bg-red-500/10 hover:bg-red-500/20 text-red-400 rounded-xl px-4 py-3 text-sm font-medium transition border border-red-500/20"
                >
                    Logout
                </button>
            </form>
        </div>

    </aside>
</div>