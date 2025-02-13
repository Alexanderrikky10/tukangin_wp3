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

        <section class="section dashboard">
            <div class="col-lg-12">
                <div class="row">
                    <!-- sales -->
                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card sales-card">

                            <div class="card-body">
                                <h5 class="card-title">Transaksi <span>| All</span></h5>

                                <div class="d-flex align-items-center">
                                    <div
                                        class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-cart"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6><?= $total_selesai; ?></h6>
                                        <span class="text-muted small pt-2 ps-1">orders processed</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- penghasilan  -->
                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card revenue-card">

                            <div class="card-body">
                                <h5 class="card-title">
                                    Revenue <span>| All</span>
                                </h5>

                                <div class="d-flex align-items-center">
                                    <div
                                        class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-currency-dollar"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>Rp. <?= number_format($total_revenue, 0, ',', '.'); ?></h6>
                                        <span class="text-muted small pt-2 ps-1">total revenue</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- Customers -->
                    <div class="col-xxl-4 col-xl-12">
                        <div class="card info-card customers-card">

                            <div class="card-body">
                                <h5 class="card-title">
                                    Customers <span>| All</span>
                                </h5>

                                <div class="d-flex align-items-center">
                                    <div
                                        class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-people"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6><?= $total_customers; ?></h6>
                                        <span class="text-muted small pt-2 ps-1">total customers</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="container">

                        <center>
                            <table>
                                <tr>
                                    <td>
                                        <div class="table-responsive full-width">
                                            <table class="table table-bordered table-striped table-hover" id="table-datatable">
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Nomor Pesanan</th>
                                                    <th>Tanggal transaksi</th>
                                                    <th>Email Kastemer</th>
                                                    <th>Bukti Bayar</th>
                                                    <th>Action</th>
                                                    <th>Total Bayar</th>
                                                    <th>Jam Pesanan</th>
                                                </tr>
                                                <?php
                                                $no = 1;
                                                foreach ($transaksi as $t) {
                                                ?>
                                                    <tr>
                                                        <td><?= $no; ?></td>
                                                        <td>
                                                            <a class="btn-link" href="<?= base_url('admin/detailPesanan/' . $t->id); ?>"><?= $t->id ?></a>
                                                        </td>
                                                        <td><?= date("d-m-Y", $t->tgl); ?></td>
                                                        <td><?= $t->email; ?></td>

                                                        <form action="<?= base_url('admin/transaksiAct/') . $t->id; ?>" method="post">
                                                            <!-- data yang akan di post -->
                                                            <input type="hidden" name="nama_jasa" id="nama_jasa" value="<?= $t->nama_jasa ?>">
                                                            <input type="hidden" name="jam" id="jam" value="<?= $t->jam ?>">
                                                            <input type="hidden" name="name" id="name" value="<?= $t->name ?>">
                                                            <input type="hidden" name="pekerja" id="pekerja" value="<?= $t->pekerja ?>">
                                                            <input type="hidden" name="total_bayar" id="total_bayar" value="<?= $t->total_bayar ?>">
                                                            <input type="hidden" name="email" id="email" value="<?= $t->email ?>">
                                                            <input type="hidden" name="alamat" id="alamat" value="<?= $t->alamat ?>">
                                                            <input type="hidden" name="m_bayar" id="m_bayar" value="<?= $t->metode ?>">
                                                            <input type="hidden" name="nomor" id="nomor" value="<?= $t->nomor ?>">
                                                            <input type="hidden" name="image" id="image" value="<?= $t->image ?>">
                                                            <input type="hidden" name="tgl" id="tgl" value="<?= $t->tgl ?>">
                                                            <!-- end data post -->
                                                            <td nowrap>
                                                                <div class="d-flex justify-content-center align-items-center">
                                                                    <a href="<?= base_url('assets/img/transaksi/') . $t->image ?>"
                                                                        title=""
                                                                        data-gallery="portfolio-gallery-app"
                                                                        class="glightbox preview-link btn btn-lg btn-outline-primary">
                                                                        <i class="bi bi-zoom-in"></i>
                                                                    </a>
                                                                </div>
                                                            </td>
                                                            <td nowrap>
                                                                <button type="submit" class="btn btn-sm btn-outline-info"><i class="bi bi-check-circle-fill"></i> </i>Konfimasi</button>
                                                                <a href="<?= base_url('admin/hapusTransaksi/') . $t->id; ?>"
                                                                    class="btn btn-sm btn-outline-danger"
                                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus transaksi ini?');">
                                                                    <i class="bi bi-trash-fill"></i> Hapus
                                                                </a>
                                                            </td>
                                                            <td>
                                                                <input class="form-control rounded-sm" type="text" name="denda" id="denda" readonly value="Rp.<?= number_format($t->total_bayar); ?>">
                                                                <?= form_error(); ?>
                                                            </td>
                                                            <td>
                                                                <input class="form-control rounded-sm" style="width:100px" type="text" readonly name="lama" id="lama" value="<?= $t->jam; ?>">
                                                                <?= form_error(); ?>
                                                            </td>
                                                        </form>
                                                    </tr>
                                                <?php $no++;
                                                } ?>
                                            </table>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center">
                                        <a href="<?= base_url('admin'); ?>" class="btn btn-link"><i class="fas fa-fw fa-refresh"></i> Refresh</a>
                                    </td>
                                </tr>
                            </table>
                        </center>
                    </div>
                </div>
            </div>
        </section>
    </main>