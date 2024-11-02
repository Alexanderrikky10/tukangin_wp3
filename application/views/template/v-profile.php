<main id="main" class="main">

    <!-- Page Title -->

    <div class="page-title dark-background" style="background-image: url(<?= base_url('assets/') ?>img/page-title-bg.jpg);">
        <div class="container position-relative">
            <h1><?= $title ?></h1>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="<?= base_url('tukangin/home') ?>">Home</a></li>
                    <li class="current"><?= $title ?></li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- End Page Title -->

    <div class="text-center"><?= $this->session->flashdata('message'); ?></div>

    <section class="section profile">

        <div class="row">

            <div class="col-xl-4 ms-5">
                <div class="card">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                        <img src="<?= base_url('assets/img/profile/') . $user['image'] ?>" alt="Profile" class="rounded-circle">
                        <h2><?= $user['name'] ?></h2>
                        <div class="social-links mt-2">
                            <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                            <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-xl-7">

                <div class="card">
                    <div class="card-body pt-3">
                        <!-- Bordered Tabs -->
                        <ul class="nav nav-tabs nav-tabs-bordered">

                            <li class="nav-item">
                                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                            </li>

                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
                            </li>

                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-pesanan">Pesanan Anda</button>
                            </li>

                        </ul>
                        <div class="tab-content pt-2">

                            <div class="tab-pane fade show active profile-overview" id="profile-overview">

                                <h5 class="card-title">Profile Details</h5>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">Full Name</div>
                                    <div class="col-lg-9 col-md-8"><?= $user['name'] ?></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Address</div>
                                    <div class="col-lg-9 col-md-8"></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Phone</div>
                                    <div class="col-lg-9 col-md-8"></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Email</div>
                                    <div class="col-lg-9 col-md-8"><?= $user['email']; ?></div>
                                </div>

                            </div>

                            <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                                <!-- Profile Edit Form -->
                                <form>
                                    <div class="row mb-3">
                                        <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                                        <div class="col-md-8 col-lg-9">
                                            <img src="<?= base_url('assets/img/profile/') . $user['image'] ?>" alt="Profile">
                                            <div class="pt-2">
                                                <a href="#" class="btn btn-primary btn-sm" title="Upload new profile image"><i class="bi bi-upload"></i></a>
                                                <a href="#" class="btn btn-danger btn-sm" title="Remove my profile image"><i class="bi bi-trash"></i></a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="fullName" class="col-md-4 col-lg-3 col-form-label"><?= $user['name'] ?></label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="fullName" type="text" class="form-control" id="fullName" value="<?= $user['name'] ?>">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="email" type="email" class="form-control" id="Email" value="<?= $user['email'] ?>" readonly>
                                        </div>
                                    </div>





                                    <div class="row mb-3">
                                        <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="phone" type="text" class="form-control" id="Phone" value="(436) 486-3538 x29071">
                                        </div>
                                    </div>



                                    <div class="row mb-3">
                                        <label for="Twitter" class="col-md-4 col-lg-3 col-form-label">Twitter Profile</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="twitter" type="text" class="form-control" id="Twitter" value="https://twitter.com/#">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="Facebook" class="col-md-4 col-lg-3 col-form-label">Facebook Profile</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="facebook" type="text" class="form-control" id="Facebook" value="https://facebook.com/#">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="Instagram" class="col-md-4 col-lg-3 col-form-label">Instagram Profile</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="instagram" type="text" class="form-control" id="Instagram" value="https://instagram.com/#">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="Linkedin" class="col-md-4 col-lg-3 col-form-label">Linkedin Profile</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="linkedin" type="text" class="form-control" id="Linkedin" value="https://linkedin.com/#">
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                    </div>
                                </form><!-- End Profile Edit Form -->

                            </div>


                            <div class="tab-pane fade pt-3" id="profile-change-password">


                                <form action="<?= base_url('tukangin/changepassword'); ?>" method="post">
                                    <div class="form-group mb-3">
                                        <label for="current_password">Password saat ini</label>
                                        <input type="password" class="form-control" id="current_password" name="current_password">
                                        <?= form_error('current_password', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="new_password1">Password baru</label>
                                        <input type="password" class="form-control" id="new_password1" name="new_password1">
                                        <?= form_error('new_password1', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="new_password2">Ulangi Password</label>
                                        <input type="password" class="form-control" id="new_password2" name="new_password2">
                                        <?= form_error('new_password2', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="text-center mb-3">
                                        <button type="submit" class="btn btn-primary"> Ubah Password</button>
                                    </div>
                                </form><!-- End Change Password Form -->

                            </div>

                            <!-- pesanan user  -->
                            <div class="tab-pane fade pt-3" id="profile-pesanan">
                                <?php foreach ($transaksi as $ti) : ?>
                                    <div class="container mt-4">
                                        <!-- Card untuk item pembelian -->
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <!-- Gambar produk -->
                                                    <div class="col-md-2">
                                                        <img src="<?= base_url('assets/img/transaksi/') . $ti['image'] ?>" alt="Produk" class="img-fluid">
                                                    </div>

                                                    <!-- Detail produk -->
                                                    <div class="col-md-8">
                                                        <h6 class="card-title"><?= $ti['nama_jasa'] ?></h6>
                                                        <p class="mb-1"><?= $ti['m_bayar'] ?></p>
                                                        <p class="mb-1">x <?= $ti['jam'] ?> Jam</p>
                                                        <p class="mb-1">x <?= $ti['pekerja'] ?> orang</p>
                                                        <span class="badge bg-success">Bebas Refund</span>
                                                    </div>

                                                    <!-- Harga -->
                                                    <div class="col-md-2 text-end">
                                                        <h5 class="text-danger">Rp. <?= number_format($ti['total_bayar']) ?></h5>
                                                        <p class="text-muted text-decoration-line-through">Rp135.000</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer bg-white border-0">
                                                <div class="d-flex justify-content-between">
                                                    <!-- Status pesanan -->
                                                    <p class="text-muted">Pesanan Sedang diproses</p>

                                                    <a href=""></a>
                                                    <!-- Tombol aksi -->
                                                    <div>
                                                        <a href="<?= base_url('tukangin/services') ?>" class="btn btn-danger">Beli Lagi</a>
                                                        <button class="btn btn-outline-secondary">Cetak Bukti</button>
                                                        <button class="btn btn-outline-secondary">Testimoni</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach ?>
                            </div>

                            <!-- pesanan yang telah di konfirmasi -->
                            <div class="tab-pane fade pt-3" id="profile-pesanan">
                                <?php foreach ($transaksi as $ti) : ?>
                                    <div class="container mt-4">
                                        <!-- Card untuk item pembelian -->
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <!-- Gambar produk -->
                                                    <div class="col-md-2">
                                                        <img src="<?= base_url('assets/img/transaksi/') . $ti['image'] ?>" alt="Produk" class="img-fluid">
                                                    </div>

                                                    <!-- Detail produk -->
                                                    <div class="col-md-8">
                                                        <h6 class="card-title"><?= $ti['nama_jasa'] ?></h6>
                                                        <p class="mb-1"><?= $ti['m_bayar'] ?></p>
                                                        <p class="mb-1">x <?= $ti['jam'] ?> Jam</p>
                                                        <p class="mb-1">x <?= $ti['pekerja'] ?> orang</p>
                                                        <span class="badge bg-success">Bebas Refund</span>
                                                    </div>

                                                    <!-- Harga -->
                                                    <div class="col-md-2 text-end">
                                                        <h5 class="text-danger">Rp. <?= number_format($ti['total_bayar']) ?></h5>
                                                        <p class="text-muted text-decoration-line-through">Rp135.000</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer bg-white border-0">
                                                <div class="d-flex justify-content-between">
                                                    <!-- Status pesanan -->
                                                    <p class="text-muted">Pesanan Sedang diproses</p>

                                                    <a href=""></a>
                                                    <!-- Tombol aksi -->
                                                    <div>
                                                        <a href="<?= base_url('tukangin/services') ?>" class="btn btn-danger">Beli Lagi</a>
                                                        <button class="btn btn-outline-secondary">Cetak Bukti</button>
                                                        <button class="btn btn-outline-secondary">Testimoni</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach ?>
                            </div>

                        </div><!-- End Bordered Tabs -->

                    </div>
                </div>

            </div>
        </div>
    </section>

</main><!-- End #main -->