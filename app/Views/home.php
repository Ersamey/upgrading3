<?= $this->extend('layout/master') ?>

<?= $this->section('content') ?>

<!-- Hero Section -->
<section id="home" class="pt-5 pb-4 bg-light">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6 mb-4 mb-md-0">
                <h1 class="display-4 fw-bold text-dark mb-3">
                    Connect & Communicate
                </h1>
                <p class="fs-5 text-secondary mb-4">
                    Send messages instantly to anyone, anywhere. Stay connected with your loved ones.
                </p>
                <a href="/pesan" class="btn btn-primary btn-lg">
                    Start Messaging
                </a>
            </div>
            <div class="col-md-6">
                <img src="<?= base_url('assets/images/kapal.webp') ?>" alt="Messaging Illustration" class="img-fluid">
            </div>
        </div>
    </div>
</section>

<!-- About Section -->
<section id="about" class="py-5 text-white" style="background-color: #449DFF;">
    <div class="container">
        <h2 class="text-center mb-4">About</h2>
        <div class="row g-4">
            <div class="col-md-4 text-center">
                <div class="bg-light rounded-circle p-4 d-inline-block mb-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-lightning" viewBox="0 0 16 16">
                        <path d="M11.251 0a.5.5 0 0 1 .416.777L6.381 8H11.5a.5.5 0 0 1 .39.812l-6.928 8.993a.5.5 0 0 1-.904-.371L6.62 8H1.5a.5.5 0 0 1-.39-.812L8.038.195A.5.5 0 0 1 8.5 0h2.751z"/>
                    </svg>
                </div>
                <h3 class="h5">Fast Delivery</h3>
                <p>Instant message delivery to ensure your communications are timely.</p>
            </div>
            <div class="col-md-4 text-center">
                <div class="bg-light rounded-circle p-4 d-inline-block mb-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-shield-lock" viewBox="0 0 16 16">
                        <path d="M5.071.5a2 2 0 0 1 1.858 0l5.812 3.197a2 2 0 0 1 1.07 1.753v5.056a5.998 5.998 0 0 1-1.527 3.95 5.998 5.998 0 0 1-4.393 2.088 5.998 5.998 0 0 1-4.393-2.088 5.998 5.998 0 0 1-1.527-3.95V5.45a2 2 0 0 1 1.07-1.753L5.071.5zm.465 1.216a1 1 0 0 0-.93 0L.79 4.862a1 1 0 0 0-.53.877v5.056c0 1.655.672 3.216 1.766 4.318A6.998 6.998 0 0 0 8 15.708a6.998 6.998 0 0 0 5.974-2.455 6.998 6.998 0 0 0 1.766-4.318V5.739a1 1 0 0 0-.53-.877L6.536 1.716z"/>
                        <path d="M5.5 9a1.5 1.5 0 1 1 3 0v2a1.5 1.5 0 1 1-3 0V9z"/>
                    </svg>
                </div>
                <h3 class="h5">Secure</h3>
                <p>End-to-end encryption to keep your messages private and secure.</p>
            </div>
            <div class="col-md-4 text-center">
                <div class="bg-light rounded-circle p-4 d-inline-block mb-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-people" viewBox="0 0 16 16">
                        <path d="M6 6a3 3 0 1 1 6 0 3 3 0 0 1-6 0zM4.285 12.433c.454.708 1.252 1.087 2.215 1.087H9.5c.963 0 1.76-.379 2.215-1.087A4.715 4.715 0 0 0 14.5 9.5c0-.786-.292-1.574-.816-2.24A6.47 6.47 0 0 0 9.5 6H6.5c-1.18 0-2.236.276-3.184.76a6.443 6.443 0 0 0-1.816 2.24c-.524.666-.816 1.454-.816 2.24 0 1.13.366 2.26 1.28 3.193.498.524 1.18.864 1.896.954.516.066.867-.187.955-.417a1.678 1.678 0 0 1-.085-.293z"/>
                    </svg>
                </div>
                <h3 class="h5">Group Chat</h3>
                <p>Create groups and stay connected with multiple people at once.</p>
            </div>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section id="contact" class="py-5 bg-light">
    <div class="container">
        <h2 class="text-center mb-4">Contact</h2>
        <div class="col-lg-6 mx-auto">
            <form>
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" id="name" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" id="email" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="message" class="form-label">Message</label>
                    <textarea id="message" rows="4" class="form-control"></textarea>
                </div>
                <button type="submit" class="btn btn-primary w-100">
                    Send Message
                </button>
            </form>
        </div>
    </div>
</section>

<?= $this->endSection() ?>
