    <main class="main">
        <!-- Page Title -->
        <div class="page-title dark-background" style="background-image: url(<?= base_url('assets/') ?>img/page-title-bg.jpg);">
            <div class="container position-relative">
                <h1>Services</h1>
                <nav class="breadcrumbs">
                    <ol>
                        <li><a href="<?= base_url('tukangin/home') ?>">Home</a></li>
                        <li class="current">Services</li>
                    </ol>
                </nav>
            </div>
        </div><!-- End Page Title -->

        <!-- Services Section -->
        <section id="services" class="services section light-background">

            <div class="container">
                <?= $this->session->flashdata('message'); ?>

                <div class="row gy-4">
                    <?php foreach ($services as $sv) : ?>
                        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                            <div class="service-item  position-relative">
                                <div class="icon">
                                    <i class="<?= $sv['icon'] ?>"></i>
                                </div>
                                <h3><?= $sv['title'] ?></h3>
                                <p><?= $sv['deskripsi'] ?></p>
                                <a href="" data-bs-toggle="modal" data-bs-target="#cekOutModal<?= $sv['id'] ?>" class="readmore stretched-link">Pesan <i class="bi bi-arrow-right"></i></a>
                            </div>
                        </div>

                        <!-- modal cekout -->

                        <div class="modal fade" id="cekOutModal<?= $sv['id'] ?>" tabindex="-1">
                            <div class="modal-dialog modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title"><?= $sv['title'] ?></h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="<?= base_url('tukangin/services'); ?>" method="post" enctype="multipart/form-data">
                                        <div class="modal-body" x-data="{ count: 1, pekerja: 1, harga: <?= $sv['harga'] ?>, 
                                                        get price() { return this.pekerja * this.harga },
                                                        get total() { return this.count * (this.pekerja * this.harga) }
                                                    }">
                                            <div class="row g-4">
                                                <!-- Card Gambar dan Jumlah -->
                                                <div class="col-xl-4 col-lg-6">
                                                    <div class="card h-100 text-center">
                                                        <img src="<?= base_url('assets/img/jasa/') . $sv['img'] ?>" class="card-img-top" alt="Gambar Jasa">
                                                        <div class="card-body">
                                                            <h6 class="mb-2">Harga per Orang</h6>
                                                            <span x-text="rupiah(price)" class="fw-bold d-block mb-3"></span>

                                                            <div class="d-flex justify-content-center align-items-center gap-2">
                                                                <button id="remove" class="btn btn-sm btn-outline-secondary" @click.prevent="if (count > 1) count--">&minus;</button>
                                                                <span x-text="count" class="fw-bold mx-2"></span>
                                                                <input type="hidden" name="jam" id="jam" x-bind:value="count">
                                                                <button id="add" class="btn btn-sm btn-outline-secondary" @click.prevent="if (count < 8) count++">&plus;</button>
                                                            </div>
                                                            <h6 class="mt-3">Jumlah Pekerja</h6>
                                                            <div class="d-flex justify-content-center align-items-center gap-2">
                                                                <button id="remove" class="btn btn-sm btn-outline-secondary" @click.prevent="if (pekerja > 1) pekerja--">&minus;</button>
                                                                <span x-text="pekerja" class="fw-bold mx-2"></span>
                                                                <input type="hidden" name="pekerja" id="pekerja" x-bind:value="pekerja">
                                                                <button id="add" class="btn btn-sm btn-outline-secondary" @click.prevent="if (pekerja < 8) pekerja++">&plus;</button>
                                                            </div>

                                                            <div class="fw-bold mt-4">
                                                                Total Harga: <span x-text="rupiah(total)"></span>
                                                            </div>
                                                            <input type="hidden" name="total_bayar" id="total_bayar" x-bind:value="total">
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Form Informasi -->
                                                <div class="col-xl-8 col-lg-6">
                                                    <h5 class="ms-2">Form Cek Out</h5>
                                                    <div class="card p-3">
                                                        <div class="mb-3">
                                                            <label for="email" class="form-label ms-2">Email</label>
                                                            <input type="email" class="form-control" name="email" id="email" value="<?= $user['email'] ?>" readonly>
                                                            <small class="text-danger"><?= form_error('email') ?></small>
                                                        </div>
                                                        <input type="hidden" name="nama_jasa" id="nama_jasa" value="<?= $sv['title'] ?>">

                                                        <div class="mb-3">
                                                            <label for="name" class="form-label ms-2">Nama</label>
                                                            <input type="text" class="form-control" name="name" id="name" placeholder="Masukan Nama Anda">
                                                            <small class="text-danger"><?= form_error('name') ?></small>
                                                        </div>

                                                        <label for="metode" class="form-label ms-2">Metode Pembayaran</label>
                                                        <div class="form-group row g-2">
                                                            <div class="col-sm-6">
                                                                <select name="metode" id="metode" class="metode-bayar form-select" aria-label="Default select Metode Bayar">
                                                                    <option selected>Pilih pembayaran</option>
                                                                    <?php foreach ($metode as $m) : ?>
                                                                        <option value="<?= $m['id']; ?>" data-rekening="<?= $m['rekening']; ?>">
                                                                            <?= $m['m_bayar']; ?>
                                                                        </option>
                                                                    <?php endforeach; ?>
                                                                </select>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <input type="text" class="rekening-bayar form-control" placeholder="Rekening" readonly>
                                                            </div>
                                                        </div>
                                                        <small class="text-danger"><?= form_error('metode') ?></small>

                                                        <div class="mb-3">
                                                            <label for="alamat" class="form-label ms-2">Alamat</label>
                                                            <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Masukan Alamat Anda">
                                                            <small class="text-danger"><?= form_error('alamat') ?></small>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="nomor" class="form-label ms-2">Nomor Telepon</label>
                                                            <input type="number" class="form-control" name="nomor" id="nomor" placeholder="081234***">
                                                            <small class="text-danger"><?= form_error('nomor') ?></small>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="image" class="form-label ms-2">Upload Bukti</label>
                                                            <input type="file" class="form-control" name="image" id="image">
                                                            <small class="text-danger"><?= form_error('image') ?></small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Order Now</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>



                    <?php endforeach ?>
                    <!-- End Service Item -->
                </div>

            </div>
        </section><!-- /Services Section -->




        <!-- Features Cards Section -->
        <section id="features-cards" class="features-cards section">

            <div class="container">

                <div class="row gy-4">

                    <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                        <h3>Quasi eaque omnis</h3>
                        <p>Eius non minus autem soluta ut ui labore omnis quisquam corrupti autem odit voluptas quos commodi magnam occaecati.</p>
                        <ul class="list-unstyled">
                            <li><i class="bi bi-check2"></i> <span>Ullamco laboris nisi ut aliquip</span></li>
                            <li><i class="bi bi-check2"></i> <span>Duis aute irure dolor in reprehenderit</span></li>
                            <li><i class="bi bi-check2"></i> <span>Ullamco laboris nisi ut aliquip ex ea</span></li>
                        </ul>
                    </div><!-- End feature item-->

                    <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
                        <h3>Et nemo dolores consectetur</h3>
                        <p>Ducimus ea quam et occaecati est. Temporibus in soluta labore voluptates aut. Et sit soluta non repellat sed quia dire plovers tradoria</p>

                        <ul class="list-unstyled">
                            <li><i class="bi bi-check2"></i> <span>Enim temporibus maiores eligendi</span></li>
                            <li><i class="bi bi-check2"></i> <span>Ut maxime ut quibusdam quam qui</span></li>
                            <li><i class="bi bi-check2"></i> <span>Officiis aspernatur in officiis</span></li>
                        </ul>
                    </div><!-- End feature item-->

                    <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
                        <h3>Staque laboriosam modi</h3>
                        <p>Velit eos error et dolor omnis voluptates nobis tenetur sed enim nihil vero qui suscipit ipsum at magni. Ipsa architecto consequatur aliquam</p>
                        <ul class="list-unstyled">
                            <li><i class="bi bi-check2"></i> <span>Quis voluptates laboriosam numquam</span></li>
                            <li><i class="bi bi-check2"></i> <span>Debitis eos est est corrupti</span></li>
                        </ul>
                    </div><!-- End feature item-->

                    <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="400">
                        <h3>Dignissimos suscipit iste</h3>
                        <p>Molestiae occaecati assumenda quia saepe nobis recusandae at dicta ducimus sequi numquam commodi est in consequatur ea magnam quia itaque</p>
                        <ul class="list-unstyled">
                            <li><i class="bi bi-check2"></i> <span>Veritatis qui reprehenderit quis</span></li>
                            <li><i class="bi bi-check2"></i> <span>Accusantium vel numquam sunt minus</span></li>
                            <li><i class="bi bi-check2"></i> <span>Voluptatem pariatur est sationem</span></li>
                        </ul>
                    </div><!-- End feature item-->

                </div>

            </div>

        </section><!-- /Features Cards Section -->



        <!-- Testimonials Section -->
        <section id="testimonials" class="testimonials section">
            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Testimonials</h2>
                <p>
                    Necessitatibus eius consequatur ex aliquid fuga eum quidem sint
                    consectetur velit
                </p>
            </div>
            <!-- End Section Title -->

            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <div class="swiper init-swiper">
                    <script type="application/json" class="swiper-config">
                        {
                            "loop": true,
                            "speed": 600,
                            "autoplay": {
                                "delay": 5000
                            },
                            "slidesPerView": "auto",
                            "pagination": {
                                "el": ".swiper-pagination",
                                "type": "bullets",
                                "clickable": true
                            },
                            "breakpoints": {
                                "320": {
                                    "slidesPerView": 1,
                                    "spaceBetween": 40
                                },
                                "1200": {
                                    "slidesPerView": 2,
                                    "spaceBetween": 20
                                }
                            }
                        }
                    </script>
                    <div class="swiper-wrapper">



                        <!-- End testimonial item -->

                        <?php foreach ($test as $ts) : ?>
                            <div class="swiper-slide">
                                <div class="testimonial-wrap">
                                    <div class="testimonial-item">
                                        <img src="<?= base_url('assets/img/testimonials/') . $ts['img'] ?>" class="testimonial-img" alt="" />
                                        <h3><?= $ts['name_user'] ?></h3>
                                        <h4><?= $ts['jabatan'] ?></h4>
                                        <div class="stars">
                                            <?= $ts['bintang'] ?>
                                        </div>
                                        <p>
                                            <i class="bi bi-quote quote-icon-left"></i>
                                            <span><?= $ts['komentar'] ?></span>
                                            <i class="bi bi-quote quote-icon-right"></i>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach ?>
                        <!-- End testimonial item -->
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </section>
        <!-- /Testimonials Section -->

    </main>