<?= $this->extend('layouts/main'); ?>

<?= $this->section('main-content'); ?>

<div class="main-content container-fluid">
    <div class="page-title">
        <h3>Dashboard</h3>
    </div>
    <section class="section">
        <div class="row mb-2">
        <?php if(session()->get('role') == 'admin'): ?>
            <div class="col-12 col-md-3">
                <a href="<?= base_url('/user'); ?>">
                    <div class="card card-statistic">
                        <div class="card-body p-0">
                            <div class="d-flex flex-column">
                                <div class='px-3 py-3 d-flex justify-content-between'>
                                    <h3 class='card-title'>Kelola Pengguna</h3>
                                    <div class="card-right d-flex align-items-center">
                                        <p></p>
                                    </div>
                                </div>
                                <div class="chart-wrapper">
                                    <!-- <canvas id="canvas1" style="height:100px !important"></canvas> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-12 col-md-3">
                <a href="<?= base_url('/surat'); ?>">
                    <div class="card card-statistic">
                        <div class="card-body p-0">
                            <div class="d-flex flex-column">
                                <div class='px-3 py-3 d-flex justify-content-between'>
                                    <h3 class='card-title'>Kelola Arsip Surat</h3>
                                    <div class="card-right d-flex align-items-center">
                                        <p></p>
                                    </div>
                                </div>
                                <div class="chart-wrapper">
                                    <canvas id="canvas2" style="height:100px !important"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-12 col-md-3">
                <a href="<?= base_url('/penduduk'); ?>">
                    <div class="card card-statistic">
                        <div class="card-body p-0">
                            <div class="d-flex flex-column">
                                <div class='px-3 py-3 d-flex justify-content-between'>
                                    <h3 class='card-title'>Kelola Penduduk</h3>
                                    <div class="card-right d-flex align-items-center">
                                        <p></p>
                                    </div>
                                </div>
                                <div class="chart-wrapper">
                                    <canvas id="canvas3" style="height:100px !important"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-12 col-md-3">
                <a href="<?= base_url('/wilayah'); ?>">
                    <div class="card card-statistic">
                        <div class="card-body p-0">
                            <div class="d-flex flex-column">
                                <div class='px-3 py-3 d-flex justify-content-between'>
                                    <h3 class='card-title'>Kelola Wilayah</h3>
                                    <div class="card-right d-flex align-items-center">
                                        <p></p>
                                    </div>
                                </div>
                                <div class="chart-wrapper">
                                    <canvas id="canvas4" style="height:100px !important"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        <?php elseif(session()->get('role') == 'admin-desa'): ?>
            <div class="col-12 col-md-3">
                <a href="<?= base_url('/surat'); ?>">
                    <div class="card card-statistic">
                        <div class="card-body p-0">
                            <div class="d-flex flex-column">
                                <div class='px-3 py-3 d-flex justify-content-between'>
                                    <h3 class='card-title'>Kelola Arsip Surat</h3>
                                    <div class="card-right d-flex align-items-center">
                                        <p></p>
                                    </div>
                                </div>
                                <div class="chart-wrapper">
                                    <canvas id="canvas2" style="height:100px !important"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-12 col-md-3">
                <a href="<?= base_url('/penduduk'); ?>">
                    <div class="card card-statistic">
                        <div class="card-body p-0">
                            <div class="d-flex flex-column">
                                <div class='px-3 py-3 d-flex justify-content-between'>
                                    <h3 class='card-title'>Kelola Penduduk</h3>
                                    <div class="card-right d-flex align-items-center">
                                        <p></p>
                                    </div>
                                </div>
                                <div class="chart-wrapper">
                                    <canvas id="canvas3" style="height:100px !important"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        <?php endif; ?>
        </div>
        <div class="row mb-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="card-title">Permohonan Surat</h4>
                        <!-- <div class="d-flex ">
                            <i data-feather="download"></i>
                        </div> -->
                    </div>
                    <div class="card-body px-0 pb-0">
                        <div class="table-responsive">
                            <table class='table mb-0' id="table1">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>NIK</th>
                                        <th>No. HP</th>
                                        <th>Surat</th>
                                        <th>Waktu Permohonan</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($pengajuan as $row): ?>
                                    <tr>
                                        <td><?= $row['Nama'] ?></td>
                                        <td><?= $row['NIK'] ?></td>
                                        <td><?= $row['nomor_hp'] ?></td>
                                        <td><?= $row['nama_surat'] ?></td>
                                        <td><?= $row['tanggal_pengajuan'] ?></td>
                                        <td>
                                            <span class="badge bg-primary"><?= $row['status_pengajuan']; ?></span>
                                        </td>
                                    </tr>

                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
<!--            <div class="col-md-8">-->
<!--            </div>-->
        </div>
    </section>
</div>

<?= $this->endSection(); ?>