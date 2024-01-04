<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.css') ?>">

    <!-- <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon"> -->
    <link rel="stylesheet" href="<?= base_url('assets/css/app.css') ?>">
    <script src="<?= base_url('js/jquery-3.7.1.min.js'); ?>"></script>
    <script>
        jQuery(document).ready(function(){
            $("#Kecamatan").change(function(){
                let kecamatanId = $(this).val();
                console.log(kecamatanId);
                $.ajax({
                    type: "POST",
                    url: "<?= base_url('getDesa'); ?>",
                    data: { id_kecamatan: kecamatanId },
                    success: function(data){
                        $('#desa').html(data);
                    }
                });
            });
        });
    </script>
</head>

<body>
    <div id="auth">
        <div class="container">
            <div class="row">
                <div class="col-md-7 col-sm-12 mx-auto">
                    <div class="card pt-4">
                        <div class="card-body">
                            <div class="text-center mb-5">
                                <!-- <img src="assets/images/favicon.svg" height="48" class='mb-4'> -->
                                <h3>Form Registrasi</h3>
                            </div>
                            <?php if (!empty(session()->getFlashdata('error_reg'))) : ?>
                                <div id="error_register" class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                                    <?= session()->getFlashdata('error_reg'); ?>
                                </div>
                            <?php endif; ?>
                            <form class="form form-horizontal" action="/register_add" method="post">
                                <?= csrf_field() ?>
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="username">Nama Pengguna</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="username" class="form-control" name="username" placeholder="nama pengguna anda">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="email-id">Email</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="email" id="email-id" class="form-control" name="email" placeholder="email anda">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="nomer-hp">Nomer Telepon</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="nomer-hp" class="form-control" name="nomor_telpon" placeholder="nomor telepon anda">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="password">Password</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="password" id="password" class="form-control" name="password" placeholder="password anda">
                                        </div>
                                        <div class="col-md-4">
                                            <label for=Kecamatan>Kecamatan</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <select id="Kecamatan" name="Kecamatan" class="form-select">
                                                <option value="">Pilih Kecamatan</option>
                                            <?php foreach ($kecamatan as $item) : ?>
                                                <option value="<?= $item['id']; ?>"><?= $item['nama']; ?></option>
                                            <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="desa">Desa</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <select id="desa" name="desa" class="form-select">
                                            <option value="">Pilih Desa</option>
             
                                            </select>
                                            <!-- <button type="reset" class="btn btn-light-secondary mr-1 mb-1">Reset</button> -->
                                        </div>
                                        <a href="<?= base_url('/'); ?>">Sudah punya Akun? Login</a>
                                        <div class="col-sm-12 d-flex justify-content-end">
                                            <input type="submit" class="btn btn-primary mr-1 mb-1" value="Register">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script src="<?= base_url(); ?>assets/js/app.js"></script>
    <script src="<?= base_url(); ?>js/jquery-3.7.1.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/main.js"></script>
    <script>
        document.getElementById('nomer-hp').addEventListener('input', function(event) {
            let inputValue = event.target.value.replace(/\D/g, ''); // Remove non-numeric characters
            const maxLength = 13;

            if (inputValue.length > maxLength) {
                inputValue = inputValue.slice(0, maxLength); // Truncate to 16 digits
            }

            event.target.value = inputValue; // Set the updated value back to the input
        });
        document.addEventListener('DOMContentLoaded', function () {
            setTimeout(function () {
                var alertElement = document.getElementById('error-register');
                alertElement.style.transition = 'opacity 0.5s';
                alertElement.style.opacity = '0';

                setTimeout(function () {
                    alertElement.style.display = 'none';
                }, 500); // 0.5 detik setelah transisi selesai
            }, 3000); // 3 detik setelah halaman dimuat
        });
    </script>
</body>

</html>