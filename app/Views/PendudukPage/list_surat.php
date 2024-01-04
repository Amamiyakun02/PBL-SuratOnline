<?= $this->extend('PendudukPage/main'); ?>

<?= $this->section('content'); ?>
<section class="section">
    <div class="container">

        <div class="row justify-content-center text-center">
            <div class="col-md-7 mb-5">
                <h2 class="section-heading">Daftar Surat</h2>
                <h3 class="section-heading">Desa Tambang Ulang</h3>
            </div>
        </div>
        <div class="row align-items-stretch" >
            <?php foreach ($surat_list as $surat): ?>
            <div class="col-lg-4 mb-4 mb-lg-0" style="margin-bottom: 5px">
                <div class="pricing h-100 text-center">
                    <h3><?= $surat['nama_surat'] ?></h3>
                    <ul class="list-unstyled">
                        <li class="no_dis">.</li>
                        <li class="no_dis">.</li>
                        <li class="no_dis">.</li>
                        <li class="no_dis">.</li>
                    </ul>
                    <div class="price-cta">
                        <p><a href="<?= base_url('surat-online/permohonan-page/'. $surat['id']); ?>" class="btn btn-white">Pilih Surat</a></p>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>
