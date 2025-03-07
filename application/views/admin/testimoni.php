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
        <div class="text-end mb-3">
            <a href="<?= base_url('laporan/cetakTestimoni'); ?>" class="btn btn-warning">
                <i class="fas fa-file-pdf"></i> Cetak PDF
            </a>
        </div>
        <div class="card mb-4 shadow">

            <div class="card-header bg-primary text-white">
                <i class="fas fa-comments"></i> Data Testimoni
            </div>


            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-striped align-middle" id="dataTable" width="100%" cellspacing="0">
                        <thead class="table-dark">
                            <tr>
                                <th>ID</th>
                                <th>Nama User</th>
                                <th>Jabatan</th>
                                <th>Gambar</th>
                                <th>Bintang</th>
                                <th>Komentar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($testimoni as $t): ?>
                                <tr>
                                    <td class="text-center"><?= $t['id_testimoni']; ?></td>
                                    <td><?= $t['name_user']; ?></td>
                                    <td>
                                        <span class="badge bg-success"><?= $t['jabatan']; ?></span>
                                        <!--  -->
                                    </td>
                                    <td class="text-center">
                                        <img src="<?= base_url('assets/img/profile/') . $t['img']; ?>" alt="Gambar Testimoni" class="rounded-circle" width="50">
                                    </td>
                                    <td class="text-center text-warning">
                                        <?php for ($i = 0; $i < $t['bintang']; $i++): ?>
                                            <i class="fas fa-star"></i>
                                        <?php endfor; ?>
                                    </td>
                                    <td><?= $t['komentar']; ?></td>
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
    .table-hover tbody tr:hover {
        background-color: #f0f8ff;
    }

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