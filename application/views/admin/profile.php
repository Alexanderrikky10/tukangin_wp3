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

            <section class="section profile">
                <div class="row">
                    <div class="col-xl-4">

                        <div class="card">
                            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                                <img src="<?= base_url('assets/img/profile/') . $user['image'] ?>" alt="Profile" class="rounded-circle">
                                <h2><?= $user['name'] ?></h2>
                                <div class="social-links mt-2">
                                    <a href="<?= $user['x_app'] ?>" class="twitter"><i class="bi bi-twitter"></i></a>
                                    <a href="<?= $user['facebook'] ?>" class="facebook"><i class="bi bi-facebook"></i></a>
                                    <a href="<?= $user['instagram'] ?>" class="instagram"><i class="bi bi-instagram"></i></a>
                                    <a href="<?= $user['linkedin'] ?>" class="linkedin"><i class="bi bi-linkedin"></i></a>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col-xl-8">

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

                                </ul>
                                <div class="tab-content pt-2">

                                    <div class="tab-pane fade show active profile-overview" id="profile-overview">

                                        <h5 class="card-title">Profile Details</h5>

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

                                    <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                                        <!-- Profile Edit Form -->

                                        <form action="<?= base_url('admin/editProfile') ?>" method="post" enctype="multipart/form-data">
                                            <!-- Profile Image -->
                                            <div class="row mb-3">
                                                <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                                                <div class="col-md-8 col-lg-9">
                                                    <img src="<?= base_url('assets/img/profile/') . $user['image'] ?>" alt="Profile">
                                                    <div class="pt-2">
                                                        <input type="file" id="uploadImage" name="profileImage" class="form-control d-none" accept="image/*">
                                                        <!-- Tombol untuk membuka file explorer -->
                                                        <label for="uploadImage" class="btn btn-sm btn-primary" title="Upload new profile image">
                                                            <i class="bi bi-upload"></i>
                                                        </label>
                                                        <a href="<?= base_url('admin/removeImage') ?>" class="btn btn-danger btn-sm" title="Remove my profile image"><i class="bi bi-trash"></i></a>
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


                                    <div class="tab-pane fade pt-3" id="profile-change-password">
                                        <!-- Change Password Form -->
                                        <!-- <form>

                                            <div class="row mb-3">
                                                <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                                                <div class="col-md-8 col-lg-9">
                                                    <input name="password" type="password" class="form-control" id="currentPassword">
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                                                <div class="col-md-8 col-lg-9">
                                                    <input name="newpassword" type="password" class="form-control" id="newPassword">
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                                                <div class="col-md-8 col-lg-9">
                                                    <input name="renewpassword" type="password" class="form-control" id="renewPassword">
                                                </div>
                                            </div>

                                            <div class="text-center">
                                                <button type="submit" class="btn btn-primary">Change Password</button>
                                            </div>
                                        </form> -->
                                        <!-- End Change Password Form -->

                                        <form action="<?= base_url('admin/changepassword'); ?>" method="post">
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
                                        </form>

                                    </div>

                                </div><!-- End Bordered Tabs -->

                            </div>
                        </div>

                    </div>
                </div>
            </section>

        </main><!-- End #main -->