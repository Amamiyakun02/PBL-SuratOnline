<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign in</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.css') ?>">
    <link rel="stylesheet" href="<?= base_url() ?>assets/fonts/fontawesome-6.5.1/css/fontawesome.css"">
    <!-- <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon"> -->
    <link rel="stylesheet" href="<?= base_url('assets/css/app.css') ?>">
    <script src="<?= base_url('assets/fonts/fontawesome-6.5.1/js/all.js') ?>"></script>
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
                        <h3>Reset Password</h3>
                    </div>

                    <?php if (!empty(session()->getFlashdata('error'))) : ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <?= session()->getFlashdata('error'); ?>
                        </div>
                    <?php endif; ?>

                    <?php if (session()->getFlashdata('logout')) : ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <?= session()->getFlashdata('logout'); ?>
                        </div>
                    <?php endif; ?>

                    <?php if (!empty(session()->getFlashdata('errors'))) : ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <?= session()->getFlashdata('errors'); ?>
                        </div>
                    <?php endif; ?>
                    <form id="contactForm" method="post" action="<?= base_url('/login')?>">
                    <?= csrf_field(); ?>

                        <div class="form-group position-relative has-icon-left">
                            <div class="position-relative">
                                <label for="password">Password Baru</label>
                                <input type="password" class="form-control input" id="password" name="password">
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left">
                            <div class="position-relative">
                                <label for="confirmed">Konfirmasi Password</label>
                                <input type="password" class="form-control input" id="confirmed" name="confirmed">
                            </div>
                        </div>

                        <div class="clearfix">
                            <!-- <input type="hidden" id="recaptcha_response" name="recaptcha_response" value=""> -->
                            <button type="submit" id="login" class="btn btn-primary float-right">
                           Simpan</button>
                                <!-- <button type="submit" class="btn btn-primary float-right">Login</button> -->
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

    </div>

    <script>
        const inputs = document.querySelectorAll(".input");

        function addcl() {
            let parent = this.parentNode.parentNode;
            parent.classList.add("focus");
        }

        function remcl() {
            let parent = this.parentNode.parentNode;
            if (this.value == "") {
                parent.classList.remove("focus");
            }
        }

        inputs.forEach(input => {
            input.addEventListener("focus", addcl);
            input.addEventListener("blur", remcl);
        });
    </script>
    <script src="<?= base_url() ?>assets/js/app.js"></script>
    <script src="<?= base_url() ?>assets/js/main.js"></script>
</body>

</html>
