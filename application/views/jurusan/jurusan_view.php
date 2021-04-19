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
            <form role="form" method="post" action="<?php echo base_url() . 'jurusan/jurusan_view/' . $jurusan['id_jurusan']; ?>">
                <div class="box-body">
                    <!-- kolom1 -->
                    <div class="col-md-6">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Fakultas : </label> <?= $jurusan['nama_fakultas']; ?>
                                <input type="hidden" value="<?= $jurusan['id_jurusan']; ?>" name="id_jurusan" class="form-control" id="exampleInputPassword1" placeholder="Nama fakultas">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Nama Jurusan : </label> <?= $jurusan['nama_jurusan']; ?>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Deskripsi Singkat : </label> <?= $jurusan['ket_jur']; ?>
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