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
                            <input type="hidden" name="id_prodi" id="id_prodi" value="<?= $prodi['id_prodi']; ?>">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Jurusan</label>
                                <select class="form-control" tabindex="-1" aria-hidden="true" name="id_jurusan">
                                    <option value="<?php echo $prodi['id_jurusan']; ?>"><?php echo $prodi['nama_jurusan']; ?></option>
                                    <?php foreach ($jur as $f) { ?>
                                        <option value="<?php echo $f['id_jurusan']; ?>"><?php echo $f['nama_jurusan']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Nama Program Studi</label>
                                <input type="text" value="<?php echo $prodi['nama_prodi']; ?>" name="nama_prodi" class="form-control" id="exampleInputPassword1">
                                <small class="form-text text-danger"><?= form_error('nama_prodi'); ?></small>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Jenjang</label>
                                <select class="form-control" tabindex="-1" aria-hidden="true" name="jenjang">
                                    <option value="<?php echo $prodi['jenjang']; ?>">
                                        <?php if ($prodi['jenjang'] == "S1") {
                                            echo "Sarjana";
                                        } else if ($prodi['jenjang'] == "D3") {
                                            echo "Diploma 3";
                                        } ?></option>
                                    <option value="S1">Sarjana</option>
                                    <option value="D3">Diploma 3</option>

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Deskripsi Singkat</label>
                                <textarea name="ket_prodi" class="form-control" rows="3"><?= $prodi['ket_prodi']; ?></textarea>
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