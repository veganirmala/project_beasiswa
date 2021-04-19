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
                <h3 class="box-title">Edit Data Prestasi</h3>
            </div>
            <form role="form" method="post" action="<?php echo base_url() . 'prestasi/prestasi_edit_save'; ?>">
                <div class="box-body">
                    <!-- kolom1 -->
                    <div class="col-md-6">
                        <div class="box-body">
                            <input type="hidden" name="nim" id="nim" value="<?= $prestasi['nim']; ?>">
                            <div class="form-group">
                                <label for="exampleInputPassword1">NIM</label>
                                <input type="text" value="<?= $prestasi['nim']; ?>" name="nim" class="form-control" id="exampleInputPassword1" readonly>
                                <input type="hidden" value="<?= $prestasi['id_prestasi']; ?>" name="id_prestasi" class="form-control" id="exampleInputPassword1" readonly>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Nilai Prestasi</label>
                                <input type="text" value="<?= $prestasi['nilai_prestasi']; ?>" name="nilai" class="form-control" id="exampleInputPassword1">
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