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
                <h3 class="box-title">Data Prestasi</h3>
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
                            <th>Tahun Usulan</th>
                            <th>NIM</th>
                            <th>Nama Mahasiswa</th>
                            <th>Nilai Prestasi</th>
                            <th>Nama Beasiswa</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($prestasi as $pb) { ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $pb['tahun']; ?></td>
                                <td><?= $pb['nim']; ?></td>
                                <td><?= $pb['nama']; ?></td>
                                <td><?= $pb['nilai_prestasi']; ?></td>
                                <td><?= $pb['nama_beasiswa']; ?></td>
                                <td>
                                    <div class="btn-group">
                                        <a href="<?= base_url() . 'prestasi/prestasi_edit/' . $pb['id_prestasi']; ?>"><button type="button" class="btn btn-round btn-primary btn-sm" title="Edit Data"><i class="glyphicon glyphicon-edit"></i></button></a>
                                        <a href="<?= base_url() . 'prestasi/prestasi_view/' . $pb['id_prestasi']; ?>"><button type="button" class="btn btn-round btn-info btn-sm" title="Detail Data"><i class="glyphicon glyphicon-share"></i></button></a>
                                        <a href="<?= base_url() . 'prestasi/prestasi_delete/' . $pb['id_prestasi']; ?>"><button type="button" class="btn btn-round btn-danger btn-sm" title="Delete Data" onclick="return confirm('Apakah anda akan menghapus data ini?');"><i class="glyphicon glyphicon-trash"></i></button></a>
                                        <!-- <a href="<?= base_url() . 'prestasi/prestasi_edit/' . $pb['id_prestasi']; ?>"><button type="button" class="btn btn-round btn-primary btn-sm float-right">Edit Data</button></a> -->
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
                    <a href="<?= base_url() . 'prestasi/prestasi_tambah/'; ?>"><button type="button" class="btn btn-round btn-success btn-sm">Tambah Data</button></a>
                </div>
            </div>
            <!-- /.box-footer-->
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->