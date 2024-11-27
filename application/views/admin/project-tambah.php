<main id="main" class="main">
    <div class="pagetitle">
        <h1 class="text-primary fw-bold">Tambah Proyek Baru</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Home</a></li>
                <li class="breadcrumb-item active">Tambah Proyek</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <div class="container mt-5">
        <form action="<?= base_url('admin/saveProject') ?>" method="post" enctype="multipart/form-data" class="shadow-lg p-4 rounded bg-light">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="kategori_project" class="form-label">Kategori Proyek</label>
                    <select class="form-select" name="kategori_project" id="kategori_project" required>
                        <option value="" selected disabled>Pilih Kategori</option>
                        <option value="filter-remodeling">Remodeling</option>
                        <option value="filter-construction">Construction</option>
                        <option value="filter-repairs">Repairs</option>
                        <option value="filter-design">Design</option>
                        <option value="filter-painting">Painting & Finishing</option>
                        <option value="filter-decluttering">Decluttering</option>
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="title_project" class="form-label">Judul Proyek</label>
                    <input type="text" class="form-control" name="title_project" id="title_project" placeholder="Masukkan Judul Proyek" required>
                </div>
            </div>
            <div class="mb-3">
                <label for="desk_project" class="form-label">Deskripsi Proyek</label>
                <textarea class="form-control" name="desk_project" id="desk_project" rows="4" placeholder="Masukkan Deskripsi Proyek" required></textarea>
            </div>
            <div class="mb-3">
                <label for="img" class="form-label">Gambar Proyek</label>
                <input type="file" class="form-control" name="img" id="img" required>
            </div>
            <div class="text-end">
                <button type="submit" class="btn btn-primary"><i class="bi bi-check-circle"></i> Simpan Proyek</button>
                <a href="<?= base_url('admin') ?>" class="btn btn-secondary"><i class="bi bi-arrow-left-circle"></i> Kembali</a>
            </div>
        </form>
    </div>
</main>