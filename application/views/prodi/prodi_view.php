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
            <form role="form" method="post" action="<?php echo base_url() . 'prodi/prodi_edit/' . $prodi['id_prodi']; ?>">
                <div class="box-body">
                    <!-- kolom1 -->
                    <div class="col-md-6">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Jurusan : </label> <?php echo $prodi['nama_jurusan']; ?>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Nama Program Studi : </label> <?php echo $prodi['nama_prodi']; ?>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Jenjang : </label> <?php echo $prodi['jenjang']; ?>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Deskripsi Singkat : </label> <?php echo $prodi['ket_prodi']; ?>
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