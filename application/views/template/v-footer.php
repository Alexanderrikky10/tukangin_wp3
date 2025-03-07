    <footer id="footer" class="footer dark-background">

        <div class="container footer-top">
            <div class="row gy-4">
                <div class="col-lg-4 col-md-6 footer-about">
                    <a href="index.html" class="logo d-flex align-items-center">
                        <span class="sitename">Tukangin</span>
                    </a>
                    <div class="footer-contact pt-3">
                        <p>Jalan Perdana No 51, ponrtianak Tengra</p>
                        <p>New York, NY 535022</p>
                        <p class="mt-3"><strong>Phone:</strong> <span>+62 8134 66990 80</span></p>
                        <p><strong>Email:</strong> <span>alexanderrikky10@gmail.com</span></p>
                    </div>
                    <div class="social-links d-flex mt-4">
                        <a href=""><i class="bi bi-twitter-x"></i></a>
                        <a href=""><i class="bi bi-facebook"></i></a>
                        <a href=""><i class="bi bi-instagram"></i></a>
                        <a href=""><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>

                <div class="col-lg-2 col-md-3 footer-links">
                    <h4>Useful Links</h4>
                    <ul>
                        <li><a href="<?= base_url('tukangin') ?>">Home</a></li>
                        <li><a href="<?= base_url('tukangin/services') ?>">Services</a></li>
                        <li><a href="#testimonials">Testimonials</a></li>
                        <li><a href="<?= base_url('tukangin/about') ?>">Story</a></li>
                    </ul>
                </div>


                <div class="col-lg-2 col-md-3 footer-links">
                    <h4>Customer Support</h4>
                    <ul>
                        <li><a href="<?= base_url('tukangin/contact') ?>">Contact Us</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Refund Policy</a></li>
                        <li><a href="#">User Guide</a></li>
                    </ul>
                </div>

                <div class="col-lg-2 col-md-3 footer-links">
                    <h4>Call to Action</h4>
                    <ul>
                        <li><a href="#">Get a Quote</a></li>
                        <li><a href="#">Book a Service </a></li>
                    </ul>
                </div>

            </div>
        </div>

        <div class="container copyright text-center mt-4">
            <p>© <span>Copyright</span> <strong class="px-1 sitename">Tukangin</strong> <span>All Rights Reserved</span></p>
            <div class="credits">
                Designed by <a href="#">Tukangin.com</a>
            </div>
        </div>

    </footer>




    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="<?= base_url('assets/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('assets/') ?>vendor/php-email-form/validate.js"></script>
    <script src="<?= base_url('assets/') ?>vendor/aos/aos.js"></script>
    <script src="<?= base_url('assets/') ?>vendor/glightbox/js/glightbox.min.js"></script>
    <script src="<?= base_url('assets/') ?>vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
    <script src="<?= base_url('assets/') ?>vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="<?= base_url('assets/') ?>vendor/swiper/swiper-bundle.min.js"></script>
    <script src="<?= base_url('assets/') ?>vendor/purecounter/purecounter_vanilla.js"></script>
    <script script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.alert-message').alert().delay(2500).slideUp('slow');
        });
    </script>


    <!-- menampilkan rekening di menu services -->

    <script>
        $(document).ready(function() {
            // Event handler untuk dropdown metode pembayaran pada semua elemen dengan kelas 'metode-bayar'
            $('.metode-bayar').on('change', function() {
                // Ambil rekening dari option yang dipilih
                var rekening = $(this).find(':selected').data('rekening');
                // Cari input rekening yang berada di dalam satu div/form-group yang sama
                $(this).closest('.form-group').find('.rekening-bayar').val(rekening);
            });
        });
    </script>
    <!-- Main JS File -->
    <script src="<?= base_url('assets/') ?>js/main.js"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
    <script>
        const rupiah = (Number) => {
            return new Intl.NumberFormat("id-ID", {
                style: "currency",
                currency: "IDR",
                minimumFractionDigits: 0,
            }).format(Number);
        };
    </script>
    </body>

    </html>