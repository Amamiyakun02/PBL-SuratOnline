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
                            <li class="breadcrumb-item active" aria-current="page">Penduduk</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-header">
                    Daftar Penduduk
                </div>
                <div class="card-body">
                <a href="<?= base_url('penduduk/tambah'); ?>" class="btn icon icon-left btn-primary"><i class="fas fa-plus" ></i>Tambah Penduduk</a>
                    <table class='table table-striped' id="tablePenduduk">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>Tempat Lahir</th>
                            <th>Nomor HP</th>
                            <th>Tanggal Lahir</th>
                            <th>Jenis Kelamin</th>
                            <th>Alamat</th>
                            <th>RT</th>
                            <th>RW</th>
                            <th>Desa</th>
                            <th>Agama</th>
                            <th>Status Perkawinan</th>
                            <th>Pekerjaan</th>
                            <th>Kewarganegaraan</th>
                            <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($penduduk as $row) : ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $row['NIK']; ?></td>
                                <td><?= $row['Nama']; ?></td>
                                <td><?= $row['tempat_lahir']; ?></td>
                                <td><?= $row['nomor_hp']; ?></td>
                                <td><?= $row['tanggal_lahir']; ?></td>
                                <td><?php echo ($row['jenis_kelamin'] == 1) ? "Laki-Laki" : "Perempuan"; ?></td>
                                <td><?= $row['alamat']; ?></td>
                                <td><?= $row['RW']; ?></td>
                                <td><?= $row['RT']; ?></td>
                                <td><?= $row['desa']; ?></td>
                                <td><?= $row['agama']; ?></td>
                                <td><?= $row['status_perkawinan']; ?></td>
                                <td><?= $row['pekerjaan']; ?></td>
                                <td><?= $row['kewarganegaraan']; ?></td>
                                <td>
                                    <div class="row">
                                        <a href="<?= site_url('/penduduk/edit/' . $row['id']); ?>"><i class="far fa-edit"></i></a>
                                        <a href="<?= site_url('/penduduk/delete/' . $row['id']); ?>"><i style="color: red;" class="fas fa-trash-alt"></i></a>
                                    </div>
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