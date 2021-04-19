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

            <form role="form" method="post" action="<?php echo base_url() . 'prestasibidang/bidang_view'; ?>">
                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Bidang : </label> <?= $bidang['nama_bidang']; ?>
                        <input type="hidden" value="<?= $bidang['id_bidang']; ?>" name="id_bidang" class="form-control" id="exampleInputEmail1">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tingkat : </label> <?= $bidang['tingkat']; ?>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Juara : </label> <?= $bidang['juara']; ?>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Skor : </label> <?= $bidang['skor']; ?>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Status : </label> <?= $bidang['status']; ?>
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