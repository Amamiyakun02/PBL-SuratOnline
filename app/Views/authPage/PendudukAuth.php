
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign in</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.css') ?>">
    <link href="https://fonts.googleapis.com/css2?family=Garamond&display=swap" rel="stylesheet">
    <script src="<?= base_url('assets/fonts/fontawesome-6.5.1/js/all.js') ?>"></script>

    <!-- <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon"> -->
    <link rel="stylesheet" href="<?= base_url('assets/css/app.css') ?>">
</head>

<body>
    <div id="auth">
        
<div class="container">
    <div class="row">
        <div class="col-md-5 col-sm-12 mx-auto">
            <div class="card pt-4">
                <div class="card-body">
                    <div class="text-center mb-5">
                        <!-- <img src="assets/images/favicon.svg" height="48" class='mb-4'> -->
                        <h3>Surat Online</h3>
                    </div>
                    <?php if (!empty(session()->getFlashdata('notFoundNIK'))) : ?>
                    <div id="auth_penduduk_alert" class="alert alert-danger text-center" role="alert">
                        <?= session()->getFlashdata('notFoundNIK'); ?>
                    </div>
                    <?php endif; ?>
                    <form action="<?= site_url('/penduduk-auth'); ?>" method="post">
                        <div class="form-group position-relative has-icon-left justify-content-center">
                            <?= csrf_field(); ?>
                            <label for="nik">NIK</label>
                            <div class="position-relative">
                                <input type="text" class="form-control" name="nik" id="nik" placeholder="masukkan nomor nik anda">
                                <div class="form-control-icon">
                                    <i class="fa-solid fa-users"></i>
                                </div>
                            </div>
                        </div>

                        <div class='form-check clearfix my-4'>

                        </div>
                        <div class="clearfix">
                            <button type="submit" class="btn btn-primary float-center">Masuk</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

    </div>

    <script src="<?= base_url(); ?>assets/js/app.js"></script>
    <script src="<?= base_url('assets/fonts/fontawesome-6.5.1/js/all.js') ?>"></script>
    <script src="<?= base_url(); ?>assets/js/main.js"></script>
    <script>
            document.getElementById('nik').addEventListener('input', function (event) {
            let inputValue = event.target.value.replace(/\D/g, ''); // Remove non-numeric characters
            const maxLength = 16;

            if (inputValue.length > maxLength) {
                inputValue = inputValue.slice(0, maxLength); // Truncate to 16 digits
            }

            event.target.value = inputValue; // Set the updated value back to the input
        });
        document.addEventListener('DOMContentLoaded', function () {
            setTimeout(function () {
                var alertElement = document.getElementById('auth_penduduk_alert');
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
