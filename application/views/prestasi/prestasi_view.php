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
                <h3 class="box-title">Detail Data Prestasi</h3>
            </div>
            <form role="form" method="post" action="<?php echo base_url() . 'prestasi/prestasi_view' . $prestasi['id_prestasi']; ?>">
                <div class="box-body">
                    <!-- kolom1 -->
                    <div class="col-md-6">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Tahun Usulan : </label> <?= $prestasi['tahun']; ?>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Nama Beasiswa : </label> <?= $prestasi['nama_beasiswa']; ?>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">NIM : </label> <?= $prestasi['nim']; ?>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Nilai Prestasi : </label> <?= $prestasi['nilai_prestasi']; ?>
                            </div>
                        </div>
                    </div>

                    <!-- akhir kolom1 -->

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