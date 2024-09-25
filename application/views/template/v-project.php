    <main class="main">

        <!-- Page Title -->
        <div class="page-title dark-background" style="background-image: url(<?= base_url('assets/') ?>img/page-title-bg.jpg);">
            <div class="container position-relative">
                <h1>Projects</h1>
                <nav class="breadcrumbs">
                    <ol>
                        <li><a href="<?= base_url('tukangin/home') ?>">Home</a></li>
                        <li class="current">Projects</li>
                    </ol>
                </nav>
            </div>
        </div><!-- End Page Title -->

        <!-- Projects Section -->
        <section id="projects" class="projects section">

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

        </section><!-- /Projects Section -->

    </main>