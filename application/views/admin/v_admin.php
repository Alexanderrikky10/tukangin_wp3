    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">

                <div class="col-lg-12">


                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Data Transaksi</h5>

                            <!-- Table with hoverable rows -->
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nama Jasa</th>
                                        <th scope="col">jam</th>
                                        <th scope="col">total bayar </th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Alamat</th>
                                        <th scope="col">Metode Bayar</th>
                                        <th scope="col">no Hp</th>
                                        <th scope="col">Tangal</th>
                                        <th scope="col">bukti</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    foreach ($transaksi as $t): ?>
                                        <tr>
                                            <th scope="row"><?= $i++; ?></th>
                                            <td><?= $t->nama; ?></td>
                                            <td><?= $t->jam; ?></td>
                                            <td>Rp.<?= number_format($t->total_bayar); ?></td>
                                            <td><?= $t->email; ?></td>
                                            <td><?= $t->alamat; ?></td>
                                            <td><?= $t->m_bayar; ?></td>
                                            <td><?= $t->nomor ?></td>
                                            <td><?= date('l, d F Y', $t->tgl); ?></td>
                                            <td>
                                                <picture>
                                                    <source srcset="" type=" image/svg+xml">
                                                    <img width="250" height="250" src="<?= base_url('asset/img/transaksi/') . $t->image; ?>" class="img-fluid img-thumbnail" alt="...">
                                                </picture>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                            <!-- End Table with hoverable rows -->

                        </div>
                    </div>

                </div>



            </div>
        </section>

    </main><!-- End #main -->