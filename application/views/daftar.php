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
            <div class="content-wrapper d-flex align-items-center auth register-bg-1 theme-one">
                <div class="row w-100">
                    <div class="col-lg-4 mx-auto">
                        <h2 class="text-center mb-2 mt-1">Form Pendaftaran</h2>
                        <?= $this->session->flashdata('message'); ?>
                        <div class="auto-form-wrapper">
                            <form action="<?php echo base_url() . 'log_in/daftar'; ?>" method="post">
                                <div class="form-group">
                                    <select class="form-control" name="jenis_id" id="exampleFormControlSelect2">
                                        <option value="1">Pilih Jenis Institusi</option>
                                        <?php foreach ($jenis as $j) : ?>
                                            <option value="<?= $j['id_jenisInstitusi']; ?>"><?= $j['nama']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <?= form_error('jenis_id', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <select name="institusi_id" id="exampleFormControlSelect2" class="form-control">
                                        <option value="1">Pilih Nama Institusi</option>
                                        <?php foreach ($institusi as $m) : ?>
                                            <option value="<?= $m['id_institusi']; ?>"><?= $m['nama']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select name="type_user" id="exampleFormControlSelect2" class="form-control">
                                        <option value="2">Pilih Tipe User</option>
                                        <option value="2">Siswa/Mahasiswa</option>
                                        <option value="1">Pengajar</option>

                                    </select>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Nama lengkap" name="nama" value="<?= set_value('nama'); ?>" />
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="mdi mdi-check-circle-outline"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Email" name="email" value="<?= set_value('username'); ?>" />
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="mdi mdi-check-circle-outline"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="password" class="form-control" placeholder="Password" name="password1" />
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="mdi mdi-check-circle-outline"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="password" class="form-control" placeholder="Confirm Password" name="password2" />
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="mdi mdi-check-circle-outline"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <?= form_error('password2', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary submit-btn btn-block">Daftar</button>
                                </div>
                                <div class="text-block text-center my-1">
                                    <span class="text-small font-weight-semibold">Apakah sudah punya akun ?</span>
                                    <a href="<?= base_url('log_in'); ?>" class="text-black text-small">Login</a>
                                </div>
                            </form>
                        </div>
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