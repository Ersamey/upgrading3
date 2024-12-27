<style>
    .titan-font {
        font-family: 'Titan One', cursive;
    }

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
        transition: all 0.3s ease;
    }

    .nav-link::after {
        content: '';
        position: absolute;
        width: 0;
        height: 2px;
        bottom: 0;
        left: 50%;
        background-color: white;
        transition: all 0.3s ease;
        transform: translateX(-50%);
    }

    .nav-link:hover::after {
        width: 100%;
    }

    .nav-link:hover {
        color: #ffffff;
        transform: translateY(-2px);
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
                <a href="#home" class="nav-link titan-font">Home</a>
                <a href="#about" class="nav-link titan-font">About</a>
                <a href="#contact" class="nav-link titan-font">Contact</a>
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
            <a href="#home" class="block py-3 px-4 text-white titan-font hover:bg-white/10">Home</a>
            <a href="#about" class="block py-3 px-4 text-white titan-font hover:bg-white/10">About</a>
            <a href="#contact" class="block py-3 px-4 text-white titan-font hover:bg-white/10">Contact</a>
            <a href="/pesan" class="block py-3 mx-4 my-3 text-white titan-font bg-gray-600 hover:bg-gray-700 rounded-xl text-center">Let's Start</a>
        </div>
    </div>
</nav>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const mobileMenuButton = document.querySelector('.mobile-menu-button');
        const mobileMenu = document.querySelector('.mobile-menu');

        mobileMenuButton.addEventListener('click', function() {
            mobileMenu.classList.toggle('hidden');
        });

        // Close menu when clicking outside
        document.addEventListener('click', function(e) {
            if (!mobileMenuButton.contains(e.target) && !mobileMenu.contains(e.target)) {
                mobileMenu.classList.add('hidden');
            }
        });

        // Close menu on window resize
        window.addEventListener('resize', function() {
            if (window.innerWidth >= 768) {
                mobileMenu.classList.add('hidden');
            }
        });
    });
</script>