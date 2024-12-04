<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=$title.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>
<!DOCTYPE html>
<html>

<head>
    <title>Laporan Transaksi Selesai</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <h1 style="text-align: center;">Laporan Transaksi Selesai</h1>
    <table>
        <thead>
            <tr>
                <th>No Transaksi</th>
                <th>Nama Jasa</th>
                <th>Nama</th>
                <th>Total Jam</th>
                <th>Pekerja</th>
                <th>Total Bayar</th>
                <th>Metode Bayar</th>
                <th>Alamat</th>
                <th>Tanggal Transaksi</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($transaksi as $t) : ?>
                <tr>
                    <td><?= $t['no_transaksi'] ?></td>
                    <td><?= $t['nama_jasa'] ?></td>
                    <td><?= $t['name'] ?></td>
                    <td><?= $t['ttl_jam'] ?></td>
                    <td><?= $t['pekerja'] ?></td>
                    <td>Rp. <?= number_format($t['ttl_bayar'], 0, ',', '.') ?></td>
                    <td><?= $t['m_bayar'] ?></td>
                    <td><?= $t['alamat'] ?></td>
                    <td><?= $t['tgl_transaksi'] ?></td>
                    <td><?= $t['status'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>