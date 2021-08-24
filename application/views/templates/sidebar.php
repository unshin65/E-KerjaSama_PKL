<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center">

        <div class="sidebar-brand-text mx-2">Mitra Kerjasama Kab. Malang
        </div>
    </a>



    <!-- Divider -->
    <hr class="sidebar-divider">

    <?php
    $role_id = $this->session->userdata('role_id');
    $queryMenu = "SELECT `user_menu`.`no`,`menu`
                FROM `user_menu` JOIN `user_access_menu`
                ON `user_menu`.`no` = `user_access_menu`.`menu_id`
                WHERE `user_access_menu`.`role_id` = $role_id
               ORDER BY `user_access_menu`.`menu_id` ASC 
    ";
    $menu = $this->db->query($queryMenu)->result_array();

    ?>


    <!-- Looping menu -->
    <?php foreach ($menu as $m) : ?>
        <div class="sidebar-heading">
            <?= $m['menu']; ?>
        </div>


        <!--- sub menu-->
        <?php
        $menuId = $m['no'];
        $querySubMenu = "SELECT *
                    FROM `user_sub_menu` JOIN `user_menu`
                    ON `user_sub_menu`.`menu_id` = `user_menu`.`no`
                    WHERE `user_sub_menu`.`menu_id` = $menuId
                    AND `user_sub_menu`.`is_active` 
";
        $subMenu = $this->db->query($querySubMenu)->result_array();
        ?>

        <?php foreach ($subMenu as $sm) : ?>
            <?php if ($title == $sm['title']) : ?>
                <li class="nav-item active">
                <?php else : ?>
                <li class="nav-item ">
                <?php endif; ?>


                <a class="nav-link" href="<?= base_url($sm['url']); ?>">
                    <i class="<?= ($sm['icon']); ?>"></i>
                    <span><?= ($sm['title']); ?></span>
                </a>
                </li>

            <?php endforeach; ?>
            <!-- Divider -->
            <hr class="sidebar-divider">
        <?php endforeach; ?>

        <!-- Nav Item - Tables -->
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('auth/logout') ?>">
                <i class="fas fa-sign-out-alt"></i>
                <span>Keluar</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

</ul>

<!-- End of Sidebar -->