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
                            <li class="breadcrumb-item"><a href="<?php base_url('/penduduk') ?>">Kelola Penduduk</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Penduduk</li>
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
                            <h4 class="card-title">Form Tambah Penduduk</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form form-vertical" method="post" action="<?= base_url('/penduduk/update') ?>">
                                    <?php csrf_field() ?>
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <input type="hidden" name="id" value="<?= $penduduk['id']; ?>">
                                                <div class="form-group">
                                                    <label for="nik">No NIK</label>
                                                    <input type="text" id="nik" value="<?= $penduduk['NIK']; ?>" class="form-control" name="nik"
                                                           placeholder="No NIK">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="nama">Nama Lengkap</label>
                                                    <input type="text" id="nama" class="form-control" name="nama"
                                                           placeholder="Nama Lengkap" value="<?= $penduduk['Nama'] ?>">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="nomor_hp">No. HP/WA</label>
                                                    <input type="number" id="nomor_hp" class="form-control" name="nomor_hp"
                                                           placeholder="No. HP/WA" value="<?= $penduduk['nomor_hp']; ?>">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="tempat_lahir">Tempat Lahir</label>
                                                    <input type="text" id="tempat_lahir" class="form-control" name="tempat_lahir"
                                                           placeholder="Tempat Lahir" value="<?= $penduduk['tempat_lahir']; ?>">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="tanggal_lahir">Tanggal Lahir</label>
                                                    <input type="date" id="tanggal_lahir" class="form-control" pattern="\d{2}/\d{2}/\d{4}" name="tanggal_lahir"
                                                           placeholder="Tanggal Lahir" value="<?= $penduduk['tanggal_lahir']; ?>">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="jenis_kelamin">Jenis Kelamin</label>
                                                    <select id="jenis_kelamin" name="jenis_kelamin" class="form-select">
                                                        <option value="value="<?= $penduduk['jenis_kelamin']; ?>">Pilih Jenis Kelamin</option>
                                                        <option value="1">Laki-laki</option>
                                                        <option value="0">Perempuan</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="alamat">Alamat</label>
                                                    <input type="text" id="alamat" class="form-control" name="alamat"
                                                           placeholder="Alamat" value="<?= $penduduk['alamat']; ?>">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="Kecamatan">Kecamatan</label>
                                                    <select id="Kecamatan" name="id-kecamatan" class="form-select">
                                                        <option value="">Pilih Kecamatan</option>
                                                        <?php foreach ($kecamatan as $item) : ?>
                                                            <option value="<?= $item['id']; ?>"><?= $item['nama']; ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="desa">desa</label>
                                                    <select id="desa" name="desa" class="form-select">
                                                        <option value="<?= $penduduk['id_desa']; ?>"">Pilih Desa</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="rt">RT</label>
                                                    <input type="text" id="rt" class="form-control" name="rt"
                                                           placeholder="RT" value="<?= $penduduk['RT']; ?>">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="rw">RW</label>
                                                    <input type="text" id="rw" class="form-control" name="rw"
                                                           placeholder="RW" value="<?= $penduduk['RW']; ?>">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="agama">Agama</label>
                                                    <input type="text" id="agama" class="form-control" name="agama"
                                                            placeholder="Agama" value="<?= $penduduk['agama']; ?>">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="status_kawin">Status Perkawinan</label>
                                                    <select id="status_kawin" name="status_kawin" class="form-select">
                                                        <option value="value="<?= $penduduk['status_perkawinan']; ?>">Status Perkawinan</option>
                                                        <option value="KAWIN">KAWIN</option>
                                                        <option value="BELUM KAWIN">BELUM KAWIN</option>
                                                        <option value="CERAI HIDUP">CERAI HIDUP</option>
                                                        <option value="CEARI MATI">CEARI MATI</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="pekerjaan">Pekerjaan</label>
                                                    <input type="text" id="pekerjaan" class="form-control" name="pekerjaan"
                                                           placeholder="Pekerjaan" value="<?= $penduduk['pekerjaan']; ?>">
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="kewarganegaraan">Kewarganegaraan</label>
                                                    <select id="kewarganegaraan" name="kewarganegaraan" class="form-select">
                                                        <option value="value="<?= $penduduk['kewarganegaraan']; ?>">Pilih Kewarganegaraan</option>
                                                        <option value="WNI">WNI</option>
                                                        <option value="WNA">WNA</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12 d-flex justify-content-end">
                                                <button type="submit" class="btn btn-primary mr-1 mb-1">Submit</button>
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