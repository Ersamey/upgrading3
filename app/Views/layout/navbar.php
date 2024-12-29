<style>
    .nav-container {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 3.5rem;
        flex: 1;
    }


    .nav-link {
        color: white;
        text-decoration: none;
        position: relative;
        padding-bottom: 5px;
        transition: transform 0.2s ease;
    }

    .nav-link::after {
        content: '';
        position: absolute;
        width: 0;
        height: 2px;
        bottom: 0;
        left: 50%;
        background-color: white;
        transition: width 0.2s ease;
        transform: translateX(-50%);
    }

    .nav-link:hover::after {
        width: 100%;
    }

    .nav-link:hover {
        color: #ffffff;
        transform: translateY(-2px);
    }

    .nav-link,
    .nav-link:visited,
    .nav-link:active,
    .nav-link:hover {
        color: white !important;
    }

    .btn-start {
        background-color: #4b5563;
        color: white;
        padding: 0.75rem 1.5rem;
        border-radius: 0.75rem;
        font-family: 'Titan One', cursive;
        transition: all 0.3s ease;
        font-weight: normal;
        border: 2px solid transparent;
        text-decoration: none;
    }

    .btn-start:hover {
        background-color: #374151;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        transform: translateY(-2px);
        border-color: rgba(255, 255, 255, 0.2);
    }

    .btn-start:active {
        transform: translateY(0);
    }

    .navbar {
        backdrop-filter: blur(8px);
        -webkit-backdrop-filter: blur(8px);
    }

    .logo-container img {
        transition: transform 0.3s ease;
    }

    .logo-container:hover img {
        transform: scale(1.05);
    }

    .mobile-menu {
        background-color: #449DFF;
        border-radius: 0 0 1rem 1rem;
    }

    .mobile-menu a {
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    /* Media query untuk mobile */
    @media (max-width: 768px) {

        .nav-container,
        .btn-container {
            display: none;
        }

        .nav-link::after {
            display: none;
        }

        .mobile-menu a {
            text-decoration: none;
        }
    }

    @media (min-width: 768px) {
        .nav-container {
            display: flex;
        }

        .btn-container {
            display: block;
        }
    }
</style>


<nav class="fixed w-full shadow-lg z-50" style="background-color: #449DFF;">
    <div class="container mx-auto px-6 py-3">
        <div class="flex items-center justify-between">
            <div class="flex items-center logo-container">
                <a href="/" class="h-10">
                    <img src="<?= base_url('assets/images/logo-upgrading3.webp') ?>" alt="Logo" class="h-full">
                </a>
            </div>
            <div class="nav-container">
                <a href="<?= base_url('/#home') ?>" class="nav-link titan-font">Home</a>
                <a href="<?= base_url('/#about') ?>" class="nav-link titan-font">About</a>
                <a href="<?= base_url('/#contact') ?>" class="nav-link titan-font">Contact</a>
            </div>
            <div class="btn-container">
                <a href="/pesan" class="btn-start">
                    Let's Start
                </a>
            </div>
            <button class="mobile-menu-button md:hidden p-2 focus:outline-none" type="button" aria-label="Toggle menu">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-16 6h16"></path>
                </svg>
            </button>
        </div>
        <div class="mobile-menu hidden md:hidden mt-4">
            <a href="<?= base_url('/#home') ?>" class="block py-3 px-4 text-white titan-font hover:bg-white/10">Home</a>
            <a href="<?= base_url('/#about') ?>" class="block py-3 px-4 text-white titan-font hover:bg-white/10">About</a>
            <a href="<?= base_url('/#contact') ?>" class="block py-3 px-4 text-white titan-font hover:bg-white/10">Contact</a>
            <a href="/pesan" class="block py-3 mx-4 my-3 text-white titan-font bg-gray-600 hover:bg-gray-700 rounded-xl text-center">Let's Start</a>
        </div>
    </div>
</nav>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const mobileMenuButton = document.querySelector('.mobile-menu-button');
        const mobileMenu = document.querySelector('.mobile-menu');
        const navLinks = document.querySelectorAll('.nav-link, .mobile-menu a[href^="' + window.location.origin + '/#"]');

        mobileMenuButton.addEventListener('click', function() {
            mobileMenu.classList.toggle('hidden');
        });

        // Hanya jalankan smooth scroll jika di homepage
        if (window.location.pathname === '/') {
            navLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    const targetId = this.getAttribute('href').split('#')[1];
                    const targetElement = document.getElementById(targetId);

                    if (targetElement) {
                        const startPosition = window.scrollY;
                        const targetPosition = targetElement.offsetTop;
                        const distance = targetPosition - startPosition;
                        const duration = 20;
                        const startTime = performance.now();

                        function scrollStep(currentTime) {
                            const elapsed = currentTime - startTime;
                            const progress = Math.min(elapsed / duration, 1);

                            window.scrollTo(0, startPosition + (distance * progress));

                            if (progress < 1) {
                                requestAnimationFrame(scrollStep);
                            }
                        }

                        requestAnimationFrame(scrollStep);
                        mobileMenu.classList.add('hidden');
                    }
                });
            });
        }

        // Event listener untuk menutup mobile menu
        document.addEventListener('click', function(e) {
            if (!mobileMenuButton.contains(e.target) && !mobileMenu.contains(e.target)) {
                mobileMenu.classList.add('hidden');
            }
        });

        window.addEventListener('resize', function() {
            if (window.innerWidth >= 768) {
                mobileMenu.classList.add('hidden');
            }
        });
    });
</script>