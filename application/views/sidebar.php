<br />

                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

                        <div class="menu_section">
                            <h3>General</h3>
                            <ul class="nav side-menu">
                                <li><a><i class="fa fa-folder-open"></i> Registro <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        <li><a href="<?= site_url('captura/cliente/new') ?>">Cliente</a></li>
                                        <li><a href="<?= site_url('captura/deposito/new') ?>">Deposito</a></li>
                                    </ul>
                                </li>

                                <li><a><i class="fa fa-rocket"></i> Consultar <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        <li><a href="<?= site_url('ver/saldo/all') ?>">Detalle Cliente</a></li>
                                    </ul>
                                </li>


                            </ul>
                        </div>

                    </div>
                    <!-- /sidebar menu -->

                </div>
            </div>

            <!-- top navigation -->
            <div class="top_nav">

                <div class="nav_menu">
                    <nav class="" role="navigation">
                        <div class="nav toggle">
                            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                        </div>

                        <ul class="nav navbar-nav navbar-right">
                            <li class="">
                                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <img src="<?= base_url('assets/img/'.$datosUsuario['genero'].'.png'); ?>" alt=""><?= $datosUsuario['nombre']; ?>
                                    <span class=" fa fa-angle-down"></span>
                                </a>
                                <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
                                    <li><a href="<?= site_url('ver/detalle/'.$datosUsuario['id']); ?>">Perfil</a>
                                    </li>
                                    <!--li>
                                        <a href="javascript:;">Help</a>
                                    </li-->
                                    <li><a href="<?= site_url('dashboard/logout'); ?>"><i class="fa fa-sign-out pull-right"></i>Salir</a>
                                    </li>
                                </ul>
                            </li>

                        </ul>
                    </nav>
                </div>

            </div>
            <!-- /top navigation -->
