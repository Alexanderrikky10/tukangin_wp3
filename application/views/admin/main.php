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
            <div class="text-center"><?= $this->session->flashdata('message'); ?></div>
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
                                                    <button type="submit" class="btn btn-sm btn-outline-info"><i class="bi bi-check-circle-fill"></i> </i>Konfimasi</button>
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
    </main>