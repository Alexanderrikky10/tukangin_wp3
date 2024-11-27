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

    <div class="row">
        <div class="col-lg-8 mx-auto">

            <!-- Flash Message -->
            <?= $this->session->flashdata('message'); ?>

            <!-- Button Tambah Metode Bayar -->
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4 class="text-secondary">Daftar Metode Pembayaran</h4>
                <button class="btn btn-success btn-sm shadow-sm" data-bs-toggle="modal" data-bs-target="#tambahMetodeBayarModel">
                    <i class="bi bi-plus-circle"></i> Metode Bayar Baru
                </button>
            </div>

            <!-- Table -->
            <div class="table-responsive rounded shadow">
                <table class="table table-striped table-hover align-middle">
                    <thead class="table-primary">
                        <tr>
                            <th scope="col" class="text-center">No</th>
                            <th scope="col">Metode</th>
                            <th scope="col">Rekening</th>
                            <th scope="col" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($metode as $m) : ?>
                            <tr>
                                <th scope="row" class="text-center"><?= $i; ?></th>
                                <td><?= $m['m_bayar']; ?></td>
                                <td><?= $m['rekening']; ?></td>
                                <td class="text-center">
                                    <button data-bs-toggle="modal" data-bs-target="#editMetodeModal<?= $m['id'] ?>" class="btn btn-outline-info btn-sm">
                                        <i class="bi bi-pencil-square"></i> Edit
                                    </button>
                                    <a href="<?= base_url('admin/hapuspembayaran/') . $m['id'] ?>" onclick="return confirm('Kamu yakin akan menghapus <?= $title . ' ' . $m['m_bayar']; ?> ?');" class="btn btn-outline-danger btn-sm">
                                        <i class="bi bi-trash"></i> Hapus
                                    </a>
                                </td>
                            </tr>
                            <?php $i++ ?>

                            <!-- Modal Edit Metode Bayar -->
                            <div class="modal fade" id="editMetodeModal<?= $m['id'] ?>" tabindex="-1" aria-labelledby="editMetodeModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editMetodeModalLabel">Edit Metode Bayar</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="<?= base_url('admin/editMetode'); ?>" method="post" enctype="multipart/form-data">
                                            <div class="modal-body">
                                                <input type="hidden" name="id" value="<?= $m['id'] ?>">
                                                <div class="mb-3">
                                                    <label for="m_bayar" class="form-label">Nama Metode</label>
                                                    <input type="text" class="form-control" id="m_bayar" name="m_bayar" value="<?= $m['m_bayar'] ?>">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="rekening" class="form-label">Rekening</label>
                                                    <input type="text" class="form-control" id="rekening" name="rekening" value="<?= $m['rekening'] ?>">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal Tambah Metode Bayar -->
    <div class="modal fade" id="tambahMetodeBayarModel" tabindex="-1" aria-labelledby="tambahMetodeBayarModelLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahMetodeBayarModelLabel">Tambah Metode Bayar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="<?= base_url('admin/metodebayar'); ?>" method="post">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="m_bayar" class="form-label">Nama Metode</label>
                            <input type="text" class="form-control" id="m_bayar" name="m_bayar" placeholder="Nama metode baru">
                        </div>
                        <div class="mb-3">
                            <label for="rekening" class="form-label">Rekening</label>
                            <input type="text" class="form-control" id="rekening" name="rekening" placeholder="Rekening baru">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</main>