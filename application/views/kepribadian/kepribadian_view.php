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
            <form role="form" method="post" action="<?php echo base_url() . 'kepribadian/kepribadian_view'; ?>">
                <div class="box-body">
                    <!-- kolom1 -->
                    <div class="col-md-6">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Tahun Usulan : </label> <?= $pribadi['tahun']; ?>
                                <!-- <input type="text" value="<?= $pribadi['tahun']; ?>" name="tahun" class="form-control" id="exampleInputPassword1" readonly> -->
                                <input type="hidden" value="<?= $pribadi['id_kepribadian']; ?>" name="id_kepribadian" class="form-control" id="exampleInputPassword1" readonly>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">NIM : </label> <?= $pribadi['nim']; ?>
                                <!-- <input type="text" value="<?= $pribadi['nim']; ?>" name="nim" class="form-control" id="exampleInputPassword1" readonly>
                                <input type="hidden" value="<?= $pribadi['id_kepribadian']; ?>" name="id_kepribadian" class="form-control" id="exampleInputPassword1" readonly> -->
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Nama Mahasiswa : </label> <?= $pribadi['nama']; ?>
                                <!-- <input type="text" value="<?= $pribadi['nama']; ?>" name="nama" class="form-control" id="exampleInputPassword1" readonly>
                                <input type="hidden" value="<?= $pribadi['id_kepribadian']; ?>" name="id_kepribadian" class="form-control" id="exampleInputPassword1" readonly> -->
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Nilai Kepribadian : </label> <?= $pribadi['nilai_pribadi']; ?>
                                <!-- <input type="text" value="<?= $pribadi['nilai_pribadi']; ?>" name="nilai" class="form-control" id="exampleInputPassword1"> -->
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">IPK : </label> <?= $pribadi['ipk']; ?>
                                <!-- <input type="text" value="<?= $pribadi['ipk']; ?>" name="ipk" class="form-control" id="exampleInputPassword1"> -->
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Nama Beasiswa : </label> <?= $pribadi['nama_beasiswa']; ?>
                                <!-- <input type="text" value="<?= $pribadi['namaeasiswa']; ?>" name="id_beasiswa" class="form-control" id="exampleInputPassword1"> -->
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