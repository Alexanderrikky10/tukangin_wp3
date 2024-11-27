<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Transaksi</title>
    <style>
        body {
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
            font-size: 14px;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .container {
            margin: 20px;
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
            padding: 10px 0;
            border-bottom: 2px solid #007bff;
        }

        .header h2 {
            margin: 0;
            color: #007bff;
            font-size: 24px;
        }

        .header p {
            margin: 5px 0 0;
            font-size: 16px;
            color: #555;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
        }

        th {
            background-color: #007bff;
            color: white;
            padding: 10px;
            text-align: left;
            font-weight: bold;
        }

        td {
            padding: 10px;
            text-align: left;
        }

        .footer {
            text-align: center;
            margin-top: 30px;
            font-size: 12px;
            color: #777;
        }

        .highlight {
            background-color: #f9f9f9;
        }

        .text-right {
            text-align: right;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h2>Detail Transaksi</h2>
            <p>Nomor Transaksi: <strong><?= $transaksi['no_transaksi'] ?></strong></p>
        </div>

        <table>
            <tr>
                <th>Nama Jasa</th>
                <td><?= $transaksi['nama_jasa'] ?></td>
            </tr>
            <tr class="highlight">
                <th>Nama Pelanggan</th>
                <td><?= $transaksi['name'] ?></td>
            </tr>
            <tr>
                <th>Total Jam</th>
                <td><?= $transaksi['ttl_jam'] ?> jam</td>
            </tr>
            <tr class="highlight">
                <th>Jumlah Pekerja</th>
                <td><?= $transaksi['pekerja'] ?></td>
            </tr>
            <tr>
                <th>Total Bayar</th>
                <td class="text-right">Rp. <?= number_format($transaksi['ttl_bayar'], 0, ',', '.') ?></td>
            </tr>
            <tr class="highlight">
                <th>Metode Pembayaran</th>
                <td><?= $transaksi['m_bayar'] ?></td>
            </tr>
            <tr>
                <th>Email</th>
                <td><?= $transaksi['email'] ?></td>
            </tr>
            <tr class="highlight">
                <th>Alamat</th>
                <td><?= $transaksi['alamat'] ?></td>
            </tr>
            <tr>
                <th>Tanggal Transaksi</th>
                <td><?= $transaksi['tgl_transaksi'] ?></td>
            </tr>
            <tr class="highlight">
                <th>Status</th>
                <td><?= $transaksi['status'] ?></td>
            </tr>
        </table>

        <div class="footer">
            <p>Dicetak pada: <?= date('Y-m-d H:i:s') ?></p>
        </div>
    </div>
</body>

</html>