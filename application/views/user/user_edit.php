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
            <form role="form" method="post" action="<?php echo base_url() . 'user/user_edit/' . $user['id_user']; ?>">
                <div class="box-body">
                    <!-- kolom1 -->
                    <div class="col-md-6">
                        <div class="box-body">
                            <input type="hidden" name="id_user" id="id_user" value="<?= $user['id_user']; ?>">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Email</label>
                                <input type="text" value="<?= $user['email']; ?>" name="email" class="form-control" id="exampleInputPassword1" placeholder="email">
                                <small class="form-text text-danger"><?= form_error('email'); ?></small>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Nama Lengkap</label>
                                <input type="text" value="<?= $user['nama']; ?>" name="nama" class="form-control" id="exampleInputPassword1" placeholder="nama lengkap">
                                <small class="form-text text-danger"><?= form_error('nama'); ?></small>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Jenis Kelamin</label>
                                <br>
                                <input type="radio" id="Perempuan" name="jk_user" value="Perempuan" <?php if ($user['jk_user'] == 'Perempuan') echo 'checked' ?> required>
                                <label>Perempuan</label>
                                <tr><input type="radio" id="Laki-Laki" name="jk_user" value="Laki-Laki" <?php if ($user['jk_user'] == 'Laki-Laki') echo 'checked' ?> required>
                                    <label>Laki-laki</label>
                                </tr>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <!-- value="<?= $user['pass']; ?>" -->
                                <input type="password" value="<?= $user['pass']; ?>" name=" pass" class="form-control" id="exampleInputPassword1" placeholder="password">
                                <small class="form-text text-danger"><?= form_error('pass'); ?></small>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tipe User</label>
                                <select class="form-control" tabindex="-1" aria-hidden="true" name="tipe">
                                    <option value="<?= $user['tipe']; ?>"><?= $user['tipe']; ?></option>
                                    <option value="admin">admin</option>
                                    <option value="user">user</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Status</label>
                                <select class="form-control" tabindex="-1" aria-hidden="true" name="status">
                                    <option value="<?= $user['status']; ?>"><?= $user['status']; ?></option>
                                    <option value="Aktif">Aktif</option>
                                    <option value="Tidak Aktif">Tidak Aktif</option>
                                </select>
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