<?= $this->extend('layout/master') ?>

<?= $this->section('content') ?>

<style>
    .balasan {
        background: rgba(255, 255, 255, 0.9);
        border-left: 4px solid rgba(91, 85, 78, 1);
        border-radius: 8px;
        padding: 1.25rem;
        margin: 1rem 0 1rem 2.5rem;
        box-shadow: 0 2px 8px rgba(0,0,0,0.05);
    }

    .tanggapan {
        background: rgba(226, 240, 255, 0.8);
        border-left: 4px solid rgba(68, 157, 255, 1);
        border-radius: 8px;
        padding: 1.25rem;
        margin: 1rem 0 1rem 2.5rem;
        box-shadow: 0 2px 8px rgba(0,0,0,0.05);
    }

    .message-card {
        background: white;
        border-radius: 15px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        transition: all 0.3s ease;
        border: none;
    }

    .message-card:hover {
        transform: translateY(-2px);
    }

    .btn-tanggapan {
        background: rgba(68, 157, 255, 1);
        color: white;
        border: none;
        padding: 0.5rem 1rem;
        border-radius: 8px;
        transition: all 0.3s ease;
    }

    .btn-tanggapan:hover {
        background: rgba(51, 136, 255, 1);
        transform: translateY(-2px);
    }
</style>

<!-- Main Content -->
<section class="pt-24 pb-12" style="min-height: 100vh; background-color: rgba(226, 240, 255, 1);">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl titan-font mb-6 text-center" style="color: rgba(68, 157, 255, 1);">Daftar Semua Pesan</h2>
        
        <div class="message-card p-4">
            <?php foreach ($pesanList as $pesan): ?>
                <div class="mb-4 p-4 border rounded-lg bg-white">
                    <!-- Pesan Utama -->
                    <div class="main-message">
                        <div class="flex justify-between items-center mb-3">
                            <h5 class="titan-font">
                                <span class="text-blue-500"><?= $pesan['nama_pengirim'] ?></span>
                                <span class="mx-2">→</span>
                                <span class="text-green-500"><?= $pesan['nama_penerima'] ?></span>
                            </h5>
                        </div>
                        <p class="mb-3"><?= $pesan['pesan'] ?></p>
                    </div>

                    <!-- Balasan -->
                    <?php if (!empty($pesan['balasan'])): ?>
                        <?php foreach ($pesan['balasan'] as $balasan): ?>
                            <div class="balasan">
                                <div class="flex justify-between items-center">
                                    <h6 class="font-semibold mb-2">Balasan dari: <?= $balasan['pengirim'] ?></h6>
                                    <?php if($is_admin): ?>
                                        <button class="btn-tanggapan toggle-tanggapan" data-balasan-id="<?= $balasan['id'] ?>">
                                            <i class="fas fa-reply me-1"></i>Tanggapi
                                        </button>
                                    <?php endif; ?>
                                </div>
                                <p class="mb-3"><?= $balasan['pesan'] ?></p>

                                <!-- Form Tanggapan -->
                                <div class="hidden" id="form-<?= $balasan['id'] ?>">
                                    <form action="/adm/savetanggapan" method="post" class="mt-3">
                                        <input type="hidden" name="id_balasan" value="<?= $balasan['id'] ?>">
                                        <textarea name="tanggapan" class="w-full p-2 border rounded-lg" rows="2" required></textarea>
                                        <button type="submit" class="btn-tanggapan mt-2">Kirim Tanggapan</button>
                                    </form>
                                </div>

                                <!-- Tanggapan yang ada -->
                                <?php if (!empty($balasan['tanggapan'])): ?>
                                    <?php foreach ($balasan['tanggapan'] as $tanggapan): ?>
                                        <div class="tanggapan">
                                            <h6 class="font-semibold mb-2">Tanggapan Admin: <?= $tanggapan['nama_admin'] ?></h6>
                                            <p class="mb-0"><?= $tanggapan['tanggapan'] ?></p>
                                        </div>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
            
            <div class="mt-6 text-center">
                <a href="/adm/kirim" class="btn-tanggapan">
                    <i class="fas fa-arrow-left me-2"></i>Kembali
                </a>
            </div>
        </div>
    </div>
</section>

<script>
$(document).ready(function() {
    $('.toggle-tanggapan').click(function() {
        const balasanId = $(this).data('balasan-id');
        $(`#form-${balasanId}`).slideToggle();
    });
});
</script>

<?= $this->endSection() ?>