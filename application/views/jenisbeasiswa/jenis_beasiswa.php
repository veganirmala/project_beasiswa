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
                <!-- tabel ->
		  <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Table With Full Features</h3>
            </div>
            <!-- /.box-header -->

                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Jenis Beasiswa</th>
                            <th>Keterangan Beasiswa</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($jenis as $pb) { ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $pb['nama_beasiswa']; ?></td>
                                <td><?= $pb['ket_beasiswa']; ?></td>
                                <td><?= $pb['status_beasiswa']; ?></td>
                                <td>
                                    <div class="btn-group">
                                        <!-- <a href="<?= base_url() . 'jenisbeasiswa/jenis_beasiswa_edit/' . $pb['id_beasiswa'] . '/Aktif'; ?>"><button type="button" class="btn btn-round btn-primary btn-sm float-right">Aktif</button></a>
                                        <a href="<?= base_url() . 'jenisbeasiswa/jenis_beasiswa_edit/' . $pb['id_beasiswa'] . '/Tidak'; ?>"><button type="button" class="btn btn-round btn-primary btn-sm float-right">Tidak Aktif</button></a> -->
                                        <a href="<?= base_url() . 'jenisbeasiswa/jenis_beasiswa_edit/' . $pb['id_beasiswa'] ?>"><button type="button" class="btn btn-round btn-primary btn-sm" title="Edit Data"><i class="glyphicon glyphicon-edit"></i></button></a>
                                        <a href="<?= base_url() . 'jenisbeasiswa/jenis_beasiswa_view/' . $pb['id_beasiswa'] ?>"><button type="button" class="btn btn-round btn-info btn-sm" title="Detail Data"><i class="glyphicon glyphicon-share"></i></button></a>
                                        <a href="<?= base_url() . 'jenisbeasiswa/jenis_beasiswa_delete/' . $pb['id_beasiswa'] ?>"><button type="button" class="btn btn-round btn-danger btn-sm" title="Delete Data" onclick="return confirm('Apakah anda akan menghapus data ini?');"><i class="glyphicon glyphicon-trash"></i></button></a>
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
                    <a href="<?= base_url() . 'jenisbeasiswa/jenis_beasiswa_tambah/'; ?>"><button type="button" class="btn btn-round btn-success btn-sm" title="Tambah Data"><i class="glyphicon glyphicon-plus"></i> Tambah Data</button></a>
                </div>
            </div>
            <!-- /.box-footer-->
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->