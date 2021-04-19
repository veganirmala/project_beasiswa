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
                                        <a href="<?= base_url() . 'master/prestasi_edit/' . $pb['id_prestasi']; ?>"><button type="button" class="btn btn-round btn-primary btn-sm float-right">Edit Data</button></a>
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
                    <a href="<?= base_url() . 'master/prestasi_tambah/'; ?>"><button type="button" class="btn btn-round btn-success btn-sm">Tambah Data</button></a>
                </div>
            </div>
            <!-- /.box-footer-->
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->