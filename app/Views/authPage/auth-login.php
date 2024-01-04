<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign in</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.css') ?>">
    <script src="https://www.google.com/recaptcha/api.js?render=6LfkXxIpAAAAAMnOWt2UGO5mkrXKmjEg34asMfg_"></script>
    <link rel="stylesheet" href="<?= base_url() ?>assets/fonts/fontawesome-6.5.1/css/fontawesome.css"">
    <!-- <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon"> -->
    <link rel="stylesheet" href="<?= base_url('assets/css/app.css') ?>">
    <script src="<?= base_url('assets/fonts/fontawesome-6.5.1/js/all.js') ?>"></script>
    <script type="text/javascript">
    function onSubmit(e) {
        e.preventDefault();
        grecaptcha.ready(function() {
             grecaptcha.execute("<?= getenv('GOOGLE_RECAPTCHAV3_SITEKEY') ?>", {action: 'submit'}).then(function(token) {
                  // Store recaptcha response
                  document.getElementById("recaptcha_response").value = token;
                  // Submit form
                  document.getElementById("contactForm").submit();
             });
        });
    }
    </script>
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
                        <h3>Login</h3>
                    </div>

                    <?php if (!empty(session()->getFlashdata('errors'))) : ?>
                        <div id="error-alert" class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                            <?= session()->getFlashdata('errors'); ?>
                        </div>
                    <?php endif; ?>

                    <?php if (session()->getFlashdata('logout')) : ?>
                        <div id="logout-alert" class="alert alert-secondary alert-dismissible fade show text-center" role="alert">
                            <?= session()->getFlashdata('logout'); ?>
                        </div>
                    <?php endif; ?>

                    <?php if (!empty(session()->getFlashdata('register'))) : ?>
                        <div id="sucess-alert" class="alert alert-success alert-dismissible fade show text-center" role="alert">
                            <?= session()->getFlashdata('register'); ?>
                        </div>
                    <?php endif; ?>
                    <form id="contactForm" method="post" action="<?= base_url('/login')?>">
                    <?= csrf_field(); ?>
                        <div class="form-group position-relative has-icon-left">
                            <label for="username">Username</label>
                            <div class="position-relative">
                                <input type="text" class="form-control input" id="username" name="username">
                                <div class="form-control-icon">
                                    <i class="fa-regular fa-user"></i>
                                </div>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left">
                            <div class="clearfix">
                                <label for="password">Password</label>
                                <a href="<?= base_url('/lupa-password'); ?>" class='float-right'>
                                    <small>lupa password?</small>
                                </a>
                            </div>
                            <div class="position-relative">
                                <input type="password" class="form-control input" id="password" name="password">
                                <div class="form-control-icon">
                                    <i class="fas fa-lock"></i>
                                </div>
                            </div>
                        </div>

                        <div class='form-check clearfix my-4'>
                        <!-- <div ></div> -->
                            <div class="float-right">
                                <a href="<?= base_url('/register') ?>">Tidak memiliki akun?</a>
                            </div>
                        </div>
                        <div class="clearfix">
<!--                            <div class="g-recaptcha" style="margin-top:10px;" data-sitekey="6LfkXxIpAAAAAMnOWt2UGO5mkrXKmjEg34asMfg_"></div>-->
                            <button type="submit" id="login" class="btn btn-primary float-right">
                           login</button>
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

        document.addEventListener('DOMContentLoaded', function () {
            setTimeout(function () {
                var alertElement = document.getElementById('logout-alert');
                alertElement.style.transition = 'opacity 0.5s';
                alertElement.style.opacity = '0';

                setTimeout(function () {
                    alertElement.style.display = 'none';
                }, 500); // 0.5 detik setelah transisi selesai
            }, 3000); // 3 detik setelah halaman dimuat
        });
        document.addEventListener('DOMContentLoaded', function () {
            setTimeout(function () {
                var alertElement = document.getElementById('error-alert');
                alertElement.style.transition = 'opacity 0.5s';
                alertElement.style.opacity = '0';

                setTimeout(function () {
                    alertElement.style.display = 'none';
                }, 500); // 0.5 detik setelah transisi selesai
            }, 3000); // 3 detik setelah halaman dimuat
        });
        document.addEventListener('DOMContentLoaded', function () {
            setTimeout(function () {
                var alertElement = document.getElementById('sucess-alert');
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
