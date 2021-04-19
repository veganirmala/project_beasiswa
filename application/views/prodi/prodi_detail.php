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
                            <th>Nama Fakultas</th>
                            <th>Nama Jurusan</th>
                            <th>Nama Program Studi</th>
                            <th>Detail Program Studi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($progstudi as $prod) { ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $prod['nama_fakultas']; ?></td>
                                <td><?= $prod['nama_jurusan']; ?></td>
                                <td><?= $prod['nama_prodi']; ?></td>
                                <td><?= $prod['ket_prodi']; ?></td>
                            </tr>
                        <?php } ?>
                </table>

            </div>
            <!-- /.box -->
            <!-- akhir tabel ->
        </div>
        <!-- /.box-body -->
            <div class="box-footer">
                <?php if ($id_fak) { ?>

                    <div class="btn-group">

                        <button type="button" onClick="history.go(-1)" class="btn btn-round btn-info btn-sm">Kembali</button>

                    </div>
                <?php } ?>
            </div>
            <!-- /.box-footer-->
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->