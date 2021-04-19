<?php
$tgl = gmdate("Y-m-d", time() + 60 * 60 * 7);
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=Rekap_" . $tgl . ".xls");
header("Pragma: no-cache");
header("Expires: 0");
?>
<table border='1' width="100%">
    <tr>
        <th>No</th>
        <th>Th</th>
        <th>NIM</th>
        <th>Nama</th>
        <th>JK</th>
        <th>Prodi</th>
        <th>IPK</th>
        <th>SMT</th>
        <th>Prestasi</th>
        <th>HP</th>
        <th>Alamat</th>
        <th>Pekerjaan</th>
        <th>Penghasilan</th>
        <th>Tanggungan</th>
        <th>No Rekening</th>
        <th>Kepribadian</th>
        <th>Skor IP</th>
        <th>Skor Prestasi</th>
        <th>Skor Ekonomi</th>
        <th>Skor Kepribadian</th>
        <th>Skor Total</th>
        <th>Ket</th>
        <th>Alasan Tidak Diusulkan</th>
        <th>Status</th>
        <th>Alasan Ditolak</th>
        <th>Kunci</th>


    </tr>
    <?php
    $no = 1;
    foreach ($rekap as $rk) {
    ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $rk['tahun']; ?></td>
            <td><?= $rk['nim']; ?></td>
            <td><?= $rk['nama']; ?></td>
            <td><?= $rk['jk']; ?></td>
            <td><?= $rk['nama_prodi']; ?></td>
            <td><?= $rk['ipk']; ?></td>
            <td><?= $rk['smt']; ?></td>
            <td><?= $rk['nilai_prestasi']; ?></td>
            <td><?= $rk['no_hp']; ?></td>
            <td><?= $rk['alamat']; ?></td>
            <td><?= $rk['ortu_pekerjaan']; ?></td>
            <td><?= $rk['ortu_penghasilan']; ?></td>
            <td><?= $rk['ortu_tanggungan']; ?></td>
            <td><?= $rk['bank_norek']; ?></td>
            <td><?= $rk['nilai_pribadi']; ?></td>
            <td><?= $rk['skor_ip']; ?></td>
            <td><?= $rk['skor_prestasi']; ?></td>
            <td><?= $rk['skor_ekonomi']; ?></td>
            <td><?= $rk['skor_pribadi']; ?></td>
            <td><?= $rk['skor_total']; ?></td>
            <td><?= $rk['ket_rekap']; ?></td>
            <td><?= $rk['ket_rekap_alasan']; ?></td>
            <td><?= $rk['status']; ?></td>
            <td><?= $rk['status_alasan']; ?></td>
            <td><?= $rk['kunci']; ?></td>
        </tr>
    <?php } ?>
</table>