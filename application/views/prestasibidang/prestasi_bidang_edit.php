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

            <form role="form" method="post" action="<?php echo base_url() . 'prestasibidang/bidang_edit_save'; ?>">
                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Bidang</label>
                        <input type="hidden" value="<?= $bidang['id_bidang']; ?>" name="id_bidang" class="form-control" id="exampleInputEmail1">
                        <input type="text" value="<?= $bidang['nama_bidang']; ?>" name="nama_bidang" class="form-control" id="exampleInputEmail1">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tingkat</label>
                        <select class="form-control" style="width: 100%;" tabindex="-1" aria-hidden="true" name="tingkat">
                            <option value="<?= $bidang['tingkat']; ?>"><?= $bidang['tingkat']; ?></option>
                            <?php foreach ($tingkat as $tk) { ?>
                                <option value="<?php echo $tk; ?>"><?php echo $tk; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Juara</label>
                        <input type="text" value="<?= $bidang['juara']; ?>" name="juara" class="form-control" id="exampleInputPassword1" placeholder="Juara">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Skor</label>
                        <input type="text" value="<?= $bidang['skor']; ?>" name="skor" class="form-control" id="exampleInputPassword1" placeholder="Skor">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Status</label>
                        <select class="form-control" style="width: 100%;" tabindex="-1" aria-hidden="true" name="status">
                            <option value="<?= $bidang['status']; ?>"><?= $bidang['status']; ?></option>
                            <?php foreach ($status as $st) { ?>
                                <option value="<?php echo $st; ?>"><?php echo $st; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <!-- /.box-body -->

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