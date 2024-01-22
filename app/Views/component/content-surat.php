<?= $this->extend('layouts/main'); ?>

<?= $this->section('main-content'); ?>
<?php
    $nik = '';
    $nama = '';
    $tempat_lahir = '';
    $nomor_hp = '';
    $tanggal_lahir = '';
    $jenis_kelamin = '';
    $alamat = '';
    $rt = '';
    $rw = '';
    $agama = '';
    $pekerjaan = '';
    $status = '';
    $kewarganegaraan = '';
?>
    <div class="main-content container-fluid">
        <div class="page-title">
            <div class="container">
                <div class="col-12">
                    <h3 class="text-center"><?= $nama_surat; ?></h3>
                </div>
            </div>
        </div>
        <section class="section row d-flex justify-content-center align-items-center">
            <div class="container card-header card-surat" style="padding-left: 0; padding-top: 1px;">
                <div class="kop text-center">
                    <img src="<?= base_url('assets/images/kop_surat/'.$kop_path); ?>" alt="KOP Surat" style="width: 19cm; margin:0 0 0 0">
                </div>
                <div class="surat-content">
                    <?php eval("?>$content<?php "); ?>
                </div>
            </div>
            <div class="container" style="margin-top: 10px">
                <div class="d-flex justify-content-center buttons">
                    <button type="button" class="btn btn-secondary">Kembali</button>
                    <button type="submit" class="btn btn-primary">hapus</button>
                </div>
            </div>

        </section>
    </div>

<?= $this->endSection(); ?>