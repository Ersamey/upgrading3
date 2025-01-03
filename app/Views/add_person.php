<?= $this->extend('layout/master') ?>

<?= $this->section('content') ?>

<section id="pesan" class="vh-100 d-flex justify-content-center align-items-center"
    style="background-image: url('<?= base_url('assets/images/bg-hero.webp') ?>'); 
                background-size: cover; 
                background-position: center; 
                background-repeat: no-repeat;">
    <div class="container px-4">
        <div class="row align-items-center">
            <div class="col-md-6 d-flex justify-content-center align-items-center">
                <img src="<?= base_url('assets/images/kirimpesan.webp') ?>"
                    alt="pesan"
                    class="img-fluid"
                    style="max-height: 250px;">
            </div>

            <div class="col-md-6">
                <h5 class="titan-font text-center mb-4" style="color: #fff;">Tambah Data Anakk</h5>
                <form action="/adm/saveanak" method="post" class="bg-light p-4 rounded-3">

                    <div class="mb-3">
                        <input type="text"
                            class="form-control titan-font bg-light py-2"
                            placeholder="Nama Anak"
                            name="nama_anak"
                            id="nama_anak"
                            required>
                    </div>

                    <div class="mb-3">
                        <input type="text"
                            class="form-control titan-font bg-light py-2"
                            placeholder="NIM"
                            name="nim"
                            id="nim"
                            required>
                    </div>
                    <div class="d-flex justify-content-between">
                        <button type="reset"
                            class="btn titan-font px-4"
                            style="background-color: #f5f5f5; color: #333; border: 1px solid #ddd;">
                            Reset
                        </button>
                        <button type="submit"
                            class="btn titan-font px-4"
                            style="background-color: #449DFF; color: white;">
                            Kirim
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>