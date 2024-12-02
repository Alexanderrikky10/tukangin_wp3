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
    <div class="text-center"><?= $this->session->flashdata('message'); ?></div>

    <div class="container mt-4">
        <div class="d-flex justify-content-end mb-3">
            <a class="btn btn-primary shadow-sm" data-bs-toggle="modal" data-bs-target="#tambahJasa">
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
                                <a data-bs-toggle="modal" data-bs-target="#editModal<?= $row['id'] ?>" class=" btn btn-warning btn-sm shadow-sm me-1">
                                    <i class="bi bi-pencil-square"></i> Edit
                                </a>
                                <a href="<?= base_url('admin/jasaHapus/' . $row['id']) ?>" class="btn btn-danger btn-sm shadow-sm" onclick="return confirm('Yakin ingin menghapus jasa ini?')">
                                    <i class="bi bi-trash"></i> Hapus
                                </a>
                            </td>
                        </tr>

                        <div class="modal fade" id="editModal<?= $row['id'] ?>" tabindex="-1">
                            <div class="modal-dialog modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit Jasa - <?= $row['title'] ?></h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="<?= base_url('admin/editJasa/' . $row['id']) ?>" method="post" enctype="multipart/form-data">
                                            <div class="mb-3">
                                                <label for="icon<?= $row['id'] ?>" class="form-label">Icon</label>
                                                <input type="text" class="form-control" id="icon<?= $row['id'] ?>" name="icon" value="<?= $row['icon'] ?>">
                                            </div>
                                            <div class="mb-3">
                                                <label for="title<?= $row['id'] ?>" class="form-label">Judul</label>
                                                <input type="text" class="form-control" id="title<?= $row['id'] ?>" name="title" value="<?= $row['title'] ?>">
                                            </div>
                                            <div class="mb-3">
                                                <label for="deskripsi<?= $row['id'] ?>" class="form-label">Deskripsi</label>
                                                <textarea class="form-control" id="deskripsi<?= $row['id'] ?>" name="deskripsi" rows="3"><?= $row['deskripsi'] ?></textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label for="harga<?= $row['id'] ?>" class="form-label">Harga</label>
                                                <input type="number" class="form-control" id="harga<?= $row['id'] ?>" name="harga" value="<?= $row['harga'] ?>">
                                            </div>
                                            <div class="mb-3">
                                                <label for="img<?= $row['id'] ?>" class="form-label">Gambar</label>
                                                <input type="file" class="form-control" id="img<?= $row['id'] ?>" name="img">
                                                <small>Gambar saat ini: <strong><?= $row['img'] ?></strong></small>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>



                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</main>

<div class="modal fade" id="tambahJasa" tabindex="-1">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Jasa Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('admin/tambahJasa') ?>" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="icon" class="form-label">Icon (Contoh: fa-solid fa-mountain-city)</label>
                        <input type="text" class="form-control" id="icon" name="icon">
                    </div>
                    <div class="mb-3">
                        <label for="title" class="form-label">Judul</label>
                        <input type="text" class="form-control" id="title" name="title">
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga</label>
                        <input type="number" class="form-control" id="harga" name="harga">
                    </div>
                    <div class="mb-3">
                        <label for="img" class="form-label">Gambar</label>
                        <input type="file" class="form-control" id="img" name="img">
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
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