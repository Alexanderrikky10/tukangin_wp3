<main id="main" class="main">
    <div class="pagetitle d-flex justify-content-between align-items-center">
        <div>
            <h1 class="text-primary fw-bold"><?= $title; ?></h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Home</a></li>
                    <li class="breadcrumb-item active"><?= $title; ?></li>
                </ol>
            </nav>
        </div>
        <!-- Tombol Download PDF -->
        <div class="text-center"><?= $this->session->flashdata('message'); ?></div>
        <div class="d-flex">
            <a href="<?= base_url('laporan'); ?>" class="btn btn-warning btn-sm shadow-sm me-2">
                <i class="far fa-file-pdf"></i> Download PDF
            </a>
            <a href="<?= base_url('laporan/cetakExcel'); ?>" class="btn btn-info btn-sm shadow-sm">
                <i class="far fa-file-excel"></i> Download Excel
            </a>
        </div>
    </div><!-- End Page Title -->

    <div class="col-xl-12 mt-3">
        <div class="card">
            <div class="card-body pt-3">
                <!-- Bordered Tabs -->
                <ul class="nav nav-tabs nav-tabs-bordered">
                    <?php
                    $categories = [
                        'construction' => 'Construction',
                        'remodeling' => 'Remodeling',
                        'design' => 'Design',
                        'painting' => 'Painting',
                        'repairs' => 'Repairs',
                        'decluttering' => 'Decluttering'
                    ];
                    foreach ($categories as $key => $value) :
                    ?>
                        <li class="nav-item">
                            <button class="nav-link <?= $key === 'construction' ? 'active' : '' ?>" data-bs-toggle="tab" data-bs-target="#<?= $key ?>">
                                <?= $value ?>
                            </button>
                        </li>
                    <?php endforeach; ?>
                </ul>

                <div class="tab-content pt-2">
                    <?php foreach ($categories as $key => $value) : ?>
                        <div class="tab-pane fade <?= $key === 'construction' ? 'show active' : '' ?>" id="<?= $key ?>">
                            <?php if (!empty($$key)) : ?>
                                <?php foreach ($$key as $ti) : ?>
                                    <div class="container mt-4">
                                        <div class="card shadow-sm border-0">
                                            <div class="card-body">
                                                <div class="row align-items-center">
                                                    <div class="col-md-2">
                                                        <img src="<?= base_url('assets/img/transaksi/') . $ti['img'] ?>" alt="Produk" class="img-fluid rounded">
                                                    </div>
                                                    <div class="col-md-8">
                                                        <h6 class="card-title"><?= $ti['nama_jasa'] ?></h6>
                                                        <p class="mb-1"><?= $ti['m_bayar'] ?></p>
                                                        <p class="mb-1">x <?= $ti['ttl_jam'] ?> jam</p>
                                                        <span class="badge bg-success"><?= $ti['status'] ?></span>
                                                    </div>
                                                    <div class="col-md-2 text-end">
                                                        <h5 class="text-danger">Rp. <?= number_format($ti['ttl_bayar']) ?></h5>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer bg-light">
                                                <div class="d-flex justify-content-end">
                                                    <a href="<?= base_url('laporan/cetakTransaksiById/') . $ti['no_transaksi'] ?>" class="btn btn-danger">
                                                        <i class="bi bi-filetype-pdf"></i> Cetak Transaksi
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <p class="text-center mt-4 text-muted">Tidak ada transaksi untuk kategori ini.</p>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div><!-- End Tab Content -->
            </div>
        </div>
    </div>
</main><!-- End #main -->