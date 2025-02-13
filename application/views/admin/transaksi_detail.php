    <main id="main" class="main">
        <center>
            <table>
                <?php foreach ($agt_transaksi as $at) { ?>
                    <tr>
                        <td>Data Anggota</td>
                        <td>:</td>
                        <th><?= $at['name']; ?></th>
                    </tr>
                    <tr>
                        <td>No Pesanan</td>
                        <td>:</td>
                        <th><?= $at['id']; ?></th>
                    </tr>
                <?php } ?>



                <tr>
                    <td colspan="3">
                        <hr>
                    </td>
                </tr>

                <tr>
                    <td colspan="3">
                        <div class="table-responsive full-width">

                            <table class="table table-bordered table-striped table-hover text-center" id="table-datatable">
                                <tr>
                                    <th>No.</th>
                                    <th>Jasa</th>
                                    <th>Pekerja Jumlah</th>
                                    <th>Metode Bayar</th>
                                    <th>Alamat</th>
                                    <th>Total Bayar</th>
                                </tr>

                                <?php
                                $no = 1;
                                foreach ($agt_transaksi as $at) {
                                ?>
                                    <tr>
                                        <td><?= $no; ?></td>
                                        <td><?= $at['nama_jasa']; ?></td>
                                        <td><?= $at['pekerja']; ?> Orang</td>
                                        <td><?= $at['m_bayar']; ?></td>
                                        <td><?= $at['alamat']; ?></td>
                                        <td>Rp.<?= number_format($at['total_bayar']); ?></td>
                                    </tr>
                                <?php $no++;
                                } ?>
                            </table>
                        </div>
                    </td>
                </tr>

            </table>

        </center>
    </main>