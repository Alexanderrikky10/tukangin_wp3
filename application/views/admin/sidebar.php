        <!-- ======= Sidebar ======= -->
        <aside id="sidebar" class="sidebar">

            <ul class="sidebar-nav" id="sidebar-nav">

                <?php foreach ($menu as $m) : ?>
                    <li class="nav-item">
                        <a class="nav-link <?php if ($title == $m['name_menu']) {
                                                echo "";
                                            } else {
                                                echo "collapsed";
                                            }  ?>" href="<?= base_url($m['url']) ?>">
                            <i class="<?= $m['icon']; ?>"></i>
                            <span><?= $m['name_menu']; ?></span>

                        </a>
                    </li>

                <?php endforeach ?>
                <!-- End Profile Page Nav -->


            </ul>

        </aside><!-- End Sidebar-->