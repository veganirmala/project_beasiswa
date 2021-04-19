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
            <form role="form" method="post" action="<?php echo base_url() . 'tahunusulan/usulan_edit/' . $thusulan['id_usulan']; ?>">
                <div class="box-body">
                    <!-- kolom1 -->
                    <div class="col-md-6">
                        <div class="box-body">
                            <input type="hidden" name="id_usulan" id="id_usulan" value="<?= $thusulan['id_usulan']; ?>">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Tahun Usulan</label>
                                <input type="text" name="tahun" class="form-control" value="<?= $thusulan['tahun']; ?>" id="exampleInputPassword1">
                            </div>
                            <div class="form-group">
                                <label>Nama Beasiswa</label>
                                <select class="form-control" name="id_beasiswa">
                                    <option value="<?= $thusulan['id_beasiswa']; ?>"><?= $thusulan['nama_beasiswa']; ?></option>
                                    <?php foreach ($nama_beasiswa as $nm) { ?>
                                        <option value="<?= $nm['id_beasiswa']; ?>"><?= $nm['nama_beasiswa']; ?></option>

                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Status</label>
                                <select class="form-control" tabindex="-1" aria-hidden="true" name="status">
                                    <option value="<?= $thusulan['status_usulan']; ?>"><?= $thusulan['status_usulan']; ?></option>
                                    <option value="Aktif">Aktif</option>
                                    <option value="Tidak Aktif">Tidak Aktif</option>
                                </select>
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