<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap.css">

    <link rel="stylesheet" href="<?= base_url() ?>assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/app.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/fonts/fontawesome-6.5.1/css/fontawesome.css">

    <!--    <link rel="shortcut icon" href="--><!--assets/images/favicon.svg" type="image/x-icon') ?>">-->
    <script src="<?= base_url('assets/fonts/fontawesome-6.5.1/js/all.js') ?>"></script>
    <script src="<?= base_url('assets/js/vendors.js') ?>"></script>
<!--    <script src="--><?php //= base_url(); ?><!--ckeditor5-classic/ckeditor.js"></script>-->
    <script src="<?= base_url('tinymce/js/tinymce/tinymce.js'); ?>" referrerpolicy="origin"></script>
    <script src="<?= base_url(); ?>js/jquery-3.7.1.min.js"></script>
    <link href="<?= base_url('assets/vendors/DataTables/datatables.min.css'); ?>" rel="stylesheet">
    <script>
    // Cek apakah jQuery telah terhubung
        if (window.jQuery) {
            console.log("jQuery terhubung!");
        } else {
            console.log("jQuery belum terhubung atau terdapat masalah.");
        }
    </script>
    <style>
        body, h1, h2, h3, h4, h5, h6, p, button{
            color: black !important;
        }
        .card-surat {
            width: 21cm;
            height: 29.7cm;
            border: 1px solid #000;
        }
        .surat-content{
            margin-top: 0.3cm;
            margin-left: 3cm;
            margin-right: 2cm;
            margin-bottom: 2cm;
        }
    </style>

</head>
<body>
<div id="app">
    <div id="sidebar" class='active'>
        <div class="sidebar-wrapper active">
            <!-- <div class="sidebar-header">
                <img src="" alt="" srcset="">
            </div> -->
            <!-- layout sidebar  -->
            <div class="sidebar-menu">
                <ul class="menu">
                    <li class='sidebar-title'>Menu Utama</li>
                    <?php if(session()->get('role') == 'admin'): ?>
                        <li class="sidebar-item">
                            <a href="<?= base_url('/dashboard'); ?>" class='sidebar-link'>
                                <i class="fas fa-tachometer-alt" style="font-size: 20px;"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="sidebar-item  has-sub">
                            <a class='sidebar-link'>
                                <i class="fa-regular fa-user" style="font-size: 20px;"></i>
                                <span>Kelola Pengguna</span>
                            </a>
                            <ul class="submenu">
                                <li>
                                    <a href="<?= base_url('/user'); ?>">Daftar Pengguna</a>
                                </li>
                                <li>
                                    <a href="<?= base_url('/user/tambah'); ?>">Tambah Pengguna</a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-item  has-sub">
                            <a class='sidebar-link'>
                                <i class="fa-solid fa-users" style="font-size: 20px;"></i>
                                <span>Kelola Data Penduduk</span>
                            </a>

                            <ul class="submenu ">
                                <li>
                                    <a href="<?= base_url('penduduk'); ?>">Data Penduduk</a>
                                </li>
                                <li>
                                    <a href="<?= base_url('penduduk/tambah'); ?>">Tambah Penduduk</a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-item  has-sub">
                            <a class='sidebar-link'>
                                <i class="fa-regular fa-file" style="font-size: 20px;"></i>
                                <span>Kelola Surat</span>
                            </a>
                            <ul class="submenu ">
                                <li>
                                    <a href="<?= base_url('surat') ?>">Daftar Surat</a>
                                </li>
                                <li>
                                    <a href="<?= base_url('surat/create'); ?>">Buat Surat</a>
                                </li>
                                <li>
                                    <a href="<?= base_url('surat/surat-masuk')?>">Permohonan</a>
                                </li>
                            </ul>
                        </li>

                        <!-- <li class='sidebar-title'>Forms &amp; Tables</li> -->

                        <li class="sidebar-item  has-sub">
                            <a class='sidebar-link'>
                                <i class="fa-solid fa-location-dot" style="font-size: 20px;"></i>
                                <span>Kelola Data Wilayah</span>
                            </a>
                            <ul class="submenu ">
                                <li>
                                    <a href="<?= base_url('kecamatan'); ?>">Kelola Kecamatan</a>
                                </li>
                                <li>
                                    <a href="<?= base_url('kecamatan/tambah'); ?>">Tambah Kecamatan</a>
                                </li>
                                <li>
                                    <a href="<?= base_url('desa'); ?>">Kelola Desa</a>
                                </li>
                                <li>
                                    <a href="<?= base_url('desa/tambah'); ?>">Tambah Desa</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="<?= base_url('/logout'); ?>" class='sidebar-link'>
                                <i class="fas fa-sign-out-alt" style="font-size: 20px;"></i>
                                <span>Logout</span>
                            </a>
                        </li>
                    <?php elseif(session()->get('role') == 'admin-desa'): ?>
                        <li class="sidebar-item">
                            <a href="<?= base_url('dashboard'); ?>" class='sidebar-link'>
                                <i class="fas fa-tachometer-alt" style="font-size: 20px;"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="sidebar-item  has-sub">
                            <a class='sidebar-link'>
                                <i class="fa-solid fa-users" style="font-size: 20px;"></i>
                                <span>Kelola Data Penduduk</span>
                            </a>
                            <ul class="submenu ">
                                <li>
                                    <a href="<?= base_url('penduduk'); ?>">Data Penduduk</a>
                                </li>
                                <li>
                                    <a href="<?= base_url('penduduk/tambah'); ?>">Tambah Penduduk</a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-item  has-sub">
                            <a class='sidebar-link'>
                                <i class="fa-regular fa-file" style="font-size: 20px;"></i>
                                <span>Kelola Surat</span>
                            </a>
                            <ul class="submenu ">
                                <li>
                                    <a href="<?= base_url('surat') ?>">Daftar Surat</a>
                                </li>
                                <li>
                                    <a href="<?= base_url('surat/create'); ?>">Buat Surat</a>
                                </li>
                                <li>
                                    <a href="<?= base_url('surat/surat-masuk')?>">Surat Masuk</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="<?= base_url('/logout'); ?>" class='sidebar-link'>
                                <i class="fas fa-sign-out-alt" style="font-size: 20px;"></i>
                                <span>Logout</span>
                            </a>
                        </li>

                    <?php endif; ?>
                </ul>
            </div>
            <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
        </div>
    </div>
    <div id="main">
        <nav class="navbar navbar-header navbar-expand navbar-light">
            <a class="sidebar-toggler" href="#"><span class="navbar-toggler-icon"></span></a>
            <button class="btn navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav d-flex align-items-center navbar-light ml-auto">
                    <li class="dropdown nav-icon">
                        <a href="#" data-toggle="dropdown" class="nav-link  dropdown-toggle nav-link-lg nav-link-user">
                            <div class="d-lg-inline-block">
<!--                                <i class="fa-solid fa-bell"></i>-->
                            </div>
                        </a>
                        <!-- notifications-menu  -->
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-large">
                            <h6 class='py-2 px-4'>Notifikasi</h6>
                            <ul class="list-group rounded-none">
                                <li class="list-group-item border-0 align-items-start">
                                    <div class="avatar bg-success mr-3">
                                        <span class="avatar-content"></span>
                                    </div>
                                    <div>
                                        <h6 class='text-bold'>Surat Keterangan Tidak Mampu</h6>
                                    </div>
                                </li>   
                                <li class="list-group-item border-0 align-items-start">
                                    <div class="avatar bg-success mr-3">
                                        <span class="avatar-content"></span>
                                    </div>
                                    <div>
                                        <h6 class='text-bold'>Surat Keterangan Tidak Mampu</h6>
                                    </div>
                                </li>         
                                <li class="list-group-item border-0 align-items-start">
                                    <div class="avatar bg-success mr-3">
                                        <span class="avatar-content"><i class="fas fa-mail-forwardS"></i></span>
                                    </div>
                                    <div>
                                        <h6 class='text-bold'>Surat Keterangan Tidak Mampu</h6>
                                    </div>
                                </li>                                              
                            </ul>
                        </div>
                        <!-- end-notification-menu  -->
                    </li>
                    <li class="dropdown">
                        <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <div class="avatar mr-1">
<!--                                <img src="--><?php //= base_url(); ?><!--assets/images/profile/profile-test.jpeg" alt="user">-->
                                <i class="fa-solid fa-user"></i>
                            </div>

                            <div class="d-none d-md-block d-lg-inline-block"><?= ucwords(session()->get('username'));?></div>
                        </a>
<!--                        <div class="dropdown-menu dropdown-menu-right">-->
<!--                            <a class="dropdown-item" href="--><?php //= base_url(); ?><!--profil"><i data-feather="user"></i>Profile</a>-->
<!--                            <a class="dropdown-item" href="--><?php //= base_url(); ?><!--setting"><i data-feather="settings"></i>Account</a>-->
<!--                            <div class="dropdown-divider"></div>-->
<!--                            <a class="dropdown-item" href="--><?php //= base_url(); ?><!--logout"><i data-feather="log-out"></i> Logout</a>-->
<!--                        </div>-->
                    </li>
                </ul>
            </div>
        </nav>

        <?= $this->renderSection('main-content') ?>

        <?= $this->include('layouts/footer') ?>
    </div>
</div>

<!-- javascript -->
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
    $(document).ready(function () {
        $('#tableKecamatan').DataTable();
        $('#tableDesa').DataTable();
        $('#tablePengguna').DataTable();

        $('#tablePenduduk').DataTable({
            "scrollX": true,
            "columnDefs": [{
                "targets": 'no-sort',
                "orderable": false,
            }],
        });
    });
</script>
<script src="<?= base_url(); ?>assets/js/app.js"></script>
<script src="<?= base_url(); ?>assets/js/pages/dashboard.js"></script>
<script src="<?= base_url(); ?>assets/js/main.js"></script>
<script src="<?= base_url(); ?>assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="<?= base_url('assets/vendors/DataTables/datatables.min.js'); ?>"></script>

</body>
</html>