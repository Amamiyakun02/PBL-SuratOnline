<?= $this->extend('PendudukPage/main'); ?>

<?= $this->section('content'); ?>
<!-- ======= Hero Section ======= -->
<section class="hero-section" id="hero">
    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="feature-1 text-center">
                        <div class="wrap-icon icon-1">
                            <i class="bi bi-people"></i>
                        </div>
                        <h3 class="mb-3">Surat A</h3>
                        <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem, optio.</p> -->
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-1 text-center">
                        <div class="wrap-icon icon-1">
                            <i class="bi bi-bar-chart"></i>
                        </div>
                        <h3 class="mb-3">Surat B</h3>
                        <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem, optio.</p> -->
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-1 text-center">
                        <div class="wrap-icon icon-1">
                            <i class="bi bi-people"></i>
                        </div>
                        <h3 class="mb-3">Surat C</h3>
                        <p></p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-1 text-center">
                        <div class="wrap-icon icon-1">
                            <i class="bi bi-bar-chart"></i>
                        </div>
                        <h3 class="mb-3">Surat D</h3>
                        <p></p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-1 text-center">
                        <div class="wrap-icon icon-1">
                            <i class="bi bi-bar-chart"></i>
                        </div>
                        <h3 class="mb-3">Surat E</h3>
                        <p></p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-1 text-center">
                        <div class="wrap-icon icon-1">
                            <i class="bi bi-bar-chart"></i>
                        </div>
                        <h3 class="mb-3">Surat F</h3>
                        <p></p>
                    </div>
                </div>
            </div>
        </div>
        <?php if(!session()->get('islogin')) : ?>

        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 hero-text-image">
                    <div class="row">
                        <div class="col-lg-8 text-center text-lg-start">
<!--                            <h1 >Lorem</h1>-->
                            <p class="mb-5">Silahkan Login Terlebih dahulu sebelum melakukan Permohonan Surat Menyurat</p>
                            <p><a href="<?= base_url('surat-online/login    '); ?>" class="btn btn-outline-white">login</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>
    </section>

<?= $this->endSection(); ?>
