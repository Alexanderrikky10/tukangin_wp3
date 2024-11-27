<main id="main" class="main">
    <div class="pagetitle">
        <h1 class="text-primary fw-bold"><?= $title; ?></h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Home</a></li>
                <li class="breadcrumb-item active"><?= $title; ?></li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <div class="container">
        <div class="d-flex justify-content-end mb-3">
            <a href="<?= base_url('laporan/cetakUser') ?>" class="btn btn-success">
                <i class="fas fa-file-pdf"></i> Cetak Data
            </a>
        </div>
        <div class="card mb-4 shadow">
            <div class="card-header bg-primary text-white">
                <i class="fas fa-users"></i> Daftar Pengguna
            </div>
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-hover table-striped align-middle" id="dataTable" width="100%" cellspacing="0">
                        <thead class="table-dark">
                            <tr>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Gambar</th>
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
                                    <td class="text-center"><?= $user['id']; ?></td>
                                    <td><?= $user['name']; ?></td>
                                    <td><?= $user['email']; ?></td>
                                    <td class="text-center">
                                        <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" alt="Gambar User" class="rounded-circle" width="50">
                                    </td>
                                    <td>
                                        <?= $user['role_id'] == 1 ? '<span class="badge bg-success">Admin</span>' : '<span class="badge bg-info">User</span>'; ?>
                                    </td>
                                    <td>
                                        <?= $user['is_active'] ? '<span class="badge bg-success">Aktif</span>' : '<span class="badge bg-danger">Nonaktif</span>'; ?>
                                    </td>
                                    <td><?= $user['alamat']; ?></td>
                                    <td><?= $user['tlp']; ?></td>
                                    <td><?= date('d M Y', $user['date_created']); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>

<style>
    .card {
        border-radius: 15px;
        overflow: hidden;
    }

    .card-header {
        font-size: 1.25rem;
        font-weight: bold;
    }

    img.rounded-circle {
        border: 2px solid #ddd;
        padding: 3px;
    }
</style>