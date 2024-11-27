<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bukti Pembayaran</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            margin: 20px;
        }

        .header,
        .footer {
            text-align: center;
        }

        .content {
            margin-top: 20px;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        .table,
        .table th,
        .table td {
            border: 1px solid black;
        }

        .table th,
        .table td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h2>Bukti Pembayaran</h2>
            <p>Tukangin - Solusi Tukang Anda</p>
        </div>
        <div class="content">
            <p><strong>ID Transaksi:</strong> <?= $transaksi['id'] ?></p>
            <p><strong>Nama Jasa:</strong> <?= $transaksi['nama_jasa'] ?></p>
            <p><strong>Metode Pembayaran:</strong> <?= $transaksi['m_bayar'] ?></p>
            <p><strong>Total Bayar:</strong> Rp. <?= number_format($transaksi['total_bayar'], 0, ',', '.') ?></p>
            <p><strong>Status:</strong> Sedang Diproses</p>

            <table class="table">
                <thead>
                    <tr>
                        <th>Jam</th>
                        <th>Jumlah Pekerja</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?= $transaksi['jam'] ?> Jam</td>
                        <td><?= $transaksi['pekerja'] ?> Orang</td>
                        <td>Rp. <?= number_format($transaksi['total_bayar'], 0, ',', '.') ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="footer">
            <p>Terima kasih telah menggunakan layanan kami!</p>
        </div>
    </div>
</body>

</html>