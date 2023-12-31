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
        <section id="groups">
            <div class="row match-height">
                <div class="col-12 mt-3 mb-1">
                    <h4 class="section-title text-uppercase">Surat</h4>
                </div>
            </div>
            <div class="row match-height">
                <div class="col-12">
                    <div class="card-group">
                        <?php foreach($dataSurat as $surat): ?>
                        <div class="col-6 col-md-3 mb-3">

                            <div class="card">
                                <div class="card-content" style="text-align: center;">
                                    <div class="card-body">
                                        <h4 class="card-title mb-0"><?= $surat['nama_surat']; ?></h4>
                                    </div>
                                    <div class="card-body">
                                        <i style="font-size: 200px; color: #FF5B5C" class="fa-regular fa-file"></i>
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
                </div>
            </div>
        </section>
    </div>
<?= $this->endSection(); ?>