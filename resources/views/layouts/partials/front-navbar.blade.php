<nav id="navbar" class="fixed top-0 inset-x-0 z-50 transition-all duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div id="navbarInner"
            class="mt-4 flex items-center justify-between rounded-2xl border border-white/40 bg-white/75 backdrop-blur-xl shadow-[0_8px_30px_rgba(27,42,89,0.08)] px-5 sm:px-6 h-[76px] transition-all duration-300">

            <!-- Brand -->
            <a href="#home" class="flex items-center gap-3 shrink-0 group">
                <div
                    class="relative w-11 h-11 rounded-2xl bg-[#1B2A59] text-white flex items-center justify-center font-bold text-lg shadow-[0_10px_25px_rgba(20,51,115,0.28)] transition-transform duration-300 group-hover:scale-105">
                    O
                    <span class="absolute inset-0 rounded-2xl ring-1 ring-white/20"></span>
                </div>

                <div>
                    <h1 class="text-[15px] sm:text-base font-bold tracking-tight text-[#1B2A59] leading-none">
                        Dr. Ophtha
                    </h1>
                    <p class="text-[11px] sm:text-xs text-[#6A7EA6] mt-1 tracking-[0.18em] uppercase">
                        Eye Clinic
                    </p>
                </div>
            </a>

            <!-- Desktop Nav -->
            <div class="hidden md:flex items-center gap-2">
                <a href="#home" class="nav-link active-link">Home</a>
                <a href="#about" class="nav-link">About</a>
                <a href="#services" class="nav-link">Services</a>
                <a href="#contact" class="nav-link">Contact</a>
            </div>

            <!-- Right Actions -->
            <div class="hidden md:flex items-center gap-3">
                <a href="tel:+21600000000"
                    class="inline-flex items-center gap-2 rounded-xl border border-[#B4C0D9]/50 bg-white/70 px-4 py-2.5 text-sm font-medium text-[#1B2A59] hover:border-[#143373] hover:bg-[#F2E6DF]/35 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-[#143373]" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a1.5 1.5 0 001.5-1.5v-1.372a1.5 1.5 0 00-1.091-1.446l-4.423-1.106a1.5 1.5 0 00-1.465.417l-.97.97a12.036 12.036 0 01-5.69-5.69l.97-.97a1.5 1.5 0 00.417-1.465L7.94 5.34A1.5 1.5 0 006.494 4.25H5.122a1.5 1.5 0 00-1.5 1.5V6.75z" />
                    </svg>
                    Call Now
                </a>

                <a href="#appointment"
                    class="inline-flex items-center gap-2 rounded-xl bg-[#143373] text-white px-5 py-2.5 text-sm font-semibold shadow-[0_12px_30px_rgba(20,51,115,0.30)] hover:bg-[#1B2A59] hover:-translate-y-0.5 transition duration-300">
                    Book Appointment
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.75L21 12m0 0l-3.75 3.25M21 12H3" />
                    </svg>
                </a>
            </div>

            <!-- Mobile Button -->
            <button id="menuButton" type="button"
                class="md:hidden relative inline-flex items-center justify-center w-11 h-11 rounded-xl bg-[#1B2A59] text-white shadow-[0_8px_20px_rgba(27,42,89,0.25)] transition hover:scale-105"
                aria-label="Open menu" aria-expanded="false">
                <span id="menuIcon" class="text-xl leading-none transition-all duration-300">☰</span>
            </button>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div id="mobileMenu"
        class="md:hidden opacity-0 pointer-events-none -translate-y-3 transition-all duration-300 px-4 sm:px-6 lg:px-8">
        <div
            class="mt-3 mx-auto max-w-7xl rounded-2xl border border-white/40 bg-white/90 backdrop-blur-xl shadow-[0_10px_35px_rgba(27,42,89,0.10)] overflow-hidden">
            <div class="p-4 space-y-2">
                <a href="#home" class="mobile-link mobile-active">Home</a>
                <a href="#about" class="mobile-link">About</a>
                <a href="#services" class="mobile-link">Services</a>
                <a href="#contact" class="mobile-link">Contact</a>

                <div class="grid grid-cols-1 gap-3 pt-3">
                    <a href="tel:+21600000000"
                        class="inline-flex items-center justify-center rounded-xl border border-[#B4C0D9]/60 bg-white px-4 py-3 text-sm font-medium text-[#1B2A59]">
                        Call Now
                    </a>
                    <a href="#appointment"
                        class="inline-flex items-center justify-center rounded-xl bg-[#143373] text-white px-4 py-3 text-sm font-semibold shadow-md">
                        Book Appointment
                    </a>
                </div>
            </div>
        </div>
    </div>
</nav>

<!-- Spacer because navbar is fixed -->
<div class="h-28"></div>

<style>
    .nav-link {
        position: relative;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 0.7rem 1rem;
        border-radius: 0.9rem;
        font-size: 0.92rem;
        font-weight: 600;
        color: #6A7EA6;
        transition: all 0.3s ease;
    }

    .nav-link:hover {
        color: #1B2A59;
        background: rgba(242, 230, 223, 0.55);
    }

    .nav-link::after {
        content: "";
        position: absolute;
        left: 16px;
        right: 16px;
        bottom: 8px;
        height: 2px;
        border-radius: 999px;
        background: linear-gradient(90deg, #143373, #1B2A59);
        transform: scaleX(0);
        transform-origin: center;
        transition: transform 0.28s ease;
    }

    .nav-link:hover::after,
    .nav-link.active-link::after {
        transform: scaleX(1);
    }

    .active-link {
        color: #1B2A59;
        background: rgba(242, 230, 223, 0.75);
    }

    .mobile-link {
        display: block;
        padding: 0.95rem 1rem;
        border-radius: 1rem;
        font-size: 0.95rem;
        font-weight: 600;
        color: #1B2A59;
        transition: all 0.25s ease;
    }

    .mobile-link:hover {
        background: rgba(242, 230, 223, 0.65);
    }

    .mobile-active {
        background: rgba(242, 230, 223, 0.9);
        color: #143373;
    }

    .navbar-scrolled #navbarInner {
        height: 68px;
        margin-top: 0.6rem;
        background: rgba(255, 255, 255, 0.88);
        box-shadow: 0 14px 35px rgba(27, 42, 89, 0.10);
    }

    @media (max-width: 767px) {
        .navbar-scrolled #navbarInner {
            height: 64px;
        }
    }
</style>

<script>
    const menuButton = document.getElementById('menuButton');
    const mobileMenu = document.getElementById('mobileMenu');
    const menuIcon = document.getElementById('menuIcon');
    const navbar = document.getElementById('navbar');
    const sections = document.querySelectorAll('section[id]');
    const navLinks = document.querySelectorAll('.nav-link');
    const mobileLinks = document.querySelectorAll('.mobile-link');

    let menuOpen = false;

    function setMenuState(open) {
        menuOpen = open;

        if (open) {
            mobileMenu.classList.remove('opacity-0', 'pointer-events-none', '-translate-y-3');
            mobileMenu.classList.add('opacity-100', 'pointer-events-auto', 'translate-y-0');
            menuIcon.textContent = '✕';
            menuButton.setAttribute('aria-expanded', 'true');
        } else {
            mobileMenu.classList.add('opacity-0', 'pointer-events-none', '-translate-y-3');
            mobileMenu.classList.remove('opacity-100', 'pointer-events-auto', 'translate-y-0');
            menuIcon.textContent = '☰';
            menuButton.setAttribute('aria-expanded', 'false');
        }
    }

    menuButton.addEventListener('click', () => {
        setMenuState(!menuOpen);
    });

    window.addEventListener('resize', () => {
        if (window.innerWidth >= 768) {
            setMenuState(false);
        }
    });

    // Close mobile menu on click
    mobileLinks.forEach(link => {
        link.addEventListener('click', () => setMenuState(false));
    });

    // Navbar scroll effect
    window.addEventListener('scroll', () => {
        if (window.scrollY > 20) {
            document.body.classList.add('navbar-scrolled');
        } else {
            document.body.classList.remove('navbar-scrolled');
        }

        let current = '';
        sections.forEach(section => {
            const sectionTop = section.offsetTop - 140;
            const sectionHeight = section.offsetHeight;
            if (window.scrollY >= sectionTop && window.scrollY < sectionTop + sectionHeight) {
                current = section.getAttribute('id');
            }
        });

        navLinks.forEach(link => {
            link.classList.remove('active-link');
            if (link.getAttribute('href') === `#${current}`) {
                link.classList.add('active-link');
            }
        });

        mobileLinks.forEach(link => {
            link.classList.remove('mobile-active');
            if (link.getAttribute('href') === `#${current}`) {
                link.classList.add('mobile-active');
            }
        });
    });
</script>