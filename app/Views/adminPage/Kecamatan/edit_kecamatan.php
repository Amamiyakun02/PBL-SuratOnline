<?= $this->extend('layouts/main'); ?>

<?= $this->section('main-content'); ?>
<div class="main-content container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3><?= $head; ?></h3>
                <p></p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class='breadcrumb-header'>
                    <ol class="breadcrumb">
                        <!-- <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li> -->
                        <li class="breadcrumb-item"><a href="<?php base_url('/kecamatan') ?>">Kelola Kecamatan</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Kecamatan</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section id="basic-vertical-layouts">
        <div class="row match-height justify-content-center">
            <div class="col-md-10 col-12">
                <div class="card">
                    <div class="card-header">

                        <h4 class="card-title">Form Edit Kecamatan</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                        <form class="form form-vertical" method="post" action="/kecamatan/update">
                                <?php csrf_field() ?>
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <input type="hidden" value="<?= $kecamatan['id']; ?>" class="form-control" name="id">
                                            <div class="form-group">
                                            <label for="first-name-vertical">Nama Kecamatan</label>
                                            <input type="text" id="first-name-vertical" value="<?= $kecamatan['nama']; ?>" class="form-control" name="kecamatan"
                                                placeholder="Nama Kecamatan">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="email-id-vertical">Kode Pos</label>
                                                <input type="text" id="email-id-vertical" value="<?= $kecamatan['kode_pos']; ?>" class="form-control" name="kodepos"
                                                placeholder="Kode Pos">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="contact-info-vertical">Kode Wilayah</label>
                                                <input type="text" id="contact-info-vertical" value="<?= $kecamatan['kode_wilayah']; ?>" class="form-control" name="kode_wilayah"
                                                placeholder="Kode Wilayah">
                                            </div>
                                        </div>
                                        <div class="col-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary mr-1 mb-1">Simpan</button>
                                            <button type="reset" class="btn btn-light-secondary mr-1 mb-1">Kembali</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?= $this->endSection(); ?>