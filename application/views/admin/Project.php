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
    <div class="container mt-5">

        <!-- Tombol Tambah Proyek Baru -->
        <div class="d-flex justify-content-end mb-4">
            <a href="<?= base_url('admin/tambahProject') ?>" class="btn btn-primary shadow d-flex align-items-center">
                <i class="bi bi-plus-circle-fill me-2"></i> Tambah Proyek Baru
            </a>
        </div>

        <!-- Grid Cards -->
        <div class="row g-4">
            <?php foreach ($projects as $project) : ?>
                <div class="col-md-4">
                    <div class="card shadow-lg border-0 h-100 project-card">
                        <!-- Gambar Proyek -->
                        <div class="project-image">
                            <img src="<?= base_url('assets/img/projects/') . $project['img'] ?>" class="card-img-top" alt="<?= $project['title_project'] ?>">
                        </div>

                        <!-- Isi Card -->
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title text-truncate fw-bold"><?= $project['title_project'] ?></h5>
                            <p class="card-text text-muted flex-grow-1"><?= $project['desk_project'] ?></p>

                            <!-- Tombol Aksi -->
                            <div class="d-flex justify-content-between mt-3">
                                <a data-bs-toggle="modal" data-bs-target="#editModal<?= $project['id_project'] ?>" class=" btn btn-sm btn-warning">
                                    <i class="bi bi-pencil-square"></i> Edit
                                </a>
                                <a href="<?= base_url('admin/deleteProject/' . $project['id_project']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus proyek ini?')">
                                    <i class="bi bi-trash"></i> Hapus
                                </a>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="modal fade" id="editModal<?= $project['id_project'] ?>" tabindex="-1">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <form action="<?= base_url('admin/updateProject') ?>" method="post" enctype="multipart/form-data">
                                <div class="modal-header">
                                    <h5 class="modal-title">Edit Proyek: <?= $project['title_project']; ?></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <input type="hidden" name="id_project" value="<?= $project['id_project'] ?>">
                                    <div class="mb-3">
                                        <label for="kategori_project" class="form-label">Kategori Proyek</label>
                                        <select class="form-select" name="kategori_project" id="kategori_project" required>
                                            <option value="filter-remodeling" <?= $project['kategori_project'] == 'filter-remodeling' ? 'selected' : '' ?>>Remodeling</option>
                                            <option value="filter-construction" <?= $project['kategori_project'] == 'filter-construction' ? 'selected' : '' ?>>Construction</option>
                                            <option value="filter-repairs" <?= $project['kategori_project'] == 'filter-repairs' ? 'selected' : '' ?>>Repairs</option>
                                            <option value="filter-design" <?= $project['kategori_project'] == 'filter-design' ? 'selected' : '' ?>>Design</option>
                                            <option value="filter-Painting" <?= $project['kategori_project'] == 'filter-painting' ? 'selected' : '' ?>>Painting & Finishing</option>
                                            <option value="filter-Decluttering" <?= $project['kategori_project'] == 'filter-Decluttering' ? 'selected' : '' ?>> Decluttering</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="title_project" class="form-label">Judul Proyek</label>
                                        <input type="text" class="form-control" name="title_project" id="title_project" value="<?= $project['title_project'] ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="desk_project" class="form-label">Deskripsi Proyek</label>
                                        <textarea class="form-control" name="desk_project" id="desk_project" rows="4" required><?= $project['desk_project'] ?></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="img" class="form-label">Gambar Proyek (Opsional)</label>
                                        <input type="file" class="form-control" name="img" id="img">
                                        <small class="text-muted">Kosongkan jika tidak ingin mengganti gambar.</small>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            <?php endforeach; ?>
        </div>
    </div>
</main>

<!-- Tambahkan CSS Khusus -->
<style>
    .project-card {
        transition: transform 0.3s, box-shadow 0.3s;
    }

    .project-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
    }

    .project-image img {
        object-fit: cover;
        height: 200px;
    }
</style>


<!-- modal  -->