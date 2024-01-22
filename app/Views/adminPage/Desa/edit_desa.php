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
                        <li class="breadcrumb-item"><a href="<?php base_url('/desa') ?>">Kelola Desa</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Desa</li>
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
                        <h4 class="card-title">Form Edit Desa</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-vertical" action="<?= base_url('desa/update'); ?>" method="post">
                                <?php csrf_field(); ?>
                                <div class="form-body">
                                    <div class="row">
                                        <input type="hidden" name= "id" value="<?= $desa['id']; ?>">
                                        <div class="col-12">
                                            <div class="form-group">
                                            <label for="nama-desa">Nama Desa</label>
                                            <input type="text" id="nama-desa" class="form-control" name="desa" value="<?= $desa['nama']; ?>"
                                                placeholder="Nama Desa">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="kode-pos">Kode Pos</label>
                                                <input type="number" id="kode-pos" class="form-control" name="kodepos" value="<?= $desa['kode_pos']; ?>"
                                                placeholder="Kode Pos">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="kode-wilayah">Kode Wilayah</label>
                                                <input type="text" id="kode-wilayah" class="form-control" name="kode_wilayah" value="<?= $desa['kode_wilayah']; ?>"
                                                placeholder="Kode Wilayah">
                                            </div>
                                        </div>
<!--                                        <div class="col-12">-->
<!--                                            <div class="form-group">-->
<!--                                            <label for="kode-wilayah">Kecamatan</label>-->
<!--                                                <select id="Kecamatan" name="Kecamatan" class="form-select" value="--><?php //= $desa['id_kecamatan']; ?><!--">-->
<!--                                                    <option value="">Pilih Kecamatan</option>-->
<!--                                                --><?php //foreach ($kecamatan as $item) : ?>
<!--                                                    <option value="--><?php //= $item['id']; ?><!--">--><?php //= $item['nama']; ?><!--</option>-->
<!--                                                --><?php //endforeach; ?>
<!--                                                </select>-->
<!--                                            </div>-->
<!--                                        </div>-->
                                        <div class="col-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary mr-1 mb-1">Simpan</button>
                                            <button type="reset" class="btn btn-light-secondary mr-1 mb-1">Reset</button>
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