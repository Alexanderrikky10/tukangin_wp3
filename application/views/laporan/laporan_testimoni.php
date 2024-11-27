<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Testimoni</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
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

        h1 {
            text-align: center;
            color: #333;
        }

        .gold {
            color: gold;
        }
    </style>
</head>

<body>
    <h1>Data Testimoni</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama User</th>
                <th>Jabatan</th>
                <th>Bintang</th>
                <th>Komentar</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($testimoni as $t): ?>
                <tr>
                    <td><?= $t['id_testimoni']; ?></td>
                    <td><?= $t['name_user']; ?></td>
                    <td><?= $t['jabatan']; ?></td>
                    <td> <?= $t['bintang']; ?>
                    </td>
                    <td><?= $t['komentar']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>