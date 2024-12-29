<?= $this->extend('layout/master') ?>

<?= $this->section('content') ?>

<!-- Tambahkan CSS -->
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
        font-size: 2.5rem !important;
        line-height: 1.2;
    }

    .card {
        transition: transform 0.3s ease;
    }

    .card:hover {
        transform: translateY(-5px);
    }

    #openMessage {
        transition: all 0.3s ease;
    }

    #openMessage:hover {
        transform: scale(1.05);
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
    }

    .message-header {
        background: rgba(68, 157, 255, 1) !important;
        padding: 1.5rem !important;
        text-align: left;
    }

    .message-title {
        color: rgba(68, 157, 255, 1);
        text-shadow:
            -2px -2px 0 white,
            2px -2px 0 white,
            -2px 2px 0 white,
            2px 2px 0 white,
            -3px -3px 0 white,
            3px -3px 0 white,
            -3px 3px 0 white,
            3px 3px 0 white;
        font-family: 'Titan One', cursive;
        font-size: 2rem;
        margin: 0;
    }

    .message-text {
        font-size: 1.1rem;
        line-height: 1.6;
        color: #333;
        margin-bottom: 1.5rem;
    }

    .message-body {
        background: rgba(226, 240, 255, 1) !important;
        font-family: 'Inter', sans-serif;
        padding: 2rem !important;
        text-align: left;
    }

    .balasan-section {
        margin-top: 20px;
        display: none;
    }

    .action-button {
        background: rgba(91, 85, 78, 1);
        color: white;
        border: none;
        padding: 0.75rem 1.5rem;
        border-radius: 8px;
        font-family: 'Inter', sans-serif;
        font-weight: 500;
        transition: all 0.3s ease;
    }

    .action-button:hover {
        background: rgba(71, 65, 58, 1);
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    .balasan-item {
        background: rgba(255, 255, 255, 0.9);
        border-left: 4px solid rgba(91, 85, 78, 1);
        border-radius: 8px;
        padding: 1.25rem;
        margin-bottom: 1rem;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
    }

    .tanggapan-item {
        background: rgba(226, 240, 255, 0.8);
        border-left: 4px solid rgba(68, 157, 255, 1);
        border-radius: 8px;
        padding: 1.25rem;
        margin: 1rem 0 1rem 1.5rem;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
    }

    .sender-name {
        color: rgba(91, 85, 78, 1);
        font-weight: 600;
        font-size: 0.95rem;
        margin-bottom: 0.5rem;
    }

    .admin-name {
        color: rgba(68, 157, 255, 1);
        font-weight: 600;
        font-size: 0.95rem;
        margin-bottom: 0.5rem;
    }
</style>

<!-- Hero Section -->
<section id="pesan" class="pt-5 pb-4 bg-light" style="height: auto; min-height: 100vh; padding-top: 80px !important;">
    
    <div class="container d-flex flex-column justify-content-center align-items-center">
        <!-- Gambar di atas -->
        <div class="text-center mb-4">
            <img src="<?= base_url('assets/images/pesan_upg.webp') ?>" alt="pesan" class="img-fluid" style="max-height: 200px;">
        </div>

        <!-- Kontainer untuk Cards -->
        <div class="row w-100">
            <!-- Bagian 1 -->
            <div class="col-12 mx-auto section-one text-center">
                <div class="card w-100 shadow-lg animate__animated animate__fadeIn" style="max-width: 600px; border-radius: 20px; overflow: hidden; margin: 0 auto;">
                    <div class="card-body text-center py-5" style="background: rgba(68, 157, 255, 1);">
                        <h5 class="hero-title mb-4" style="font-family: 'Titan One', cursive;">
                            Big Appreciation for <?= htmlspecialchars($nama) ?>
                        </h5>
                        <button class="btn animate__animated animate__pulse animate__infinite d-flex align-items-center gap-2 mx-auto"
                            style="background: rgba(91, 85, 78, 1); color: white; border-radius: 12px; padding: 12px 24px; font-family: 'Titan One', cursive;"
                            id="openMessage">
                            <img src="<?= base_url('assets/images/mail-upgrading.webp') ?>" alt="mail icon" style="width: 24px; height: 24px;">
                            <span>Click Here to Open Message</span>

                        </button>
                    </div>
                </div>
            </div>

            <!-- Bagian 2 yang sudah direvisi -->
            <div class="col-12 mx-auto section-two" style="display: none;">
                <div class="card w-100 shadow-lg animate__animated animate__fadeIn" style="max-width: 600px; margin: 0 auto; border-radius: 20px; overflow: hidden;">
                    <div class="card-header message-header">
                        <h5 class="message-title">Message for <?= htmlspecialchars($nama) ?></h5>
                    </div>
                    <div class="card-body message-body">
                        <p class="message-text">"<?= htmlspecialchars($pesan) ?>"</p>
                        <div class="d-flex justify-content-end align-items-center gap-3 mb-4" style="margin-top: 50px;">
                            <!-- Tombol Balas -->

                            <?php if (!empty($balasan)): ?>
                                <!-- Tombol Lihat Balasan -->
                                <button class="action-button d-flex align-items-center gap-2" id="toggleBalasan">
                                    <i class="fa fa-comments"></i>
                                    <span>Lihat Balasan</span>
                                </button>
                            <?php endif; ?>

                            <form action="/balaspesan" method="post" class="d-inline">
                                <input type="hidden" name="id_anak" value="<?= htmlspecialchars($id_anak) ?>">
                                <input type="hidden" name="id_pesan" value="<?= htmlspecialchars($id_pesan) ?>">
                                <button class="action-button d-flex align-items-center gap-2" type="submit">
                                    <i class="fa fa-reply"></i>
                                    <span>Balas</span>
                                </button>
                            </form>
                        </div>

                        <!-- Bagian Balasan -->
                        <?php if (!empty($balasan)): ?>
                            <div class="balasan-section" id="balasanSection">
                                <?php foreach ($balasan as $balas): ?>
                                    <div class="balasan-item">
                                        <h6 class="sender-name">Balasan dari: <?= htmlspecialchars($balas['pengirim']) ?></h6>
                                        <p class="mb-3"><?= htmlspecialchars($balas['pesan']) ?></p>

                                        <?php if (!empty($balas['tanggapan'])): ?>
                                            <?php foreach ($balas['tanggapan'] as $tanggapan): ?>
                                                <div class="tanggapan-item">
                                                    <h6 class="admin-name">Tanggapan: <?= htmlspecialchars($tanggapan['nama_admin']) ?></h6>
                                                    <p class="mb-0"><?= htmlspecialchars($tanggapan['tanggapan']) ?></p>
                                                </div>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- JavaScript untuk Toggle Bagian -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const openButton = document.getElementById('openMessage');
        const sectionOne = document.querySelector('.section-one');
        const sectionTwo = document.querySelector('.section-two');
        const toggleBalasanBtn = document.getElementById('toggleBalasan');
        const balasanSection = document.getElementById('balasanSection');

        openButton.addEventListener('click', function(e) {
            e.preventDefault();
            if (sectionOne && sectionTwo) {
                sectionOne.style.display = 'none';
                sectionTwo.style.display = 'flex';
            }
        });

        if (toggleBalasanBtn) {
            toggleBalasanBtn.addEventListener('click', function() {
                if (balasanSection) {
                    if (balasanSection.style.display === 'none' || !balasanSection.style.display) {
                        balasanSection.style.display = 'block';
                        toggleBalasanBtn.textContent = 'Sembunyikan Balasan';
                    } else {
                        balasanSection.style.display = 'none';
                        toggleBalasanBtn.textContent = 'Lihat Balasan';
                    }
                }
            });
        }
    });
</script>

<?= $this->endSection() ?>