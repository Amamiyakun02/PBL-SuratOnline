<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP VERIFICATION</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.css') ?>">
    
    <!-- <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon"> -->
    <link rel="stylesheet" href="<?= base_url('assets/css/app.css') ?>">
</head>

<body>
    <div id="auth">
        
<div class="container">
    <div class="row">
        <div class="col-md-5 col-sm-12 mx-auto">
            <div class="card py-4">
                <div class="card-body">
                    <div class="text-center mb-5">
                        <!-- <img src="assets/images/favicon.svg" height="48" class='mb-4'> -->
                        <h3>VERIFIKASI OTP</h3>
                        <!-- <p>Please enter your email to receive password reset link.</p>  -->
                    </div>
                    <?php if (!empty(session()->getFlashdata('invalid_otp'))) : ?>
                        <div id="otpInvalid" class="alert alert-danger text-center" role="alert">
                            <?= session()->getFlashdata('invalid_otp'); ?>
                        </div>
                    <?php endif; ?>
                    <form action="<?= site_url('otp-verify'); ?>" method="post">
                        <?= csrf_field() ?>
                        <div class="form-group">
                            <label for="first-name-column">Masukkan Kode OTP</label>
                            <input type="text" id="first-name-column" class="form-control" name="otp_code" placeholder="XXXXXX">
                        </div>

                        <div class="clearfix">
                            <button class="btn btn-primary float-right">Kirim</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            setTimeout(function () {
                var alertElement = document.getElementById('otpInvalid');
                alertElement.style.transition = 'opacity 0.5s';
                alertElement.style.opacity = '0';

                setTimeout(function () {
                    alertElement.style.display = 'none';
                }, 500); // 0.5 detik setelah transisi selesai
            }, 3000); // 3 detik setelah halaman dimuat
        });
    </script>
    <script src="<?= base_url() ?>assets/js/app.js"></script>
    <script src="<?= base_url() ?>assets/js/main.js"></script>
</body>

</html>
