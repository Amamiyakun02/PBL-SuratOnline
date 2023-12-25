<?= $this->extend('layouts/main'); ?>

<?= $this->section('main-content'); ?>

    <div class="main-content container-fluid">
        <div class="page-title">
            <div class="container">
                <div class="col-12">
                    <h3 class="text-center"><?= $nama_surat; ?></h3>
                </div>
<!--                <div class="col-12 col-md-6 order-md-2 order-first">-->
<!--                    <nav aria-label="breadcrumb" class='breadcrumb-header'>-->
<!--                        <ol class="breadcrumb">-->
<!--                            <li class="breadcrumb-item"><a href="--><?php //base_url('/dashboard') ?><!--">Surat</a></li>-->
<!--                            <li class="breadcrumb-item active" aria-current="page">Buat Surat</li>-->
<!--                        </ol>-->
<!--                    </nav>-->
<!--                </div>-->
            </div>
        </div>
        <section class="section row d-flex justify-content-center align-items-center">
            <div class="container card-header card-surat" style="padding-left: 0; padding-top: 1px;">
                <div class="kop text-center">
                    <img src="<?= base_url('assets/images/kop_surat/'.$kop_path); ?>" alt="KOP Surat" style="width: 19cm; margin:0 0 0 0">
                </div>
                <div class="surat-content">
                    <?= $content; ?>
                </div>
            </div>
            <div class="container" style="margin-top: 10px">
                <div class="d-flex justify-content-center buttons">
                    <button type="button" class="btn btn-secondary">Kembali</button>
                    <button type="submit" class="btn btn-primary">Edit</button>
                </div>
            </div>

        </section>
    </div>

<?= $this->endSection(); ?>