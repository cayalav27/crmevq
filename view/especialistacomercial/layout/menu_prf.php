<section>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
        <!-- User Info -->
        <div class="user-info">
            <div class="image">
                <img src="assets/fotos/<?php echo $user = $objses->get('FotEmp'); ?>" width="48" height="48" alt="User" />
            </div>
            <div class="info-container">
                <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $user = $objses->get('NomEmp'); ?> <?php echo $user = $objses->get('ApeEmp'); ?></div>
                <div class="email"><?php echo $user = $objses->get('NomCrg'); ?> <?php echo $user = $objses->get('EqpPrf'); ?></div>
                <div class="btn-group user-helper-dropdown">
                    <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                    <ul class="dropdown-menu pull-right">
                        <li><a href="perfilusuario"><i class="material-icons">person</i>Mi Perfil</a></li>
                        <li role="seperator" class="divider"></li>
                        <li><a href="javascript:void(0);" class="btn-exit"><i class="material-icons">input</i>Cerrar Sesión</a></li>
                    </ul>
                </div>
            </div>
        </div>               
        <!-- #User Info -->
        <!-- Menu -->
         <div class="menu">
            <ul class="list">
                <li>
                    <a href="indicadores">
                        <i class="material-icons">home</i>
                        <span>Indicadores</span>
                    </a>
                </li>
                <li>
                    <a href="cliente">
                        <i class="material-icons">account_balance</i>
                        <span>Clientes</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo urlencode('producto&a=Index&CodPrf=').$user = $objses->get('CodPrf'); ?>">
                        <i class="material-icons">business_center</i>
                        <span>Productos</span>
                    </a>
                </li>
                <li>
                    <a href="venta">
                        <i class="material-icons">local_grocery_store</i>
                        <span>Ventas</span>
                    </a>
                </li>
                <li>
                    <a href="backlog">
                        <i class="material-icons">timeline</i>
                        <span>Backlog</span>
                    </a>
                </li>
                <li>
                    <a href="reportes">
                        <i class="material-icons">trending_up</i>
                        <span>Reportes</span>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">public</i>
                        <span>Negocios</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                           <a href="pipeline">
                                <i class="material-icons">assignment</i>
                                <span>Pipeline</span>
                           </a>
                        </li>
                        <li>
                            <a href="forecast">
                                <i class="material-icons">poll</i>
                                <span>Forecast</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="mapa">
                        <i class="material-icons">map</i>
                        <span>Mapa de Negocios</span>
                    </a>
                </li>
                <li class="hidden">
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">public</i>
                        <span>Empleado</span>
                    </a>
                    <ul class="ml-menu">
                        <li class="active">
                            <a href="javascript:void(0);">
                                <i class="material-icons">face</i>
                                <span>Empleado</span>
                            </a> 
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="calendario">
                        <i class="material-icons">date_range</i>
                        <span>Calendario</span>
                    </a>
                </li>
                <li>
                    <a href="marketingcc">
                        <i class="material-icons">markunread_mailbox</i>
                        <span>Marketing</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- #Menu -->
        <!-- Footer -->
        <div class="legal">
            <div class="copyright">
                &copy; 2017-2018  <a target="_blank" href="http://www.enviroequip.pe/">Enviroequip S.A</a>.
            </div>
            <div class="version">
                <b>Version: </b> 1.0.0
            </div>
        </div>
        <!-- #Footer -->
    </aside>
    <!-- #END# Right Sidebar -->
</section>
<section class="content">
    