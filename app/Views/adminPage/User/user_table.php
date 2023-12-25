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
                        <li class="breadcrumb-item active" aria-current="page">Pengguna</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                Daftar Pengguna
            </div>
            <div class="card-body">
            <a href="<?= base_url('user/tambah'); ?>" class="btn icon icon-left btn-primary"><i class="fas fa-plus"></i>Tambah Pengguna</a>
                <table class='table table-striped' id="tablePengguna">
                    <thead>
                        <tr>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Nomor Telepon</th>
                            <th>Level</th>
                            <th>Desa</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($pengguna as $user): ?>
                        <tr>
                            <td><?= $user['username']; ?></td>
                            <td><?= $user['email']; ?></td>
                            <td><?= $user['nomor_telpon']; ?></td>
                            <td><?= $user['role']; ?></td>
                            <td><?= $user['desa']; ?></td>
                            <td>
                                <a href="<?= site_url('/user/edit/'. $user["id"]); ?>"><i class="far fa-edit"></i></a>
                                <a href="<?= site_url('/user/delete/'. $user["id"]); ?>"><i style="color: red;" class="fas fa-trash-alt"></i></a>
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