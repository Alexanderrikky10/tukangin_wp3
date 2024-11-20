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
                <div class="card shadow-sm border-0">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                        <!-- Profile Image -->
                        <img src="<?= base_url('assets/img/profile/') . $user['image'] ?>"
                            alt="Profile"
                            class="rounded-circle border"
                            style="width: 150px; height: 150px; object-fit: cover;">

                        <!-- User Name -->
                        <h2 class="mt-3 mb-1"><?= $user['name'] ?></h2>

                        <!-- Social Links -->
                        <div class="social-links mt-2 d-flex justify-content-center">
                            <a href="<?= $user['x_app'] ?>" class="twitter text-warning mx-2" target="_blank">
                                <i class="bi bi-twitter fs-4"></i>
                            </a>
                            <a href="<?= $user['facebook'] ?>" class="facebook text-warning mx-2" target="_blank">
                                <i class="bi bi-facebook fs-4"></i>
                            </a>
                            <a href="<?= $user['instagram'] ?>" class="instagram text-warning mx-2" target="_blank">
                                <i class="bi bi-instagram fs-4"></i>
                            </a>
                            <a href="<?= $user['linkedin'] ?>" class="linkedin text-warning mx-2" target="_blank">
                                <i class="bi bi-linkedin fs-4"></i>
                            </a>
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
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-pesanan-user">Pesanan Anda</button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-pesanan-selesai">Pesanan selesai</button>
                            </li>

                        </ul>
                        <div class="tab-content pt-2">

                            <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                <!-- Profile Overview Card -->
                                <div class="card shadow-sm">
                                    <div class="card-body">
                                        <!-- Profile Details Rows -->
                                        <div class="row mb-3">
                                            <div class="col-lg-3 col-md-4 label fw-bold">Full Name</div>
                                            <div class="col-lg-9 col-md-8"><?= $user['name'] ?></div>
                                        </div>
                                        <hr>
                                        <div class="row mb-3">
                                            <div class="col-lg-3 col-md-4 label fw-bold">Address</div>
                                            <div class="col-lg-9 col-md-8"><?= $user['alamat'] ?></div>
                                        </div>
                                        <hr>
                                        <div class="row mb-3">
                                            <div class="col-lg-3 col-md-4 label fw-bold">Phone</div>
                                            <div class="col-lg-9 col-md-8"><?= $user['tlp'] ?></div>
                                        </div>
                                        <hr>
                                        <div class="row mb-3">
                                            <div class="col-lg-3 col-md-4 label fw-bold">Email</div>
                                            <div class="col-lg-9 col-md-8"><?= $user['email'] ?></div>
                                        </div>
                                    </div>
                                </div><!-- End Profile Overview Card -->
                            </div>


                            <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                                <!-- Profile Edit Card -->
                                <div class="card">
                                    <div class="card-body">
                                        <!-- Profile Edit Form -->
                                        <form action="<?= base_url('user/changeProfile') ?>" method="post" enctype="multipart/form-data">
                                            <!-- Profile Image -->
                                            <div class="row mb-4">
                                                <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                                                <div class="col-md-8 col-lg-9 text-center">
                                                    <img src="<?= base_url('assets/img/profile/') . $user['image'] ?>"
                                                        alt="Profile"
                                                        class="rounded-circle mb-3"
                                                        style="width: 150px; height: 150px; object-fit: cover;">

                                                    <div class="pt-2">
                                                        <!-- Input File -->
                                                        <input type="file" id="uploadImage" name="profileImage" class="form-control d-none" accept="image/*">
                                                        <!-- Tombol untuk membuka file explorer -->
                                                        <label for="uploadImage" class="btn btn-sm btn-primary" title="Upload new profile image">
                                                            <i class="bi bi-upload"></i> Upload
                                                        </label>
                                                        <a href="<?= base_url('tukangin/removeImage') ?>" class="btn btn-sm btn-danger" title="Remove my profile image">
                                                            <i class="bi bi-trash"></i> Remove
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Full Name -->
                                            <div class="row mb-3">
                                                <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                                                <div class="col-md-8 col-lg-9">
                                                    <input name="fullName" type="text" class="form-control" id="fullName" value="<?= $user['name'] ?>">
                                                </div>
                                            </div>

                                            <!-- Email -->
                                            <div class="row mb-3">
                                                <label for="email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                                                <div class="col-md-8 col-lg-9">
                                                    <input name="email" type="email" class="form-control" id="email" value="<?= $user['email'] ?>" readonly>
                                                </div>
                                            </div>

                                            <!-- Phone -->
                                            <div class="row mb-3">
                                                <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                                                <div class="col-md-8 col-lg-9">
                                                    <input name="phone" type="text" class="form-control" id="Phone" value="<?= $user['tlp'] ?>">
                                                </div>
                                            </div>

                                            <!-- Social Profiles -->
                                            <div class="row mb-3">
                                                <label for="Twitter" class="col-md-4 col-lg-3 col-form-label">Twitter Profile</label>
                                                <div class="col-md-8 col-lg-9">
                                                    <input name="twitter" type="text" class="form-control" id="Twitter" value="<?= $user['x_app'] ?>">
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <label for="Facebook" class="col-md-4 col-lg-3 col-form-label">Facebook Profile</label>
                                                <div class="col-md-8 col-lg-9">
                                                    <input name="facebook" type="text" class="form-control" id="Facebook" value="<?= $user['facebook'] ?>">
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <label for="Instagram" class="col-md-4 col-lg-3 col-form-label">Instagram Profile</label>
                                                <div class="col-md-8 col-lg-9">
                                                    <input name="instagram" type="text" class="form-control" id="Instagram" value="<?= $user['instagram'] ?>">
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <label for="Linkedin" class="col-md-4 col-lg-3 col-form-label">Linkedin Profile</label>
                                                <div class="col-md-8 col-lg-9">
                                                    <input name="linkedin" type="text" class="form-control" id="Linkedin" value="<?= $user['linkedin'] ?>">
                                                </div>
                                            </div>

                                            <!-- Submit Button -->
                                            <div class="text-center">
                                                <button type="submit" class="btn btn-primary">Save Changes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div><!-- End Profile Edit Card -->

                            </div>



                            <div class="tab-pane fade pt-3" id="profile-change-password">


                                <form action="<?= base_url('user/changepassword'); ?>" method="post">
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

                            <!-- pesanan  -->
                            <div class="tab-pane fade pt-3" id="profile-pesanan-user">
                                <?php if (!empty($transaksi)): ?>
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
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-footer bg-white border-0">
                                                    <div class="d-flex justify-content-between">
                                                        <!-- Status pesanan -->
                                                        <p class="text-muted">Sedang di Proses</p>

                                                        <!-- Tombol aksi -->
                                                        <div>
                                                            <a href="<?= base_url('tukangin/services') ?>" class="btn btn-danger">Beli Lagi</a>
                                                            <button class="btn btn-outline-secondary">Cetak Bukti</button>
                                                            <a class="btn btn-outline-secondary" href="">Batalkan</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach ?>
                                <?php else: ?>
                                    <p>Tidak ada transaksi saat ini.</p>
                                <?php endif ?>
                            </div>

                            <!-- pesanan selesai  -->
                            <div class="tab-pane fade pt-3" id="profile-pesanan-selesai">
                                <?php if (!empty($transaksiSelesai)): ?>
                                    <?php foreach ($transaksiSelesai as $ts) : ?>
                                        <div class="container mt-4">
                                            <!-- Card untuk item pembelian -->
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <!-- Gambar produk -->
                                                        <div class="col-md-2">
                                                            <img src="<?= base_url('assets/img/transaksi/') . $ts['img'] ?>" alt="Produk" class="img-fluid">
                                                        </div>

                                                        <!-- Detail produk -->
                                                        <div class="col-md-8">
                                                            <h6 class="card-title"><?= $ts['nama_jasa'] ?></h6>
                                                            <p class="mb-1"><?= $ts['m_bayar'] ?></p>
                                                            <p class="mb-1">x <?= $ts['ttl_jam'] ?> Jam</p>
                                                            <p class="mb-1">x <?= $ts['pekerja'] ?> orang</p>
                                                            <p class="mb-1 ">No Transaksi <?= $ts['no_transaksi']; ?></p>
                                                            <span class="badge bg-success"><?= $ts['status']; ?></span>
                                                        </div>

                                                        <!-- Harga -->
                                                        <div class="col-md-2 text-end ">
                                                            <div class="d-flex">
                                                                <h5 class="text-danger text-nowrap ">
                                                                    Rp. <?= number_format($ts['ttl_bayar']); ?>
                                                                </h5>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="card-footer bg-white border-0">
                                                    <div class="d-flex justify-content-between">
                                                        <!-- Status pesanan -->
                                                        <p class="text-muted">Semoga Memuaskan</p>

                                                        <!-- Tombol aksi -->
                                                        <div>
                                                            <a href="<?= base_url('tukangin/services') ?>" class="btn btn-danger">Beli Lagi</a>

                                                            <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#testimonimodal<?= $ts['no_transaksi'] ?>">Testimoni</button>

                                                            <div class="modal fade" id="testimonimodal<?= $ts['no_transaksi'] ?>" tabindex="-1">
                                                                <div class="modal-dialog modal-xl">
                                                                    <div class="modal-content">
                                                                        <!-- Modal Header -->
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title">Testimoni</h5>
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                        </div>

                                                                        <!-- Modal Body -->
                                                                        <form action="<?= base_url('user/tambahTest') ?>" method="post">
                                                                            <div class="modal-body">
                                                                                <div class="row align-items-center">
                                                                                    <!-- Profile Image Section -->
                                                                                    <div class="col-xl-4 p-3">
                                                                                        <div class="card" style="width: 100%;">
                                                                                            <img src="<?= base_url('assets/img/profile/') . $user['image'] ?>"
                                                                                                alt="User Image" class="card-img-top">
                                                                                        </div>
                                                                                    </div>

                                                                                    <!-- Form Information Section -->

                                                                                    <div class="col-xl-8 p-3">
                                                                                        <h5 class="ms-3">Testimoni</h5>
                                                                                        <div class="card p-3">
                                                                                            <!-- Email -->
                                                                                            <div class="mb-3">
                                                                                                <label for="email" class="form-label">Email address</label>
                                                                                                <input type="email" class="form-control" name="email" id="email"
                                                                                                    value="<?= $user['email'] ?>" readonly>
                                                                                            </div>
                                                                                            <!-- Full Name -->
                                                                                            <div class="mb-3">
                                                                                                <label for="name" class="form-label">Full Name</label>
                                                                                                <input type="text" class="form-control" name="name" id="name"
                                                                                                    value="<?= $user['name'] ?>" readonly>
                                                                                            </div>
                                                                                            <!-- Jabatan dan bintang -->
                                                                                            <div class="form-group row g-2">
                                                                                                <div class="col-sm-6">
                                                                                                    <label for="metode" class="form-label ms-2">jabatan</label>
                                                                                                    <select name="jabatan" id="jabatan" class="jabatan form-select" aria-label="Pilih sesuai jabatan anda">
                                                                                                        <option selected>Pilih Jabatan</option>
                                                                                                        <?php foreach ($jabatan as $j) : ?>
                                                                                                            <option value="<?= $j['id_jabatan']; ?>">
                                                                                                                <?= $j['jabatan']; ?>
                                                                                                            </option>
                                                                                                        <?php endforeach; ?>
                                                                                                    </select>
                                                                                                </div>
                                                                                                <div class="col-sm-6">
                                                                                                    <label for="metode" class="form-label ms-2">Bintang</label>
                                                                                                    <select name="bintang" id="bintang" class="bintang form-select" aria-label="Pilih jumlah bintang">
                                                                                                        <option selected>Pilih jumlah bintang</option>
                                                                                                        <?php foreach ($bintang as $b) : ?>
                                                                                                            <option value="<?= $b['id_bintang']; ?>">
                                                                                                                <?= $b['bintang']; ?>
                                                                                                            </option>
                                                                                                        <?php endforeach; ?>
                                                                                                    </select>
                                                                                                </div>
                                                                                            </div>
                                                                                            <!-- Testimoni -->
                                                                                            <div class="mb-3">
                                                                                                <label for="deskripsi" class="form-label">Testimoni</label>
                                                                                                <textarea class="form-control" name="deskripsi" id="deskripsi" rows="4"
                                                                                                    placeholder="Tuliskan testimoni Anda di sini..."></textarea>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <!-- Modal Footer -->
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                                <button type="button" class="btn btn-primary">Save changes</button>
                                                                            </div>
                                                                        </form>


                                                                    </div>
                                                                </div>
                                                            </div>



                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach ?>
                                <?php else: ?>
                                    <p>Tidak ada transaksi yang di konfimasi.</p>
                                <?php endif ?>
                            </div>

                        </div><!-- End Bordered Tabs -->

                    </div>
                </div>

            </div>
        </div>
    </section>

</main><!-- End #main -->