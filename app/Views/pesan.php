<?= $this->extend('layout/master') ?>

<?= $this->section('content') ?>

<!-- Hero Section -->
<section id="pesan" class="pt-5 pb-4 bg-light" style="height: 100vh;">
    <div class="container d-flex flex-column justify-content-center align-items-center h-100">
        <!-- Gambar di atas -->
        <div class="text-center mb-4">
            <img src="<?= base_url('assets/images/pesan_upg.webp') ?>" alt="pesan" class="img-fluid" style="max-height: 200px;">
        </div>

        <!-- Kontainer untuk Cards -->
        <div class="row w-100">
            <!-- Bagian 1 -->
            <div class="col-md-6 mx-auto section-one text-center" style="display: flex; justify-content: center; align-items: center;">
                <div class="card w-100" style="max-width: 600px;">
                    <div class="card-body bg-primary text-white">
                        <h5 class="titan-font">Big Appreciation for <?= htmlspecialchars($nama) ?></h5>
                        <button class="btn btn-dark titan-font" id="openMessage">Click Here to Open Message</button>
                    </div>
                </div>
            </div>

            <!-- Bagian 2 (Tersembunyi secara default) -->
            <div class="col-md-6 mx-auto section-two text-center" style="display: none; justify-content: center; align-items: center;">
                <div class="card w-100" style="max-width: 600px;">
                    <div class="card-header bg-primary text-white titan-font">
                        Message for <?= htmlspecialchars($nama) ?>
                    </div>
                    <div class="card-body bg-light">
                        <p class="card-text">"<?= htmlspecialchars($pesan) ?>"</p>
                        <!-- Tombol Balas -->
                        <div class="text-end">
                            <form action="/balaspesan" method="post" class="d-inline">
                                <input type="hidden" name="id_anak" value="<?= htmlspecialchars($id_anak) ?>">
                                <button class="btn btn-primary" type="submit">
                                    <i class="fa fa-reply me-2"></i>Balas
                                </button>
                            </form>
                        </div>
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

        openButton.addEventListener('click', function(e) {
            e.preventDefault();
            if (sectionOne && sectionTwo) {
                sectionOne.style.display = 'none'; // Sembunyikan Bagian 1
                sectionTwo.style.display = 'flex'; // Tampilkan Bagian 2
            } else {
                console.error('Sections are not found in the DOM.');
            }
        });
    });
</script>

<?= $this->endSection() ?>