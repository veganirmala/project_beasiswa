<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Sistem Informasi Beasiswa
            <small>selamat datang admin</small>
        </h1>

    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Data Rekap Beasiswa</h3>
            </div>
            <div class="box-body">
                <!-- tabel ->
		  <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Table With Full Features</h3>
            </div>
            <!-- /.box-header -->

                <!-- <table id="example3" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Th</th>
                            <th>Nama</th>
                            <th>Prodi</th>
                            <th>Skor IP</th>
                            <th>Skor Prestasi</th>
                            <th>Skor Ekonomi</th>
                            <th>Skor Kepribadian</th>
                            <th>Skor Total</th>
                            <th>Ket</th>
                            <th>Alasan</th>
                            <th>Status</th>
                            <th>Alasan</th>
                            <th>Kunci</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($rekap as $rk) { ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $rk['tahun']; ?></td>
                                <td><?= $rk['nama']; ?></td>
                                <td><?= $rk['nama_prodi']; ?></td>
                                <td><?= $rk['skor_ip']; ?></td>
                                <td><?= $rk['skor_prestasi']; ?></td>
                                <td><?= $rk['skor_ekonomi']; ?></td>
                                <td><?= $rk['skor_pribadi']; ?></td>
                                <td><?= $rk['skor_total']; ?></td>
                                <td>
                                    <button type="button" class="btn btn-block btn-outline-primary btn-xs"><?= $rk['ket_rekap']; ?></button>

                                    <?php
                                    if ($rk['ket_rekap'] == "Draf") { ?>
                                        <a href="<?= base_url() . 'master/rekap_ket/' . $rk['id_rekap'] . '/' . "Diusulkan"; ?>">
                                            <button type="button" class="btn btn-block btn-success btn-xs">Diusulkan</button></a>
                                        <a href="<?= base_url() . 'master/rekap_ket/' . $rk['id_rekap'] . '/' . "Tidak_Diusulkan"; ?>">
                                            <button type="button" class="btn btn-block btn-danger btn-xs">Tidak Diusulkan</button></a>
                                    <?php } else if ($rk['ket_rekap'] == "Diusulkan") { ?>
                                        <a href="<?= base_url() . 'master/rekap_ket/' . $rk['id_rekap'] . '/' . "Draf"; ?>">
                                            <button type="button" class="btn btn-block btn-warning btn-xs">Draf</button></a>
                                        <a href="<?= base_url() . 'master/rekap_ket/' . $rk['id_rekap'] . '/' . "Tidak_Diusulkan"; ?>">
                                            <button type="button" class="btn btn-block btn-danger btn-xs">Tidak Diusulkan</button></a>
                                    <?php } else if ($rk['ket_rekap'] == "Tidak Diusulkan") { ?>
                                        <a href="<?= base_url() . 'master/rekap_ket/' . $rk['id_rekap'] . '/' . "Draf"; ?>">
                                            <button type="button" class="btn btn-block btn-warning btn-xs">Draf</button>
                                        </a>
                                        <a href="<?= base_url() . 'master/rekap_ket/' . $rk['id_rekap'] . '/' . "Diusulkan"; ?>">
                                            <button type="button" class="btn btn-block btn-succes btn-xs">Diusulkan</button></a>
                                    <?php } ?>

                                </td>
                                <td><?= $rk['ket_rekap_alasan']; ?></td>
                                <td>
                                    <?php if (($rk['ket_rekap'] == "Tidak Diusulkan") or ($rk['ket_rekap'] == "Draf")) {
                                        echo "Belum ada yang diusulkan";
                                    } ?>

                                    <?php
                                    //jika ket_rekap belum diusulkan maka hanya muncul ket saja
                                    if ($rk['ket_rekap'] == "Diusulkan") {
                                        if ($rk['status'] == "Draf") { ?>
                                            <a href="<?= base_url() . 'master/rekap_status/' . $rk['id_rekap'] . '/' . "Diterima"; ?>">
                                                <button type="button" class="btn btn-block btn-success btn-xs">Diterima</button></a>
                                            <a href="<?= base_url() . 'master/rekap_status/' . $rk['id_rekap'] . '/' . "Ditolak"; ?>">
                                                <button type="button" class="btn btn-block btn-danger btn-xs">Ditolak</button></a>
                                        <?php } else if ($rk['status'] == "Diterima") { ?>
                                            <a href="<?= base_url() . 'master/rekap_status/' . $rk['id_rekap'] . '/' . "Draf"; ?>">
                                                <button type="button" class="btn btn-block btn-warning btn-xs">Draf</button></a>
                                            <a href="<?= base_url() . 'master/rekap_status/' . $rk['id_rekap'] . '/' . "Ditolak"; ?>">
                                                <button type="button" class="btn btn-block btn-danger btn-xs">Ditolak</button></a>
                                        <?php } else if ($rk['status'] == "Ditolak") { ?>
                                            <a href="<?= base_url() . 'master/rekap_status/' . $rk['id_rekap'] . '/' . "Draf"; ?>">
                                                <button type="button" class="btn btn-block btn-warning btn-xs">Draf</button>
                                            </a>
                                            <a href="<?= base_url() . 'master/rekap_status/' . $rk['id_rekap'] . '/' . "Diterima"; ?>">
                                                <button type="button" class="btn btn-block btn-succes btn-xs">Diterima</button></a>
                                        <?php
                                            //echo $rk['ket_rekap'];
                                            //die;
                                        } else if ($rk['ket_rekap'] == "Draf") {
                                            //echo $rk['ket_rekap'];
                                            //die; 
                                        ?>
                                            <button type="button" class="btn btn-block btn-outline-primary btn-xs"><?= $rk['status']; ?></button>
                                    <?php   }
                                    } ?>
                                </td>
                                <td><?= $rk['status_alasan']; ?></td>
                                <td>
                                    <?php if ($rk['status'] <> "Diterima") {
                                        echo "Tidak";
                                    } ?>
                                    <?php
                                    if ($rk['status'] == "Diterima") {
                                        if ($rk['kunci'] == "Ya") { ?>
                                            <a href="<?= base_url() . 'master/rekap_kunci/' . $rk['id_rekap'] . '/' . "Tidak"; ?>">
                                                <button type="button" class="btn btn-block btn-success btn-xs">Tidak</button></a>

                                        <?php } else if ($rk['kunci'] == "Tidak") { ?>
                                            <a href="<?= base_url() . 'master/rekap_kunci/' . $rk['id_rekap'] . '/' . "Ya"; ?>">
                                                <button type="button" class="btn btn-block btn-warning btn-xs">Kunci</button></a>

                                    <?php   }
                                    } ?>
                                </td>
                            </tr>
                        <?php } ?>
                </table> -->

            </div>
            <!-- /.box -->
            <!-- akhir tabel ->
        </div>
        <!-- /.box-body -->
            <!-- <div class="box-footer">
                <div class="btn-group">
                    <a href="<?= base_url() . 'master/rekap_sinkron/' . $th_aktif['tahun']; ?>"><button type="button" class="btn btn-round btn-success btn-sm">Sinkronisasi</button></a>
                    <a href="<?= base_url() . 'master/cetak_rekap/'; ?>"><button type="button" class="btn btn-round btn-info btn-sm">Export</button></a>
                </div>
            </div> -->
            <!-- /.box-footer-->
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->