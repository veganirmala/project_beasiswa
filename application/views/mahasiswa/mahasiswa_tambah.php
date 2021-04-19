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


            <form role="form" method="post" action="<?php echo base_url() . 'mahasiswa/mahasiswa_tambah'; ?>">
                <div class="box-body">
                    <!-- kolom1 -->
                    <div class="col-md-6">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputPassword1">NIM</label>
                                <input type="text" name="nim" class="form-control" id="exampleInputPassword1" placeholder="NIM">
                                <small class="form-text text-danger"><?= form_error('nim'); ?></small>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Nama Mahasiswa</label>
                                <input type="text" name="nama" class="form-control" id="exampleInputPassword1" placeholder="Nama mahasiswa">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Jenis Kelamin</label>
                                <br>
                                <input type="radio" id="perempuan" name="jk" value="Perempuan">
                                <label>Perempuan</label>
                                <tr><input type="radio" id="laki-laki" name="jk" value="Laki-Laki">
                                    <label>Laki-laki</label>
                                </tr>
                                <!-- <select class="form-control" tabindex="-1" aria-hidden="true" name="jk">
                                    <option value="0">--Jenis Kelamin--</option>
                                    <?php foreach ($jk as $jj) { ?>
                                        <option value="<?php echo $jj; ?>"><?php echo $jj; ?></option>
                                    <?php } ?>
                                </select> -->
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">No HP Aktif</label>
                                <input type="text" name="no_hp" class="form-control" id="exampleInputPassword1" placeholder="Nomor Handphone Aktif">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Alamat</label>
                                <input type="text" name="alamat" class="form-control" id="exampleInputPassword1" placeholder="Alamat">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Program Studi</label>
                                <select class="form-control" tabindex="-1" aria-hidden="true" name="prodi">
                                    <option value="0">--Program Studi--</option>
                                    <?php foreach ($id_prodi as $id_prod) { ?>
                                        <option value="<?php echo $id_prod['id_prodi']; ?>"><?php echo $id_prod['nama_prodi']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Semester</label>
                                <select class="form-control" tabindex="-1" aria-hidden="true" name="smt">
                                    <option value="0">--Semester--</option>
                                    <?php foreach ($smt as $sm) { ?>
                                        <option value="<?php echo $sm; ?>"><?php echo $sm; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- akhir kolom1 -->
                    <!-- kolom2 -->
                    <div class="col-md-6">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Nama Orangtua</label>
                                <input type="text" name="ortu_nama" class="form-control" id="exampleInputPassword1" placeholder="Nama Orangtua">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Pekerjaan Orangtua</label>
                                <input type="text" name="ortu_pekerjaan" class="form-control" id="exampleInputPassword1" placeholder="Pekerjaan Orangtua">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Penghasilan Orangtua</label>
                                <input type="text" name="ortu_penghasilan" class="form-control" id="exampleInputPassword1" placeholder="Penghasilan Orangtua">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Jumlah Tanggungan Orangtua</label>
                                <input type="text" name="ortu_tanggungan" class="form-control" id="exampleInputPassword1" placeholder="Tanggungan Orangtua">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">No HP Orangtua</label>
                                <input type="text" name="ortu_nohp" class="form-control" id="exampleInputPassword1" placeholder="Nomor Handphone Orangtua">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Nama Bank</label>
                                <input type="text" name="bank_nama" class="form-control" id="exampleInputPassword1" placeholder="Nama Bank">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Nomor Rekening</label>
                                <input type="text" name="bank_norek" class="form-control" id="exampleInputPassword1" placeholder="Nomor Rekening Bank">
                            </div>
                        </div>
                    </div>
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