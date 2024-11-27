<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data User</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
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
    </style>
</head>

<body>
    <h1>Data User</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Role</th>
                <th>Status</th>
                <th>Alamat</th>
                <th>Telepon</th>
                <th>Tanggal Dibuat</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($user_list as $user): ?>
                <tr>
                    <td><?= $user['id']; ?></td>
                    <td><?= $user['name']; ?></td>
                    <td><?= $user['email']; ?></td>
                    <td>
                        <?= $user['role_id'] == 1 ? 'Admin' : 'User'; ?>
                    </td>
                    <td>
                        <?= $user['is_active'] ? 'Aktif' : 'Nonaktif'; ?>
                    </td>
                    <td><?= $user['alamat']; ?></td>
                    <td><?= $user['tlp']; ?></td>
                    <td><?= date('d-m-Y', $user['date_created']); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>