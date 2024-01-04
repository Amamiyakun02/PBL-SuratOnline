<?= $this->extend('PendudukPage/main'); ?>

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
                <div class="d-flex justify-content-center buttons">
                    <a href="<?= base_url('download/'. $id_surat); ?>" class="btn btn-secondary">Download</a>
                </div>
            </div>
        </section>
    </div>
<?= $this->endSection(); ?>