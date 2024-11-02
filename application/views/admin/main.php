    <main id="main" class="main">
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
                                                <a class="btn-link" href="<?= base_url('admin/detailT/' . $t->id); ?>"><?= $t->id ?></a>
                                            </td>
                                            <td><?= date('l, d F Y', $t->tgl); ?></td>
                                            <td><?= $t->email; ?></td>

                                            <form action="" method="post">
                                                <td nowrap>
                                                    <button type="submit" class="btn btn-sm btn-outline-info"><i class="bi bi-check-circle-fill"></i> </i>Konfimasi</button>
                                                </td>
                                                <td>
                                                    <input class="form-control rounded-sm" type="text" name="denda" id="denda" value="Rp.<?= number_format($t->total_bayar); ?>">
                                                    <?= form_error(); ?>
                                                </td>
                                                <td>
                                                    <input class="form-control rounded-sm" style="width:100px" type="text" name="lama" id="lama" value="<?= $t->jam; ?>">
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