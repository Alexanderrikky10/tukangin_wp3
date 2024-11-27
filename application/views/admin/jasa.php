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

    <div class="container mt-4">
        <!-- <h2 class="mb-4 text-center text-black"><?= $title ?></h2> -->
        <div class="d-flex justify-content-end mb-3">
            <a href="<?= base_url('jasa/add') ?>" class="btn btn-primary shadow-sm">
                <i class="bi bi-plus-circle"></i> Tambah Jasa Baru
            </a>
        </div>
        <div class="table-responsive shadow rounded">
            <table class="table table-hover align-middle">
                <thead class="table-primary">
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Icon</th>
                        <th>Judul</th>
                        <th>Deskripsi</th>
                        <th class="text-center">Harga</th>
                        <th class="text-center">Gambar</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($jasa as $row) : ?>
                        <tr>
                            <td class="text-center fw-bold"><?= $no++; ?></td>
                            <td class="text-center">
                                <i class="<?= $row['icon'] ?> fs-4 text-primary"></i>
                            </td>
                            <td class="fw-semibold"><?= $row['title'] ?></td>
                            <td class="deskripsi"><?= $row['deskripsi'] ?></td> <!-- Tambahkan kelas deskripsi -->
                            <td class="text-center text-success fw-bold">Rp <?= number_format($row['harga'], 0, ',', '.'); ?></td>
                            <td class="text-center">
                                <img src="<?= base_url('assets/img/jasa/') . $row['img'] ?>" alt="<?= $row['title'] ?>" width="50" class="rounded shadow-sm">
                            </td>
                            <td class="text-center">
                                <a href="<?= base_url('jasa/edit/' . $row['id']) ?>" class="btn btn-warning btn-sm shadow-sm me-1">
                                    <i class="bi bi-pencil-square"></i> Edit
                                </a>
                                <a href="<?= base_url('jasa/delete/' . $row['id']) ?>" class="btn btn-danger btn-sm shadow-sm" onclick="return confirm('Yakin ingin menghapus jasa ini?')">
                                    <i class="bi bi-trash"></i> Hapus
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</main>

<style>
    td.deskripsi {
        max-width: 200px;
        /* Batasi lebar maksimum kolom */
        word-wrap: break-word;
        /* Pecah kata jika terlalu panjang */
        white-space: normal;
        /* Izinkan teks menggunakan beberapa baris */
        overflow: hidden;
        /* Hilangkan overflow */
    }
</style>