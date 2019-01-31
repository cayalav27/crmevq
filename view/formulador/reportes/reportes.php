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
                        <li><a href="perfilformulador"><i class="material-icons">person</i>Mi Perfil</a></li>
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
                    <a href="clienteformulador">
                        <i class="material-icons">account_balance</i>
                        <span>Clientes</span>
                    </a>
                </li>
                <li>
                   <a href="pipelineformulador">
                        <i class="material-icons">assignment</i>
                        <span>Pipeline</span>
                   </a>
                </li>
                <li>
                    <a href="forecastformulador">
                        <i class="material-icons">poll</i>
                        <span>Forecast</span>
                    </a>
                </li>
                <li class="active">
                    <a href="reportesform">
                        <i class="material-icons">trending_up</i>
                        <span>Reportes</span>
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
    <div class="container-fluid">
        <div class="row clearfix four-zero-four">
            <div class="four-zero-four-container">
                <div class="error-code">404</div>
                <div class="error-message">La página esta en contrucción</div>
                <div class="button-place">
                    <a href="pipelineformulador" class="btn btn-default btn-sm waves-effect">VOLVER A INICIO</a>
                </div>
            </div>
        </div>
    </div>
</section>