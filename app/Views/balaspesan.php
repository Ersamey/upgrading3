<?= $this->extend('layout/master') ?>

<?= $this->section('content') ?>

<style>
    .form-container {
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
        border-radius: 20px;
        padding: 2rem;
        box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.2);
    }

    .form-input {
        background: white !important;
        border: 2px solid rgba(68, 157, 255, 0.2);
        border-radius: 12px;
        padding: 12px;
        transition: all 0.3s ease;
    }

    .form-input:focus {
        border-color: rgba(68, 157, 255, 0.8);
        box-shadow: 0 0 0 0.2rem rgba(68, 157, 255, 0.25);
    }

    .required-mark {
        color: rgba(68, 157, 255, 1);
        margin-left: 4px;
    }

    .input-label {
        color: white;
        font-family: 'Inter', sans-serif;
        font-weight: 500;
        margin-bottom: 8px;
    }

    .btn-reset {
        background: rgba(255, 255, 255, 0.9);
        color: rgba(91, 85, 78, 1);
        border: none;
        border-radius: 8px;
        padding: 10px 24px;
        transition: all 0.3s ease;
    }

    .btn-reset:hover {
        background: rgba(255, 255, 255, 1);
        transform: translateY(-2px);
    }

    .btn-kirim {
        background: rgba(68, 157, 255, 1);
        color: white;
        border: none;
        border-radius: 8px;
        padding: 10px 24px;
        transition: all 0.3s ease;
    }

    .btn-kirim:hover {
        background: rgba(51, 136, 255, 1);
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(68, 157, 255, 0.3);
    }

    .page-title {
        color: white;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        font-size: 2.5rem;
        margin-bottom: 1.5rem;
    }

    .alert-success-custom {
        background: rgba(68, 157, 255, 0.1);
        backdrop-filter: blur(10px);
        border-left: 4px solid rgba(68, 157, 255, 1);
        color: white;
        padding: 1rem;
        border-radius: 8px;
        margin-bottom: 1rem;
        animation: slideIn 0.5s ease-out;
    }

    @keyframes slideIn {
        from {
            transform: translateX(-100%);
            opacity: 0;
        }

        to {
            transform: translateX(0);
            opacity: 1;
        }
    }
</style>

<!-- Hero Section -->
<section id="pesan" class="min-vh-100 d-flex justify-content-center align-items-center"
    style="background-image: url('<?= base_url('assets/images/bg-hero.webp') ?>'); 
           background-size: cover; 
           background-position: center; 
           background-repeat: no-repeat;
           padding-top: 80px">
    <div class="container px-4">
        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert-success-custom animate__animated animate__fadeIn">
                <div class="d-flex align-items-center">
                    <i class="fas fa-check-circle me-2"></i>
                    <?= session()->getFlashdata('success') ?>
                </div>
            </div>
        <?php endif; ?>

        <div class="row align-items-center">
            <!-- Gambar -->
            <div class="col-md-6 d-flex justify-content-center align-items-center animate__animated animate__fadeInLeft">
                <img src="<?= base_url('assets/images/kirimpesan.webp') ?>"
                    alt="pesan"
                    class="img-fluid"
                    style="max-height: 300px;">
            </div>

            <!-- Form -->
            <div class="col-md-6 animate__animated animate__fadeInRight">
                <h5 class="page-title titan-font text-center">Kirim Pesan Anda</h5>
                <div class="form-container">
                    <form id="balasanForm" class="needs-validation" novalidate>
                        <!-- Hidden inputs -->
                        <input type="hidden" name="id_anak" value="<?= htmlspecialchars($id_anak) ?>">
                        <input type="hidden" name="id_pesan" value="<?= htmlspecialchars($id_pesan) ?>">

                        <!-- Input Pengirim (readonly) -->
                        <div class="mb-4">
                            <label class="input-label">Pengirim</label>
                            <input type="text"
                                class="form-input form-control"
                                name="pengirim"
                                value="<?= htmlspecialchars($nama_anak) ?>"
                                readonly>
                        </div>

                        <!-- Input Pesan -->
                        <div class="mb-4">
                            <label class="input-label">Pesan<span class="required-mark">*</span></label>
                            <textarea class="form-input form-control"
                                placeholder="Tuliskan pesan Anda di sini..."
                                name="pesan"
                                rows="4"
                                required></textarea>
                            <div class="invalid-feedback">
                                Pesan tidak boleh kosong
                            </div>
                        </div>

                        <!-- Tombol -->
                        <div class="d-flex justify-content-between mt-4">
                            <button type="reset" class="btn btn-reset titan-font">
                                <i class="fas fa-undo me-2"></i>Reset
                            </button>
                            <button type="submit" class="btn btn-kirim titan-font">
                                <i class="fas fa-paper-plane me-2"></i>Kirim
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Script untuk form validation -->
<script>
    (() => {
        'use strict'
        const forms = document.querySelectorAll('.needs-validation')

        Array.from(forms).forEach(form => {
            form.addEventListener('submit', event => {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }
                form.classList.add('was-validated')
            }, false)
        })
    })()

    // Auto-hide alert after 5 seconds
    document.addEventListener('DOMContentLoaded', function() {
        const alert = document.querySelector('.alert-success-custom');
        if (alert) {
            setTimeout(() => {
                alert.style.transition = 'opacity 0.5s ease-out';
                alert.style.opacity = '0';
                setTimeout(() => alert.remove(), 500);
            }, 5000);
        }
    });

    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('balasanForm');

        form.addEventListener('submit', async function(e) {
            e.preventDefault();

            // Validasi form
            if (!form.checkValidity()) {
                e.stopPropagation();
                form.classList.add('was-validated');
                return;
            }

            try {
                // Kirim data menggunakan fetch
                const formData = new FormData(form);
                const response = await fetch('/savebalas', {
                    method: 'POST',
                    body: formData
                });

                const result = await response.json();

                if (result.success) {
                    alert(result.message);
                    window.location.href = '/pesan';
                } else {
                    alert(result.message);
                }
            } catch (error) {
                console.error('Error:', error);
                alert('Terjadi kesalahan saat mengirim pesan');
            }
        });
    });
</script>

<?= $this->endSection() ?>