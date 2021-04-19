<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?= $title; ?></title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/staradmin/star/vendors/iconfonts/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/staradmin/star/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/staradmin/star/vendors/css/vendor.bundle.addons.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/staradmin/star/css/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="<?= base_url(); ?>assets/staradmin/star/images/favicon.png" />
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper auth-page">
            <div class="content-wrapper d-flex align-items-center auth auth-bg-1 theme-one">
                <div class="row w-100">
                    <div class="col-lg-4 mx-auto">
                        <div class="auto-form-wrapper">
                            <?= $this->session->flashdata('message'); ?>
                            <form action="<?php echo base_url() . 'log_in/forgotpassword'; ?>" method="post">
                                <div class="form-group">
                                    <label class="label">Masukkan email</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Email" name="email" value="<?= set_value('email'); ?>" />
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="mdi mdi-check-circle-outline"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>

                                <div class="form-group">
                                    <button class="btn btn-primary submit-btn btn-block">Kirim Email</button>
                                </div>
                                <div class="form-group d-flex justify-content-between">

                                    <a href="<?= base_url('log_in'); ?>" class="text-small forgot-password text-black">Halaman login</a>
                                </div>
                            </form>
                        </div>
                        <ul class="auth-footer">
                            <li>
                                <a href="https://setemen.id">copyright © 2017-2019 K.Setemen. All rights reserved.</a>
                            </li>
                        </ul>
                        <p class="footer-text text-center">Template © 2018 Bootstrapdash. All rights reserved.</p>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="<?= base_url(); ?>assets/staradmin/star/vendors/js/vendor.bundle.base.js"></script>
    <script src="<?= base_url(); ?>assets/staradmin/star/vendors/js/vendor.bundle.addons.js"></script>
    <!-- endinject -->
    <!-- inject:js -->
    <script src="<?= base_url(); ?>assets/staradmin/star/js/off-canvas.js"></script>
    <script src="<?= base_url(); ?>assets/staradmin/star/js/misc.js"></script>
    <!-- endinject -->
</body>

</html>