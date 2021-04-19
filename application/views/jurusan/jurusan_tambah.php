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
            <form role="form" method="post" action="<?php echo base_url() . 'jurusan/jurusan_tambah'; ?>">
                <div class="box-body">
                    <!-- kolom1 -->
                    <div class="col-md-6">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Fakultas</label>
                                <select class="form-control" tabindex="-1" aria-hidden="true" name="id_fakultas">
                                    <?php foreach ($fak as $f) { ?>
                                        <option value="<?php echo $f['id_fakultas']; ?>"><?php echo $f['nama_fakultas']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Nama Jurusan</label>
                                <input type="text" name="nama_jurusan" class="form-control" id="exampleInputPassword1" placeholder="Nama fakultas">
                                <small class="form-text text-danger"><?= form_error('nama_jurusan'); ?></small>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Deskripsi Singkat</label>
                                <textarea name="ket_jur" class="form-control" rows="3" placeholder="Deskripsi singkat"></textarea>
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