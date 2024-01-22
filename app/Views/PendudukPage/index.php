<?= $this->extend('PendudukPage/main'); ?>

<?= $this->section('content'); ?>
<!-- ======= Hero Section ======= -->
<section class="hero-section" id="hero">
    <section class="section">
        <div class="container">
            <div class="row">
                <?php foreach ($surat as $item): ?>
                <div class="col-md-4">
                    <div class="feature-1 text-center">
                        <div class="wrap-icon icon-1">
                            <i style="color: #fff; font-size:75px" class="fa-solid fa-file"></i>
                        </div>
                        <h3 class="mb-3"><?= $item['nama_surat'] ?></h3>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php if(!session()->get('islogin')) : ?>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 hero-text-image">
                    <div class="row">
                        <div class="col-12 col-lg-12 text-center text-lg-center">
                            <p class="mb-3">Silahkan Login Terlebih dahulu sebelum melakukan Permohonan Surat Menyurat</p>
                            <p><a href="<?= base_url('surat-online/login    '); ?>" class="btn btn-outline-white">login</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>
    </section>

<?= $this->endSection(); ?>
