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
            <form role="form" method="post" action="<?php echo base_url() . 'mahasiswa/mahasiswa_edit_save'; ?>">
                <div class="box-body">
                    <!-- kolom1 -->
                    <div class="col-md-6">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputPassword1">NIM</label> : <?= $mhs['nim']; ?>
                                <!-- <input type="text" value="<?= $mhs['nim']; ?>" name="nim" class="form-control" id="exampleInputPassword1" readonly> -->
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Nama Mahasiswa</label> : <?= $mhs['nama']; ?>
                                <!-- <input type="text" value="<?= $mhs['nama']; ?>" name="nama" class="form-control" id="exampleInputPassword1" readonly> -->
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Jenis Kelamin</label> : <?= $mhs['jk']; ?>
                                <!-- <input type="text" value="<?= $mhs['jk']; ?>" name="jk" class="form-control" id="exampleInputPassword1" readonly> -->
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">No HP Aktif</label> : <?= $mhs['no_hp']; ?>
                                <!-- <input type="text" value="<?= $mhs['no_hp']; ?>" name="no_hp" class="form-control" id="exampleInputPassword1" readonly> -->
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Alamat</label> : <?= $mhs['alamat']; ?>
                                <!-- <input type="text" value="<?= $mhs['alamat']; ?>" name="alamat" class="form-control" id="exampleInputPassword1" readonly> -->
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Program Studi</label> : <?= $nm_prodi['nama_prodi']; ?>
                                <!-- <input type="text" value="<?= $nm_prodi['nama_prodi']; ?>" name="nama_prodi" class="form-control" id="exampleInputPassword1" readonly> -->
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Semester</label> : <?= $mhs['smt']; ?>
                                <!-- <input type="text" value="<?= $mhs['smt']; ?>" name="smt" class="form-control" id="exampleInputPassword1" readonly> -->
                            </div>
                        </div>
                    </div>

                    <!-- akhir kolom1 -->
                    <!-- kolom2 -->
                    <div class="col-md-6">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Nama Orangtua</label> : <?= $mhs['ortu_nama']; ?>
                                <!-- <input type="text" value="<?= $mhs['ortu_nama']; ?>" name="ortu_nama" class="form-control" id="exampleInputPassword1" readonly> -->
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Pekerjaan Orangtua</label> : <?= $mhs['ortu_pekerjaan']; ?>
                                <!-- <input type="text" value="<?= $mhs['ortu_pekerjaan']; ?>" name="ortu_pekerjaan" class="form-control" id="exampleInputPassword1" readonly> -->
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Penghasilan Orangtua</label> : <?= $mhs['ortu_penghasilan']; ?>
                                <!-- <input type="text" value="<?= $mhs['ortu_penghasilan']; ?>" name="ortu_penghasilan" class="form-control" id="exampleInputPassword1" readonly> -->
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Jumlah Tanggungan Orangtua</label> : <?= $mhs['ortu_tanggungan']; ?>
                                <!-- <input type="text" value="<?= $mhs['ortu_tanggungan']; ?>" name="ortu_tanggungan" class="form-control" id="exampleInputPassword1" readonly> -->
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">No HP Orangtua</label> : <?= $mhs['ortu_nohp']; ?>
                                <!-- <input type="text" value="<?= $mhs['ortu_nohp']; ?>" name="ortu_nohp" class="form-control" id="exampleInputPassword1" readonly> -->
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Nama Bank</label> : <?= $mhs['bank_nama']; ?>
                                <!-- <input type="text" value="<?= $mhs['bank_nama']; ?>" name="bank_nama" class="form-control" id="exampleInputPassword1" readonly> -->
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Nomor Rekening</label> : <?= $mhs['bank_norek']; ?>
                                <!-- <input type="text" value="<?= $mhs['bank_norek']; ?>" name="bank_norek" class="form-control" id="exampleInputPassword1" readonly> -->
                            </div>
                        </div>
                    </div>
                    <!-- akhir kolom2 -->

                    <!-- /.box-body -->

                </div>
                <div class="box-footer">
                    <a href="<?= base_url() . 'mahasiswa/mahasiswa_edit/' . $mhs['nim']; ?>"><button type="button" class="btn btn-round btn-primary ">Edit Data</button></a>
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