<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            SI Beasiswa
            <small>selamat datang admin</small>
        </h1>

    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title"><?= $title; ?></h3>
            </div>
            <form role="form" method="post" action="<?php echo base_url() . 'user/user_view/' . $user['id_user']; ?>">
                <div class="box-body">
                    <!-- kolom1 -->
                    <div class="col-md-6">
                        <div class="box-body">
                            <input type="hidden" name="id_user" id="id_user" value="<?= $user['id_user']; ?>">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Email : </label> <?= $user['email']; ?>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Nama Lengkap : </label> <?= $user['nama']; ?>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Jenis Kelamin : </label> <?= $user['jk_user']; ?>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password : </label> <?= $user['pass']; ?>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tipe User : </label> <?= $user['tipe']; ?>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Status : </label> <?= $user['status']; ?>
                            </div>

                        </div>
                    </div>

                    <!-- akhir kolom1 -->
                    <!-- kolom2 -->

                    <!-- akhir kolom2 -->

                    <!-- /.box-body -->

                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="button" onClick="history.go(-1)" class="btn btn-round btn-info">Kembali</button>
                </div>
            </form>

            <!-- /.box-footer-->
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->