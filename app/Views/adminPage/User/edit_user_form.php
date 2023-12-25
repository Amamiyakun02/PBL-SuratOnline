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
                        <li class="breadcrumb-item"><a href="<?php base_url('/user') ?>">Kelola Pengguna</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tambah Pengguna</li>
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
                        <h4 class="card-title">Form Tambah Pengguna</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-vertical" action="/user/insert" method="post">
                                <?php csrf_field(); ?>
                                <div class="form-body">
                                    <div class="row">
                                    <input type="hidden" id="id" class="form-control" name="id" value="<?= $user['id']; ?>">
                                        <div class="col-12">
                                            <div class="form-group">
                                            <label for="username">Nama Pengguna</label>
                                            <input type="text" id="username" class="form-control" name="username" value="<?= $user['username']; ?>"
                                                placeholder="Nama Pengguna">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="email" id="email" class="form-control" name="email" value="<?= $user['email']; ?>"
                                                placeholder="Email">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="Nomor-Telepon">Nomor Telepon</label>
                                                <input type="text" id="Nomor-Telepon" class="form-control" name="nomor-telpon" value="<?= $user['nomor_telpon']; ?>"
                                                placeholder="Nomor Telepon">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="password">Password</label>
                                                <input type="password" id="password" class="form-control" name="password"
                                                placeholder="Password">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                            <label for="kecamatan">Kecamatan</label>
                                                <select id="kecamatan" name="id-kecamatan" class="form-select">
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
                                                <select id="desa" name="id-desa" class="form-select">
                                                    <option value="">Pilih Desa</option>
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
<script>
        $(document).ready(function(){
            $("#kecamatan").change(function(){
                var kecamatanId = $(this).val();
                console.log(kecamatanId);
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('desa/getDesa'); ?>",
                    data: { id_kecamatan: kecamatanId },
                    success: function(data){
                        $("#desa").html(data);
                    }
                });
            });
        });
    </script>
<?= $this->endSection(); ?>