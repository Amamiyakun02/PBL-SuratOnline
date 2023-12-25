<?= $this->extend('layouts/main'); ?>

<?= $this->section('main-content'); ?>

<div class="main-content container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3><?= $head; ?></h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first  ">
                <nav aria-label="breadcrumb" class='breadcrumb-header'>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php base_url('/dashboard') ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Kecamatan</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                Daftar Kecamatan
            </div>
            <div class="card-body">
            <a href="<?= base_url('kecamatan/tambah'); ?>" class="btn icon icon-left btn-primary"><i class="fas fa-plus"></i>Tambah Kecamatan</a>
                <table class='table table-striped' id="tableKecamatan">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Kode Pos</th>
                            <th>Kode Wilayah</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($kecamatan as $kec): ?>
                            <tr>
                                <td><?= $kec['nama']; ?></td>
                                <td><?= $kec['kode_pos']; ?></td>
                                <td><?= $kec['kode_wilayah']; ?></td>
                                <td>
                                    <a href="<?= site_url('/kecamatan/edit/' . $kec['id']); ?>"><i class="far fa-edit"></i></a>
                                    <a href="<?= site_url('/kecamatan/delete/' . $kec['id']); ?>"><i style="color: red;" class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>      
                    </tbody>

                </table>
            </div>
        </div>
    </section>
</div>
<?= $this->endSection(); ?>