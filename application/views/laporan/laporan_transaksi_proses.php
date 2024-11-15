<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title></title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .kop-surat {
            text-align: center;
            border-bottom: 2px solid black;
            padding-bottom: 10px;
            margin-bottom: 10px;
        }

        .kop-surat img {
            width: 80px;
            position: absolute;
            left: 10%;
        }

        .kop-surat img.logo-kanan {
            left: auto;
            right: 10%;
        }

        .header-text {
            display: inline-block;
            width: 60%;
            text-align: center;
            font-size: 14px;
            line-height: 1.5;
        }

        .header-text h1 {
            font-size: 16px;
            margin: 0;
        }

        .header-text p {
            margin: 2px 0;
        }

        .subheader {
            margin-top: 10px;
            font-size: 12px;
        }

        .header-table {
            width: 100%;
            margin-top: 10px;
        }

        .header-table td {
            font-size: 12px;
            vertical-align: top;
        }

        .table-data {
            width: 100%;
            border-collapse: collapse;
        }

        .table-data tr th,
        .table-data tr td {
            border: 1px solid black;
            font-size: 11pt;
            padding: 10px 10px 10px 10px;
        }
    </style>
</head>

<body>
    <div class="kop-surat">
        <img src="<?= FCPATH . 'assets/img/logo-1.png' ?>" alt="Logo Kiri" />
        <div class="header-text">
            <h2>TUKANGIN</h2>
            <p>Laporan Transaksi</p>
        </div>
    </div>

    <table class="header-table">
        <tr>
            <td>Nomor Transaksi</td>
            <td>:</td>
            <td style="text-align: right">28 September 2024</td>
        </tr>
    </table>
    <table class="table-data">
        <thead>
            <tr>
                <th>No</th>
                <th>Judul Buku</th>
                <th>Pengarang</th>
                <th>Terbit</th>
                <th>Tahun Penerbit</th>
                <th>ISBN</th>
                <th>Stok</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row"></th>
                <td>1</td>
                <td>2</td>
                <td>3</td>
                <td>4</td>
                <td>5</td>
                <td>6</td>
            </tr>
        </tbody>
    </table>
</body>

</html>