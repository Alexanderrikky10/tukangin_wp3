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
                                        <th scope="col">Nama</th>
                                        <th scope="col">Nama Jasa</th>
                                        <th scope="col">jam</th>
                                        <th scope="col">total bayar </th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Alamat</th>
                                        <th scope="col">Metode Bayar</th>
                                        <th scope="col">no Hp</th>
                                        <th scope="col">Tangal</th>
                                        <th scope="col">bukti</th>
                                        <th scope="col">action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    foreach ($transaksi as $t): ?>
                                        <form action="<?= base_url('admin/transaksiAct/') . $t->id; ?>" method="post">
                                            <tr>
                                                <th scope="row"><?= $i++; ?></th>
                                                <td><?= $t->name; ?></td>
                                                <td><?= $t->nama_jasa; ?></td>
                                                <td><?= $t->jam; ?></td>
                                                <td>Rp.<?= number_format($t->total_bayar); ?></td>
                                                <td><?= $t->email; ?></td>
                                                <td><?= $t->alamat; ?></td>
                                                <td><?= $t->m_bayar; ?></td>
                                                <td><?= $t->nomor ?></td>
                                                <!-- <td><?= date('l, d F Y', $t->tgl); ?></td> -->
                                                <td><?= $t->tgl; ?></td>
                                                <td>

                                                    <!-- untuk isi data ke dalam data base dalam bentuk input tidak terlihat -->

                                                    <!-- <input type="hidden" name="name" id="name"> -->
                                                    <input type="hidden" name="nama_jasa" id="nama_jasa" value="<?= $t->nama_jasa ?>">
                                                    <input type="hidden" name="jam" id="jam" value="<?= $t->jam ?>">
                                                    <input type="hidden" name="pekerja" id="pekerja" value="<?= $t->pekerja ?>">
                                                    <input type="hidden" name="total_bayar" id="total_bayar" value="<?= $t->total_bayar ?>">
                                                    <input type="hidden" name="email" id="email" value="<?= $t->email ?>">
                                                    <input type="hidden" name="alamat" id="alamat" <?= $t->alamat ?>>
                                                    <input type="hidden" name="m_bayar" id="m_bayar" value="<?= $t->metode ?>">
                                                    <input type="hidden" name="nomor" id="nomor" value="<?= $t->nomor ?>">
                                                    <input type="hidden" name="image" id="image" value="<?= $t->image ?>">
                                                    <input type="hidden" name="tgl" id="tgl" value="<?= $t->tgl ?>">
                                                    <!-- <input type="hidden" name="" id=""> -->
                                                    <picture>
                                                        <source srcset="" type=" image/svg+xml">
                                                        <img width="250" height="250" src="<?= base_url('assets/img/trnasaksiSelesai/') . $t->image; ?>" class="img-fluid img-thumbnail" alt="...">

                                                    </picture>

                                                </td>
                                                <td>
                                                    <button class="btn btn-primary" type="submit"> kirim </button>

                                                </td>
                                            </tr>
                                        </form>
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