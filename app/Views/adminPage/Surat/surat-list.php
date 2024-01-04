<?= $this->extend('layouts/main'); ?>

<?= $this->section('main-content'); ?>

    <div class="main-content container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3><?= $head; ?></h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class='breadcrumb-header'>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php base_url('/surat') ?>">Surat</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Daftar Surat</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section id="bg-variants">
            <div class="row">
                <div class="col-12 mt-3 mb-1">
                    <h4 class="section-title text-uppercase">Daftar Surat</h4>
                </div>
            </div>

            <div class="row">
                <?php foreach($dataSurat as $surat): ?>
                <div class="col-xl-4 col-sm-6 col-12">
                    <div class="card text-center">
                        <div class="card-content">
                            <div class="card-body">
                                <h4 class="card-title mb-0"><?= $surat['nama_surat']; ?></h4>
                            </div>
                            <div class="card-body">
                                <i style="font-size: 175px; color: #5bb2ff" class="fa-regular fa-file"></i>
                            </div>
                            <div class="card-body">
                                <a href="<?= base_url('surat/surat-desa/'. $surat['id']); ?>" class="btn btn-info">Lihat</a>
                                <a href="<?= base_url('surat/delete/'. $surat['id']); ?>" class="btn btn-danger">Hapus</a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </section>
    </div>
<?= $this->endSection(); ?>