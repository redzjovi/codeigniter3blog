<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?php echo base_url() ?>/vendor/almasaeed2010/adminlte/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p><?php echo $ion_auth_user->first_name.' '.$ion_auth_user->last_name; ?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="treeview" style="display: none;">
                <a href="#">
                    <i class="fa fa-share"></i> <span>Multilevel</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                        <small class="label pull-right bg-yellow">12</small>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
                    <li>
                        <a href="#">
                            <i class="fa fa-circle-o"></i> Level One
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-circle-o"></i> Level Two
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
                </ul>
            </li>
            <li class="header" style="display: none;">LABELS</li>
            <li style="display: none;"><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>

            <?php
            foreach ((array) $menu['left'] as $menu_row)
            {
                echo '<li>';
                echo    '<a href="'.site_url($menu_row['url']).'">';
                echo        '<i class="'.$menu_row['icon'].'"></i> <span>'.lang($menu_row['text']).'</span>';
                if (isset($menu_row['children']))
                {
                    echo    '<span class="pull-right-container">';
                    echo        '<i class="fa fa-angle-left pull-right"></i>';
                    echo    '</span>';
                }
                echo    '</a>';

                if (isset($menu_row['children']))
                {
                    echo '<ul class="treeview-menu">';
                    foreach ((array) $menu_row['children'] as $menu_row_children)
                    {
                        echo '<li>';
                        echo    '<a href="'.site_url($menu_row_children['url']).'">';
                        echo        '<i class="'.$menu_row_children['icon'].'"></i> <span>'.lang($menu_row_children['text']).'</span>';
                        echo    '</a>';
                        echo '</li>';
                    }
                    echo '</ul>';
                }

                echo '</li>';
            }
            ?>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
