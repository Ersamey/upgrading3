<?= $this->extend('layout/master') ?>

<?= $this->section('content') ?>

<style>
    .hero-title {
        color: rgba(68, 157, 255, 1);
        text-shadow:
            -3px -3px 0 white,
            3px -3px 0 white,
            -3px 3px 0 white,
            3px 3px 0 white,
            -4px -4px 0 white,
            4px -4px 0 white,
            -4px 4px 0 white,
            4px 4px 0 white,
            -5px -5px 0 white,
            5px -5px 0 white,
            -5px 5px 0 white,
            5px 5px 0 white;
        font-size: 3rem !important;
        line-height: 1.2;
    }

    @media (max-width: 768px) {
        .hero-title {
            font-size: 1.8rem !important;
            text-shadow:
                -2px -2px 0 white,
                2px -2px 0 white,
                -2px 2px 0 white,
                2px 2px 0 white,
                -3px -3px 0 white,
                3px -3px 0 white,
                -3px 3px 0 white,
                3px 3px 0 white,
                -4px -4px 0 white,
                4px -4px 0 white,
                -4px 4px 0 white,
                4px 4px 0 white;
        }
    }

    .form-control::placeholder {
        color: rgba(91, 85, 78, 0.25) !important;
    }

    .form-control {
        color: rgba(91, 85, 78, 1) !important;
    }

    .logo-kemakom {
        width: 100px !important;
        top: 100px;
        left: 20px;
        z-index: 2;
    }

    @media (max-width: 768px) {
        .logo-kemakom {
            width: 50px !important;
            top: 35px !important;
            left: 15px !important;
        }
    }

    .kapal-joget {
        animation: rock 3s ease-in-out infinite;
        transform-origin: center bottom;
    }

    @keyframes rock {
        0% {
            transform: rotate(0deg);
        }

        25% {
            transform: rotate(2deg);
        }

        75% {
            transform: rotate(-2deg);
        }

        100% {
            transform: rotate(0deg);
        }
    }

    .feature-card {
        transition: all 0.3s ease;
        overflow: hidden;
    }

    .feature-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
    }

    .img-wrapper {
        overflow: hidden;
        border-radius: 8px;
    }

    .img-wrapper img {
        transition: transform 0.5s ease;
    }

    .feature-card:hover .img-wrapper img {
        transform: scale(1.1);
    }

    .feature-title {
        position: relative;
        padding-bottom: 10px;
    }

    .feature-title::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 0;
        height: 2px;
        background-color: rgba(68, 157, 255, 1);
        transition: width 0.3s ease;
    }

    .feature-card:hover .feature-title::after {
        width: 50px;
    }

    .feature-text {
        opacity: 0.9;
        transition: opacity 0.3s ease;
    }

    .feature-card:hover .feature-text {
        opacity: 1;
    }

    .about-header {
        max-width: 350px;
    }

    /* Media query untuk tampilan mobile */
    @media (max-width: 768px) {
        .about-header {
            max-width: 200px;
            /* Ukuran lebih kecil untuk mobile */
        }
    }
</style>

<!-- Hero Section -->
<section id="home" style="padding-top: 76px;" class="mb-5">
    <!-- Logo Header -->
    <div class="container">
        <div class="text-center">
            <img src="<?= base_url('assets/images/header-hero.webp') ?>" alt="Header Logo" class="img-fluid" style="max-height: 250px;">
        </div>
    </div>

    <div class="container-fluid px-4 mt-5">
        <div class="p-5" style="background-image: url('<?= base_url('assets/images/bg-hero.webp') ?>'); 
                                background-size: cover; 
                                background-position: center; 
                                border-radius: 25px;
                                position: relative;
                                overflow: visible;
                                min-height: 450px;">
            <div class="row align-items-center">
                <!-- Form Section -->
                <!-- Form Section -->
                <div class="col-md-6 mb-4 mb-md-0">
                    <div class="bg-transparent p-4 rounded-3">
                        <h2 class="mb-4 wendy-one-regular text-start hero-title">
                            Sebelum Kirim Pesan
                        </h2>
                        <form class="py-3" action="/masuk" method="post">
                            <?= csrf_field(); ?>
                            <div class="mb-4">
                                <input type="text"
                                    class="form-control titan-font bg-white py-3"
                                    placeholder="Isi NIM mu disini"
                                    style="height: 45px;"
                                    id="nim"
                                    name="nim"
                                    required>
                            </div>
                            <div class="mb-4">
                                <input type="password"
                                    class="form-control titan-font bg-white py-3"
                                    placeholder="Password disini"
                                    style="height: 45px;"
                                    id="password"
                                    name="password"
                                    required>
                            </div>
                            <button type="submit"
                                class="btn w-100 titan-font d-flex align-items-center justify-content-center"
                                style="background-color: #5B554E; color: white; height: 45px;">
                                Let's Start
                            </button>
                        </form>
                    </div>
                </div>

                <div class="col-md-6" style="position: absolute; 
                           bottom: 0;
                           right: -12px;
                           width: 45%;
                           z-index: 1;">
                    <!-- Logo Kemakom -->
                    <img src="<?= base_url('assets/images/logo-kemakom.webp') ?>"
                        alt="Logo Kemakom"
                        class="position-absolute logo-kemakom d-none d-md-block"
                        style="width: 120px; top: 100px; left: 20px; z-index: 2;">
                    <!-- Kapal -->
                    <img src="<?= base_url('assets/images/kapal.webp') ?>"
                        alt="Kapal Illustration"
                        class="img-fluid kapal-joget"
                        style="transform: translateY(-2px);">
                </div>
            </div>
        </div>
    </div>
</section>


<!-- About Section -->
<!-- About Section -->
<section id="about" class="py-5 text-white" style="background-color: #449DFF;">
    <div class="container-fluid px-4 mb-5">
        <img src="<?= base_url('assets/images/header-about.webp') ?>" class="img-fluid about-header" alt="About Header">
    </div>

    <div class="container">
        <div class="row g-4">
            <div class="col-md-4">
                <div class="bg-white p-4 rounded shadow feature-card">
                    <!-- Perubahan pada img-wrapper dan img -->
                    <div class="img-wrapper mb-3" style="height: 200px;">
                        <img src=<?= base_url('assets/images/content-about.webp') ?> class="img-fluid w-100 h-100 object-fit-cover" alt="Feature 1">
                    </div>
                    <h3 class="h5 feature-title" style="font-family: 'Wendy One', sans-serif; color: rgba(68, 157, 255, 1);">Fast Delivery</h3>
                    <p class="feature-text" style="font-family: 'Montserrat', sans-serif; color: rgba(68, 157, 255, 1);">Instant message delivery to ensure your communications are timely.</p>
                </div>
            </div>
            <!-- Ulangi perubahan yang sama untuk card lainnya -->
            <div class="col-md-4">
                <div class="bg-white p-4 rounded shadow feature-card">
                    <div class="img-wrapper mb-3" style="height: 200px;">
                        <img src=<?= base_url('assets/images/content-about.webp') ?> class="img-fluid w-100 h-100 object-fit-cover" alt="Feature 2">
                    </div>
                    <h3 class="h5 feature-title" style="font-family: 'Wendy One', sans-serif; color: rgba(68, 157, 255, 1);">Secure</h3>
                    <p class="feature-text" style="font-family: 'Montserrat', sans-serif; color: rgba(68, 157, 255, 1);">End-to-end encryption to keep your messages private and secure.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="bg-white p-4 rounded shadow feature-card">
                    <div class="img-wrapper mb-3" style="height: 200px;">
                        <img src=<?= base_url('assets/images/content-about.webp') ?> class="img-fluid w-100 h-100 object-fit-cover" alt="Feature 3">
                    </div>
                    <h3 class="h5 feature-title" style="font-family: 'Wendy One', sans-serif; color: rgba(68, 157, 255, 1);">Group Chat</h3>
                    <p class="feature-text" style="font-family: 'Montserrat', sans-serif; color: rgba(68, 157, 255, 1);">Create groups and stay connected with multiple people at once.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section id="contact" class="py-5 position-relative">
    <div class="position-absolute top-0 start-0 w-100 h-100" style="background: url('<?= base_url('assets/images/bg-contact.webp') ?>') no-repeat center center; background-size: cover; z-index: 1;"></div>

    <!-- Content with z-index higher than background -->
    <div class="position-relative" style="z-index: 2;">
        <!-- Header Image -->
        <div class="container-fluid px-4 mb-5">
            <img src="<?= base_url('assets/images/contact-header.webp') ?>" class="img-fluid contact-header" alt="Contact Header">
        </div>

        <div class="container position-relative">
            <div class="text-center py-5" style="background: url('<?= base_url('assets/images/bg-cp.webp') ?>') no-repeat center center; background-size: cover; border-radius: 20px;">
                <h2 class="contact-title mb-4">You Can Contact</h2>
                <div class="d-flex justify-content-center gap-4">
                    <button class="btn px-4 py-2 contact-btn">Public Relation 1</button>
                    <button class="btn px-4 py-2 contact-btn">Public Relation 2</button>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    /* Header image responsive */
    .contact-header {
        max-width: 350px;
    }

    @media (max-width: 768px) {
        .contact-header {
            max-width: 200px;
        }
    }

    /* Contact title with stroke */
    .contact-title {
        font-family: 'Titan One', cursive;
        color: #449DFF;
        font-size: 3rem;
        text-shadow:
            -3px -3px 0 white,
            3px -3px 0 white,
            -3px 3px 0 white,
            3px 3px 0 white,
            -4px -4px 0 white,
            4px -4px 0 white,
            -4px 4px 0 white,
            4px 4px 0 white,
            -5px -5px 0 white,
            5px -5px 0 white,
            -5px 5px 0 white,
            5px 5px 0 white;
        line-height: 1.2;
    }

    /* Contact buttons */
    .contact-btn {
        background-color: #5B554E;
        color: white;
        font-family: 'Wendy One', sans-serif;
        transition: all 0.3s ease;
    }

    .contact-btn:hover {
        background-color: #4a4643;
        color: white;
        transform: translateY(-3px);
    }

    @media (max-width: 768px) {
        .contact-title {
            font-size: 1.8rem;
            text-shadow:
                -2px -2px 0 white,
                2px -2px 0 white,
                -2px 2px 0 white,
                2px 2px 0 white,
                -3px -3px 0 white,
                3px -3px 0 white,
                -3px 3px 0 white,
                3px 3px 0 white,
                -4px -4px 0 white,
                4px -4px 0 white,
                -4px 4px 0 white,
                4px 4px 0 white;
        }

        .d-flex {
            flex-direction: column;
            align-items: center;
        }

        .contact-btn {
            width: 80%;
        }
    }
</style>

<?= $this->endSection() ?>