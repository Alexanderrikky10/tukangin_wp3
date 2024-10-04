        <!-- ======= Sidebar ======= -->
        <aside id="sidebar" class="sidebar">

            <ul class="sidebar-nav" id="sidebar-nav">

                <!-- <li class="nav-heading">Dashboard</li>
                <li class="nav-item">
                    <a class="nav-link <?php if ($title == 'Dashboard') {
                                            echo "";
                                        } else {
                                            echo "collapsed";
                                        }  ?> " href="<?= base_url('admin') ?>">
                        <i class="bi bi-grid"></i>
                        <span>Dashboard</span>
                    </a>
                </li> -->
                <!-- End Dashboard Nav -->


                <!-- <li class="nav-heading">Pages</li>

                <li class="nav-item">
                    <a class="nav-link <?php if ($title == 'Profile') {
                                            echo "";
                                        } else {
                                            echo "collapsed";
                                        }  ?>" href="<?= base_url('admin/profile') ?>">
                        <i class="bi bi-person"></i>
                        <span>Profile</span>
                    </a>
                </li>
                <li class="nav-heading">Pages</li> -->
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