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
                            <li class="breadcrumb-item"><a href="<?php base_url('/dashboard') ?>">Surat</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Daftar Permohonan Surat</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <section id="groups">
                <div class="row match-height">
                    <div class="col-12 mt-3 mb-1">
                        <h4 class="section-title text-uppercase">Permohonan Surat</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body" style="margin-bottom: 20px;">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="card-content">
                                                <div class="card-body">
                                                    <i style="font-size: 150px; color: #FF5B5C" class="fa-regular fa-file"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="card-content">
                                                <div class="card-body">
                                                    <h3 class="card-title mb-0">SURAT IZIN USAHA</h3>
                                                </div>
                                                <div class="card-body">
                                                    <h4 class="mb-0">Dari     : M.Miareza</h4>
                                                    <h4 class="mb-0">No NIK   : 6301301179</h4>
                                                    <h4 class="mb-0">No Surat : 295626</h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div style="margin-top: 100px">
                                                <button class="btn btn-primary">Lihat</button>
                                                <button class="btn btn-success">Proses</button>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="card-content">
                                                <div class="card-body">
                                                    <i style="font-size: 150px; color: #FF5B5C" class="fa-regular fa-file"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="card-content">
                                                <div class="card-body">
                                                    <h3 class="card-title mb-0">SURAT KETERANGAN TIDAK MAMPU</h3>
                                                </div>
                                                <div class="card-body d-flex flex-column">
                                                    <h4 class="mb-0">Dari     : M.Miareza</h4>
                                                    <h4 class="mb-0">No NIK   : 6301301179</h4>
                                                    <h4 class="mb-0">No Surat : 295626</h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div style="margin-top: 100px">
                                                <button class="btn btn-primary">Lihat</button>
                                                <button class="btn btn-success">Proses</button>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
<?= $this->endSection(); ?>