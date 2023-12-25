<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password - Voler Admin Dashboard</title>
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
                    <form action="">
                        <div class="form-group">
                            <label for="first-name-column">Masukkan Kode OTP</label>
                            <input type="email" id="first-name-column" class="form-control" name="opt_code" placeholder="XXXXXX">
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
    <script src="assets/js/feather-icons/feather.min.js"></script>
    <script src="assets/js/app.js"></script>
    
    <script src="assets/js/main.js"></script>
</body>

</html>
