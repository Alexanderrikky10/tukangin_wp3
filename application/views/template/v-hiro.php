<main class="main">
	<!-- Menampilkan Flashdata jika ada -->
	<!-- Hero Section -->
	<section id="hero" class="hero section dark-background">
		<div class="info d-flex align-items-center">
			<div class="container">
				<div class="text-center"><?= $this->session->flashdata('message'); ?></div>
				<div class="row justify-content-center" data-aos="fade-up" data-aos-delay="100">
					<div class="col-lg-6 text-center">
						<h2>Welcome to Tukangin</h2>
						<p>
							Selamat datang di dalam platform tukangin penyedia jasa pertukangan berbasis web, siap melayani setiap keluhan anda di dalam pembangunan inprastruktur
						</p>
						<a href="<?= $this->session->userdata('email') ? base_url('tukangin/services') : base_url('auth') ?>" class="btn-get-started">Get Started</a>

					</div>
				</div>
			</div>
		</div>

		<div id="hero-carousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
			<div class="carousel-item">
				<img src="<?= base_url('assets/') ?>img/hero-carousel/hero-carousel-1.jpg" alt="" />
			</div>

			<div class="carousel-item active">
				<img src="<?= base_url('assets/') ?>img/hero-carousel/hero-carousel-2.jpg" alt="" />
			</div>

			<div class="carousel-item">
				<img src="<?= base_url('assets/') ?>img/hero-carousel/hero-carousel-3.jpg" alt="" />
			</div>

			<div class="carousel-item">
				<img src="<?= base_url('assets/') ?>img/hero-carousel/hero-carousel-4.jpg" alt="" />
			</div>

			<div class="carousel-item">
				<img src="<?= base_url('assets/') ?>img/hero-carousel/hero-carousel-5.jpg" alt="" />
			</div>

			<a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev">
				<span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
			</a>

			<a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next">
				<span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
			</a>
		</div>
	</section>
	<!-- /Hero Section -->



	<!-- Constructions Section -->
	<section id="constructions" class="constructions section">
		<!-- Section Title -->
		<div class="container section-title" data-aos="fade-up">
			<h2>Tukangin</h2>
			<p>
				Tentukan Jasa sesuai dengan kebutuhan Anda.
			</p>
		</div>
		<!-- End Section Title -->

		<div class="container">
			<div class="row gy-4">
				<div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
					<div class="card-item">
						<div class="row">
							<div class="col-xl-5">
								<div class="card-bg">
									<img src="<?= base_url('assets/') ?>img/constructions-1.jpg" alt="" />
								</div>
							</div>
							<div class="col-xl-7 d-flex align-items-center">
								<div class="card-body">
									<h4 class="card-title">Solusi Tepat untuk Pertukangan dan Desain Rumah Anda.</h4>
									<p>
										Kami menyediakan layanan pertukangan dan desain rumah yang profesional. Mulai dari perbaikan kecil hingga renovasi besar, tim kami siap membantu menciptakan hunian yang nyaman dan estetik. Dengan pendekatan yang teliti, kami pastikan hasil terbaik untuk setiap proyek Anda.
									</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- End Card Item -->

				<div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
					<div class="card-item">
						<div class="row">
							<div class="col-xl-5">
								<div class="card-bg">
									<img src="<?= base_url('assets/') ?>img/constructions-2.jpg" alt="" />
								</div>
							</div>
							<div class="col-xl-7 d-flex align-items-center">
								<div class="card-body">
									<h4 class="card-title">Profesional dan Terpercaya</h4>
									<p>
										Dengan tenaga ahli yang berpengalaman, kami menyediakan layanan pertukangan yang cepat, aman, dan terpercaya. Jangan ragu untuk mengandalkan kami dalam berbagai kebutuhan konstruksi dan perbaikan. Kami hadir untuk membantu menciptakan bangunan yang kuat dan tahan lama..
									</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- End Card Item -->

				<div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
					<div class="card-item">
						<div class="row">
							<div class="col-xl-5">
								<div class="card-bg">
									<img src="<?= base_url('assets/') ?>img/constructions-3.jpg" alt="" />
								</div>
							</div>
							<div class="col-xl-7 d-flex align-items-center">
								<div class="card-body">
									<h4 class="card-title">Error beatae dolor inventore aut</h4>
									<p>
										Dicta porro nobis. Velit cum in. Nesciunt dignissimos enim
										molestiae facilis numquam quae quaerat ipsam omnis. Neque
										debitis ipsum at architecto officia laboriosam odit. Ut sunt
										temporibus nulla culpa.
									</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- End Card Item -->

				<div class="col-lg-6" data-aos="fade-up" data-aos-delay="400">
					<div class="card-item">
						<div class="row">
							<div class="col-xl-5">
								<div class="card-bg">
									<img src="<?= base_url('assets/') ?>img/constructions-4.jpg" alt="" />
								</div>
							</div>
							<div class="col-xl-7 d-flex align-items-center">
								<div class="card-body">
									<h4 class="card-title">Expedita voluptas ut ut nesciunt</h4>
									<p>
										Aut est quidem doloremque voluptatem magnam quis excepturi
										vero quia. Eum eos doloremque architecto illo at beatae
										dolore. Fugiat suscipit et sint ratione dolores. Aut aliquid
										ea dolores libero nobis.
									</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- End Card Item -->
			</div>
		</div>
	</section>
	<!-- /Constructions Section -->


	<!-- Features Section -->
	<section id="features" class="features section">
		<div class="container">
			<ul class="nav nav-tabs row g-2 d-flex" data-aos="fade-up" data-aos-delay="100" role="tablist">
				<li class="nav-item col-3" role="presentation">
					<a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#features-tab-1" aria-selected="true" role="tab">
						<h4>Modisit</h4>
					</a>
				</li>
				<!-- End tab nav item -->

				<li class="nav-item col-3" role="presentation">
					<a class="nav-link" data-bs-toggle="tab" data-bs-target="#features-tab-2" aria-selected="false" tabindex="-1" role="tab">
						<h4>Praesenti</h4>
					</a><!-- End tab nav item -->
				</li>
				<li class="nav-item col-3" role="presentation">
					<a class="nav-link" data-bs-toggle="tab" data-bs-target="#features-tab-3" aria-selected="false" tabindex="-1" role="tab">
						<h4>Explica</h4>
					</a>
				</li>
				<!-- End tab nav item -->

				<li class="nav-item col-3" role="presentation">
					<a class="nav-link" data-bs-toggle="tab" data-bs-target="#features-tab-4" aria-selected="false" tabindex="-1" role="tab">
						<h4>Nostrum</h4>
					</a>
				</li>
				<!-- End tab nav item -->
			</ul>

			<div class="tab-content" data-aos="fade-up" data-aos-delay="200">
				<div class="tab-pane fade active show" id="features-tab-1" role="tabpanel">
					<div class="row">
						<div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0 d-flex flex-column justify-content-center">
							<h3>Voluptatem dignissimos provident</h3>
							<p class="fst-italic">
								Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
								eiusmod tempor incididunt ut labore et dolore magna aliqua.
							</p>
							<ul>
								<li>
									<i class="bi bi-check2-all"></i>
									<span>Ullamco laboris nisi ut aliquip ex ea commodo
										consequat.</span>
								</li>
								<li>
									<i class="bi bi-check2-all"></i>
									<span>Duis aute irure dolor in reprehenderit in voluptate
										velit.</span>
								</li>
								<li>
									<i class="bi bi-check2-all"></i>
									<span>Ullamco laboris nisi ut aliquip ex ea commodo consequat.
										Duis aute irure dolor in reprehenderit in voluptate trideta
										storacalaperda mastiro dolore eu fugiat nulla
										pariatur.</span>
									<!-- jangan lupa di gunkan fungtion baru  -->
								</li>
							</ul>
						</div>
						<div class="col-lg-6 order-1 order-lg-2 text-center">
							<img src="<?= base_url('assets/') ?>img/features-1.jpg" alt="" class="img-fluid" />
						</div>
					</div>
				</div>
				<!-- End tab content item -->

				<div class="tab-pane fade" id="features-tab-2" role="tabpanel">
					<div class="row">
						<div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0 d-flex flex-column justify-content-center">
							<h3>Neque exercitationem debitis</h3>
							<p class="fst-italic">
								Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
								eiusmod tempor incididunt ut labore et dolore magna aliqua.
							</p>
							<ul>
								<li>
									<i class="bi bi-check2-all"></i>
									<span>Ullamco laboris nisi ut aliquip ex ea commodo
										consequat.</span>
								</li>
								<li>
									<i class="bi bi-check2-all"></i>
									<span>Duis aute irure dolor in reprehenderit in voluptate
										velit.</span>
								</li>
								<li>
									<i class="bi bi-check2-all"></i>
									<span>Provident mollitia neque rerum asperiores dolores quos qui
										a. Ipsum neque dolor voluptate nisi sed.</span>
								</li>
								<li>
									<i class="bi bi-check2-all"></i>
									<span>Ullamco laboris nisi ut aliquip ex ea commodo consequat.
										Duis aute irure dolor in reprehenderit in voluptate trideta
										storacalaperda mastiro dolore eu fugiat nulla
										pariatur.</span>
								</li>
							</ul>
						</div>
						<div class="col-lg-6 order-1 order-lg-2 text-center">
							<img src="<?= base_url('assets/') ?>img/features-2.jpg" alt="" class="img-fluid" />
						</div>
					</div>
				</div>
				<!-- End tab content item -->

				<div class="tab-pane fade" id="features-tab-3" role="tabpanel">
					<div class="row">
						<div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0 d-flex flex-column justify-content-center">
							<h3>Voluptatibus commodi accusamu</h3>
							<ul>
								<li>
									<i class="bi bi-check2-all"></i>
									<span>Ullamco laboris nisi ut aliquip ex ea commodo
										consequat.</span>
								</li>
								<li>
									<i class="bi bi-check2-all"></i>
									<span>Duis aute irure dolor in reprehenderit in voluptate
										velit.</span>
								</li>
								<li>
									<i class="bi bi-check2-all"></i>
									<span>Provident mollitia neque rerum asperiores dolores quos qui
										a. Ipsum neque dolor voluptate nisi sed.</span>
								</li>
							</ul>
							<p class="fst-italic">
								Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
								eiusmod tempor incididunt ut labore et dolore magna aliqua.
							</p>
						</div>
						<div class="col-lg-6 order-1 order-lg-2 text-center">
							<img src="<?= base_url('assets/') ?>img/features-3.jpg" alt="" class="img-fluid" />
						</div>
					</div>
				</div>
				<!-- End tab content item -->

				<div class="tab-pane fade" id="features-tab-4" role="tabpanel">
					<div class="row">
						<div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0 d-flex flex-column justify-content-center">
							<h3>Omnis fugiat ea explicabo sunt</h3>
							<p class="fst-italic">
								Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
								eiusmod tempor incididunt ut labore et dolore magna aliqua.
							</p>
							<ul>
								<li>
									<i class="bi bi-check2-all"></i>
									<span>Ullamco laboris nisi ut aliquip ex ea commodo
										consequat.</span>
								</li>
								<li>
									<i class="bi bi-check2-all"></i>
									<span>Duis aute irure dolor in reprehenderit in voluptate
										velit.</span>
								</li>
								<li>
									<i class="bi bi-check2-all"></i>
									<span>Ullamco laboris nisi ut aliquip ex ea commodo consequat.
										Duis aute irure dolor in reprehenderit in voluptate trideta
										storacalaperda mastiro dolore eu fugiat nulla
										pariatur.</span>
								</li>
							</ul>
						</div>
						<div class="col-lg-6 order-1 order-lg-2 text-center">
							<img src="<?= base_url('assets/') ?>img/features-4.jpg" alt="" class="img-fluid" />
						</div>
					</div>
				</div>
				<!-- End tab content item -->
			</div>
		</div>
	</section>
	<!-- /Features Section -->

	<!-- Projects Section -->
	<section id="projects" class="projects section">
		<!-- Section Title -->
		<div class="container section-title" data-aos="fade-up">
			<h2>Projects</h2>
			<p>
				Necessitatibus eius consequatur ex aliquid fuga eum quidem sint
				consectetur velit
			</p>
		</div>
		<!-- End Section Title -->

		<div class="container">

			<div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

				<ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
					<li data-filter="*" class="filter-active">All</li>
					<li data-filter=".filter-remodeling">Remodeling</li>
					<li data-filter=".filter-construction">Construction</li>
					<li data-filter=".filter-repairs">Repairs</li>
					<li data-filter=".filter-design">Design</li>
				</ul><!-- End Portfolio Filters -->

				<div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">

					<?php foreach ($project as $pj) : ?>

						<div class="col-lg-4 col-md-6 portfolio-item isotope-item <?= $pj['kategori_project'] ?> ">
							<div class="portfolio-content h-100">
								<img src="<?= base_url('assets/img/projects/') . $pj['img'] ?>" class="img-fluid" alt="">
								<div class="portfolio-info">
									<h4><?= $pj['title_project'] ?></h4>
									<p><?= $pj['desk_project'] ?></p>
									<a href="<?= base_url('assets/img/projects/') . $pj['img'] ?>" title="<?= $pj['title_project'] ?>" data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
									<a href="" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
								</div>
							</div>
						</div>
					<?php endforeach ?>

				</div><!-- End Portfolio Container -->

			</div>

		</div>

	</section>
	<!-- /Projects Section -->

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
									<img src="<?= base_url('assets/img/profile/') . $ts['img'] ?>" class="testimonial-img" alt="" />
									<h3><?= $ts['name_user'] ?></h3>
									<h4><?= $ts['jabatan_user'] ?></h4>
									<div class="stars">
										<?= $ts['jumlah_bintang'] ?>
									</div>
									<p>
										<i class="bi bi-quote quote-icon-left"></i>
										<span><?= $ts['komentar'] ?></span>
										<i class="bi bi-quote quote-icon-right"></i>
									</p>
								</div>
							</div>
						</div>
					<?php endforeach; ?>

					<!-- End testimonial item -->
				</div>
				<div class="swiper-pagination"></div>
			</div>
		</div>
	</section>
	<!-- /Testimonials Section -->

	<!-- Recent Blog Posts Section -->
	<section id="recent-blog-posts" class="recent-blog-posts section">
		<!-- Section Title -->
		<div class="container section-title" data-aos="fade-up">
			<h2>Recent Blog Posts</h2>
			<p>
				Necessitatibus eius consequatur ex aliquid fuga eum quidem sint
				consectetur velit
			</p>
		</div>
		<!-- End Section Title -->

		<div class="container">
			<div class="row gy-5">
				<div class="col-xl-4 col-md-6">
					<div class="post-item position-relative h-100" data-aos="fade-up" data-aos-delay="100">
						<div class="post-img position-relative overflow-hidden">
							<img src="<?= base_url('assets/') ?>img/blog/blog-1.jpg" class="img-fluid" alt="" />
							<span class="post-date">December 12</span>
						</div>

						<div class="post-content d-flex flex-column">
							<h3 class="post-title">
								Eum ad dolor et. Autem aut fugiat debitis
							</h3>

							<div class="meta d-flex align-items-center">
								<div class="d-flex align-items-center">
									<i class="bi bi-person"></i>
									<span class="ps-2">Julia Parker</span>
								</div>
								<span class="px-3 text-black-50">/</span>
								<div class="d-flex align-items-center">
									<i class="bi bi-folder2"></i>
									<span class="ps-2">Politics</span>
								</div>
							</div>

							<hr />

							<a href="blog-details.html" class="readmore stretched-link"><span>Read More</span><i class="bi bi-arrow-right"></i></a>
						</div>
					</div>
				</div>
				<!-- End post item -->

				<div class="col-xl-4 col-md-6">
					<div class="post-item position-relative h-100" data-aos="fade-up" data-aos-delay="200">
						<div class="post-img position-relative overflow-hidden">
							<img src="<?= base_url('assets/') ?>img/blog/blog-2.jpg" class="img-fluid" alt="" />
							<span class="post-date">July 17</span>
						</div>

						<div class="post-content d-flex flex-column">
							<h3 class="post-title">
								Et repellendus molestiae qui est sed omnis
							</h3>

							<div class="meta d-flex align-items-center">
								<div class="d-flex align-items-center">
									<i class="bi bi-person"></i>
									<span class="ps-2">Mario Douglas</span>
								</div>
								<span class="px-3 text-black-50">/</span>
								<div class="d-flex align-items-center">
									<i class="bi bi-folder2"></i> <span class="ps-2">Sports</span>
								</div>
							</div>

							<hr />

							<a href="blog-details.html" class="readmore stretched-link"><span>Read More</span><i class="bi bi-arrow-right"></i></a>
						</div>
					</div>
				</div>
				<!-- End post item -->

				<div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
					<div class="post-item position-relative h-100">
						<div class="post-img position-relative overflow-hidden">
							<img src="<?= base_url('assets/') ?>img/blog/blog-3.jpg" class="img-fluid" alt="" />
							<span class="post-date">September 05</span>
						</div>

						<div class="post-content d-flex flex-column">
							<h3 class="post-title">
								Quia assumenda est et veritati tirana ploder
							</h3>

							<div class="meta d-flex align-items-center">
								<div class="d-flex align-items-center">
									<i class="bi bi-person"></i>
									<span class="ps-2">Lisa Hunter</span>
								</div>
								<span class="px-3 text-black-50">/</span>
								<div class="d-flex align-items-center">
									<i class="bi bi-folder2"></i>
									<span class="ps-2">Economics</span>
								</div>
							</div>

							<hr />

							<a href="blog-details.html" class="readmore stretched-link"><span>Read More</span><i class="bi bi-arrow-right"></i></a>
						</div>
					</div>
				</div>
				<!-- End post item -->
			</div>
		</div>
	</section>
	<!-- /Recent Blog Posts Section -->
</main>