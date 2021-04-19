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
            <form role="form" method="post" action="<?php echo base_url() . 'kepribadian/kepribadian_tambah_save'; ?>">
                <div class="box-body">
                    <!-- kolom1 -->
                    <div class="col-md-6">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Tahun Usulan</label>
                                <input type="text" value="<?= $thusulan['tahun']; ?>" name="thusulan" class="form-control" id="exampleInputPassword1" readonly>
                                <input type="hidden" value="<?= $thusulan['id_usulan']; ?>" name="id_usulan" class="form-control" id="exampleInputPassword1" readonly>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Nama Beasiswa</label>
                                <!-- <input type="text" value="<?= $thusulan['nama_beasiswa']; ?>" name="nama_beasiswa" class="form-control" id="exampleInputPassword1" readonly> -->
                                <!-- <input type="hidden" value="<?= $thusulan['id_beasiswa']; ?>" name="nama_beasiswa" class="form-control" id="exampleInputPassword1" readonly> -->
                                <select class="form-control" tabindex="-1" aria-hidden="true" name="nama_beasiswa">
                                    <?php foreach ($thus as $th) { ?>
                                        <option value="<?php echo $th['id_beasiswa']; ?>"><?php echo $th['nama_beasiswa']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">NIM</label>
                                <input type="text" name="nim" class="form-control" id="exampleInputPassword1" placeholder="NIM">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Nilai Kepribadian</label>
                                <input type="text" name="nilai_pribadi" class="form-control" id="exampleInputPassword1" placeholder="Nilai kepribadian">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Nilai IPK</label>
                                <input type="text" name="ipk" class="form-control" id="exampleInputPassword1" placeholder="Nilai ipk">
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