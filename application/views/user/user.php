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
            <div class="box-body">

                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Username (Email)</th>
                            <th>Nama Lengkap</th>
                            <th>Jenis Kelamin</th>
                            <!-- <th>Password</th> -->
                            <th>Tipe User</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($user as $u) { ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $u['email']; ?></td>
                                <td><?= $u['nama']; ?></td>
                                <td><?= $u['jk_user']; ?></td>
                                <!-- <td><?= $u['pass']; ?></td> -->
                                <td><?= $u['tipe']; ?></td>
                                <td><?= $u['status']; ?></td>
                                <td>
                                    <div class="btn-group">
                                        <a href="<?= base_url() . 'user/user_edit/' . $u['id_user'] ?>"><button type="button" class="btn btn-round btn-primary btn-sm" title="Edit Data"><i class="glyphicon glyphicon-edit"></i></button></a>
                                        <a href="<?= base_url() . 'user/user_view/' . $u['id_user'] ?>"><button type="button" class="btn btn-round btn-info btn-sm" title="Detail Data"><i class="glyphicon glyphicon-share"></i></button></a>
                                        <a href="<?= base_url() . 'user/user_delete/' . $u['id_user'] ?>"><button type="button" class="btn btn-round btn-danger btn-sm" title="Delete Data" onclick="return confirm('Apakah anda akan menghapus data ini?');"><i class="glyphicon glyphicon-trash"></i></button></a>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                </table>

            </div>
            <!-- /.box -->
            <!-- akhir tabel ->
        </div>
        <!-- /.box-body -->
            <div class="box-footer">
                <div class="btn-group">
                    <a href="<?= base_url() . 'user/user_tambah/'; ?>"><button type="button" class="btn btn-round btn-success btn-sm" title="Tambah Data"><i class="glyphicon glyphicon-plus"></i> Tambah Data</button></a>
                </div>
            </div>
            <!-- /.box-footer-->
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->