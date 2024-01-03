<?= $this->extend('PendudukPage/main'); ?>
<?php $dataPenduduk = session()->get('penduduk_data'); ?>
<?= $this->section('content'); ?>
    <div class="main-content container-fluid">
        <section class="section row d-flex justify-content-center align-items-center">
            <div class="page-title">
                <div class="container">
                    <h3 class="text-center"><?= $nama_surat; ?></h3>
                </div>
            </div>
            <div class="container card-header card-surat" style="padding-left: 0; padding-top: 1px;">
                <div class="kop text-center">
                    <img src="<?= base_url('assets/images/kop_surat/'.$kop_path); ?>" alt="KOP Surat" style="width: 19cm; margin:0 0 0 0">
                </div>
                <div class="surat-content" style="color: black;" >
                    <?= $content; ?>
                </div>
            </div>
            <div class="container" style="margin-top: 10px">
                <form action="<?= site_url('surat-online/permohonan'); ?>" method="post">
                    <?= csrf_field() ?>
                    <input type="hidden" name="id_surat" value="<?= $id_surat; ?>">
                    <input type="hidden" name="id_penduduk" value="<?= $dataPenduduk['id']; ?>">
                    <input type="hidden" name="id_desa" value="<?= $dataPenduduk['id_desa']; ?>">
                    <div class="d-flex justify-content-center buttons">
                        <button type="submit" class="btn btn-primary">Ajukan Permohonan</button>
                    </div>
                </form>
            </div>
        </section>
    </div>

<?= $this->endSection(); ?>