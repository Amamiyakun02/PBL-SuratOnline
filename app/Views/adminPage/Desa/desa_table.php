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
                            <li class="breadcrumb-item"><a href="<?php base_url('/dashboard') ?>">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Desa</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-header">
                    Daftar Desa
                </div>
                <div class="card-body">
                <a href="<?= base_url('desa/tambah'); ?>" class="btn icon icon-left btn-primary"><i class="fas fa-plus"></i>Tambah Desa</a>
                    <table class='table table-striped' id="tableDesa">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Kode Pos</th>
                                <th>Kode wilayah</th>
                                <th>Nama Kecamatan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach($desa as $row): ?>
                            <tr>
                                <td><?= $row['nama']; ?></td>
                                <td><?= $row['kode_pos']; ?></td>
                                <td><?= $row['kode_wilayah']; ?></td>
                                <td><?= $row['kecamatan']; ?></td>
                                <td>
                                    <a href="<?= site_url('/desa/edit/'. $row["id"]); ?>"><i class="far fa-edit"></i></a>
                                    <a href="<?= site_url('/desa/delete/'. $row["id"]); ?>"><i style="color:red;" class="fas fa-trash-alt"></i></a>
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