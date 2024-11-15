        <main id="main" class="main">

            <div class="pagetitle">
                <h1>Profile</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Home</a></li>
                        <li class="breadcrumb-item">Admin</li>
                        <li class="breadcrumb-item active">Jasa</li>
                    </ol>
                </nav>
                <a href="<?= base_url('laporan'); ?>" class="btn btn-warning mb-3"><i class="far fa-file-pdf"></i> Download Pdf</a>
            </div><!-- End Page Title -->


            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body pt-3">
                        <!-- Bordered Tabs -->
                        <ul class="nav nav-tabs nav-tabs-bordered">
                            <li class="nav-item">
                                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#construction">Construction</button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#remodeling">Remodeling</button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#design">Design</button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#painting">Painting</button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#repairs">Repairs</button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#decluttering">Decluttering</button>
                            </li>
                        </ul>

                        <div class="tab-content pt-2">
                            <!-- Construction Tab -->
                            <div class="tab-pane fade show active construction" id="construction">
                                <?php if (!empty($construction)): ?>
                                    <?php foreach ($construction as $ti): ?>
                                        <div class="container mt-4">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            <img src="<?= base_url('assets/img/transaksi/') . $ti['img'] ?>" alt="Produk" class="img-fluid">
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
                                                <div class="card-footer bg-white border-0">
                                                    <div class="d-flex justify-content-between">
                                                        <p class="text-muted"></p>
                                                        <div>
                                                            <button class="btn btn-outline-secondary"><i class="bi bi-filetype-pdf"></i>Cetak Transaksi</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach ?>
                                <?php else: ?>
                                    <p>Tidak ada transaksi untuk kategori ini.</p>
                                <?php endif ?>
                            </div>

                            <!-- Remodeling Tab -->
                            <div class="tab-pane fade remodeling" id="remodeling">
                                <?php if (!empty($remodeling)): ?>
                                    <?php foreach ($remodeling as $ti): ?>
                                        <!-- Card structure sama seperti di tab construction -->
                                        <div class="container mt-4">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            <img src="<?= base_url('assets/img/transaksi/') . $ti['img'] ?>" alt="Produk" class="img-fluid">
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
                                                <div class="card-footer bg-white border-0">
                                                    <div class="d-flex justify-content-between">
                                                        <p class="text-muted"></p>
                                                        <div>
                                                            <button class="btn btn-outline-secondary"><i class="bi bi-filetype-pdf"></i>Cetak Transaksi</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach ?>
                                <?php else: ?>
                                    <p>Tidak ada transaksi untuk kategori ini.</p>
                                <?php endif ?>
                            </div>

                            <!-- Design Tab -->
                            <div class="tab-pane fade" id="design">
                                <?php if (!empty($design)): ?>
                                    <?php foreach ($design as $ti): ?>
                                        <!-- Card structure sama seperti di tab construction -->
                                        <div class="container mt-4">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            <img src="<?= base_url('assets/img/transaksi/') . $ti['img'] ?>" alt="Produk" class="img-fluid">
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
                                                <div class="card-footer bg-white border-0">
                                                    <div class="d-flex justify-content-between">
                                                        <p class="text-muted"></p>
                                                        <div>
                                                            <button class="btn btn-outline-secondary"><i class="bi bi-filetype-pdf"></i>Cetak Transaksi</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach ?>
                                <?php else: ?>
                                    <p>Tidak ada transaksi untuk kategori ini.</p>
                                <?php endif ?>
                            </div>

                            <!-- Painting Tab -->
                            <div class="tab-pane fade" id="painting">
                                <?php if (!empty($painting)): ?>
                                    <?php foreach ($painting as $ti): ?>
                                        <!-- Card structure sama seperti di tab construction -->
                                        <div class="container mt-4">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            <img src="<?= base_url('assets/img/transaksi/') . $ti['img'] ?>" alt="Produk" class="img-fluid">
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
                                                <div class="card-footer bg-white border-0">
                                                    <div class="d-flex justify-content-between">
                                                        <p class="text-muted"></p>
                                                        <div>
                                                            <button class="btn btn-outline-secondary"><i class="bi bi-filetype-pdf"></i>Cetak Transaksi</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach ?>
                                <?php else: ?>
                                    <p>Tidak ada transaksi untuk kategori ini.</p>
                                <?php endif ?>
                            </div>

                            <!-- Repairs Tab -->
                            <div class="tab-pane fade" id="repairs">
                                <?php if (!empty($repairs)): ?>
                                    <?php foreach ($repairs as $ti): ?>
                                        <div class="container mt-4">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            <img src="<?= base_url('assets/img/transaksi/') . $ti['img'] ?>" alt="Produk" class="img-fluid">
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
                                                <div class="card-footer bg-white border-0">
                                                    <div class="d-flex justify-content-between">
                                                        <p class="text-muted"></p>
                                                        <div>
                                                            <button class="btn btn-outline-secondary"><i class="bi bi-filetype-pdf"></i>Cetak Transaksi</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach ?>
                                <?php else: ?>
                                    <p>Tidak ada transaksi untuk kategori ini.</p>
                                <?php endif ?>
                            </div>

                            <!-- Decluttering Tab -->
                            <div class="tab-pane fade" id="decluttering">
                                <?php if (!empty($decluttering)): ?>
                                    <?php foreach ($decluttering as $ti): ?>
                                        <!-- Card structure sama seperti di tab construction -->
                                        <div class="container mt-4">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            <img src="<?= base_url('assets/img/transaksi/') . $ti['img'] ?>" alt="Produk" class="img-fluid">
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
                                                <div class="card-footer bg-white border-0">
                                                    <div class="d-flex justify-content-between">
                                                        <p class="text-muted"></p>
                                                        <div>
                                                            <button class="btn btn-outline-secondary"><i class="bi bi-filetype-pdf"></i>Cetak Transaksi</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach ?>
                                <?php else: ?>
                                    <p>Tidak ada transaksi untuk kategori ini.</p>
                                <?php endif ?>
                            </div>
                        </div><!-- End Bordered Tabs -->
                    </div>
                </div>
            </div>

        </main><!-- End #main -->