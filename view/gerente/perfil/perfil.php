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
                <div class="email"><?php echo $user = $objses->get('NomCrg'); ?></div>
                <div class="btn-group user-helper-dropdown">
                    <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                    <ul class="dropdown-menu pull-right">
                        <li><a href="perfilgerente"><i class="material-icons">person</i>Mi Perfil</a></li>
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
                    <a href="seguimientogerente">
                        <i class="material-icons">trending_up</i>
                        <span>Seguimiento</span>
                    </a>
                </li>
                <li>
                    <a href="reportesgerente">
                        <i class="material-icons">assessment</i>
                        <span>Reportes</span>
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
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <ol class="breadcrumb breadcrumb-col-red">
                            <li><a href="perfilgerente"><i class="material-icons">person</i> Mi Perfil</a></li>
                        </ol>
                    </div>
                    <div class="body table-responsive">
                        <div class="col-sm-4 col-md-4" align="center">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <img class="profile-user-img" src="assets/fotos/<?php echo $user = $objses->get('FotEmp'); ?>" width="150px" height="150px" alt="No existe foto">
                                <h2 class="profile-username text-center" style="color:#1DA4B9"><?php echo $user = $objses->get('NomEmp'); ?> <?php echo $user = $objses->get('ApeEmp'); ?></h2>
                                <p class="text-muted text-center bg-teal"><?php echo $user = $objses->get('NomCrg'); ?></p>
                            </div>
                            <form id="sign_in" action="perfilgerente&a=UpdFotEmp" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="TxtCodEmp" value="<?php echo $user = $objses->get('CodEmp'); ?>" />
                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                                    <div class="input-group form-float form-group-sm">
                                        <input name="TxtFotEmp" type="file" value="<?php echo $user = $objses->get('FotEmp'); ?>" required/> 
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" align="right">
                                    <span data-toggle='tooltip' data-placement="bottom" title='Actualizar Foto'>
                                        <button type="submit" class="btn bg-blue btn-xs waves-effect">
                                            <i class='material-icons'>camera_alt</i>
                                        </button>
                                    </span>  
                                </div>
                            </form>
                        </div>
                        <div class="col-sm-8 col-md-8">
                            <table class="table" style="border-left: 1px solid #D0D3D4">
                                <tbody>
                                    <br>
                                    <tr>
                                        <td width="25"></td>
                                        <th width="50"><h6>DNI</h6></th>
                                        <td width="50"><h6>:</h6></td>
                                        <td width="200"><h6><?php echo $user = $objses->get('DniEmp'); ?></h6></td>
                                        <td width="50"></td>
                                    </tr>
                                    <tr>
                                        <td width="25"></td>
                                        <th width="50"><h6>Genero</h6></th>
                                        <td width="50"><h6>:</h6></td>
                                        <td width="200">
                                            <h6>
                                                <?php 
                                                    if($user = $objses->get('GnrEmp')=='1'){
                                                        echo "<span class='label bg-pink'>Femenino</span>";
                                                                                  }
                                                    else {
                                                        echo "<span class='label bg-blue'>Masculino</span>";
                                                          }
                                                ?>
                                            </h6>
                                        </td>
                                        <td width="50"></td>
                                    </tr>
                                    <tr>
                                        <td width="25"></td>
                                        <th width="50"><h6>Usuario</h6></th>
                                        <td width="50"><h6>:</h6></td>
                                        <td width="200"><h6><?php echo $user = $objses->get('UsuEmp'); ?></h6></td>
                                        <td width="50"></td>
                                    </tr>
                                    <tr>
                                        <td width="25"></td>
                                        <form id="sign_in" action="perfilgerente&a=UpdEmlEmp" method="post" enctype="multipart/form-data">
                                            <input type="hidden" name="TxtCodEmp" value="<?php echo $user = $objses->get('CodEmp'); ?>" />
                                        <th width="50"><h6>Email</h6></th>
                                        <td width="50"><h6>:</h6></td>
                                        <td width="200">
                                            <b>
                                                <div class="input-group form-float form-group-sm">
                                                    <div class="form-line">
                                                        <input type="email" name="TxtEmlEmp" class="form-control" maxlength="50" minlength="10" value="<?php echo $user = $objses->get('EmlEmp'); ?>" required>
                                                    </div>
                                                </div>
                                            </b>
                                        </td>
                                        <td width="50" align="right">
                                            <span data-toggle='tooltip' data-placement="left" title='Actualizar Email'>
                                                <button type="submit" class="btn bg-orange btn-xs waves-effect">
                                                    <i class='material-icons'>mail</i>
                                                </button>
                                            </span>
                                        </td>
                                        </form>
                                    </tr>
                                    <tr>
                                        <td width="25"></td>
                                        <form id="sign_in" action="perfilgerente&a=UpdPswEmp" method="post" enctype="multipart/form-data">
                                            <input type="hidden" name="TxtCodEmp" value="<?php echo $user = $objses->get('CodEmp'); ?>" />
                                        <th width="50"><h6>Clave</h6></th>
                                        <td width="50"><h6>:</h6></td>
                                        <td width="200">
                                            <b>
                                                <div class="input-group form-float form-group-sm">
                                                    <div class="form-line">
                                                        <input type="password" name="TxtPswEmp" class="form-control" maxlength="15" minlength="6" value="<?php echo $user = $objses->get('PswEmp'); ?>" required>
                                                    </div>
                                                </div>
                                            </b>
                                        </td>
                                        <td width="50" align="right">
                                            <span data-toggle='tooltip' data-placement="left" title='Actualizar Email'>
                                                <button type="submit" class="btn bg-green btn-xs waves-effect">
                                                    <i class='material-icons'>vpn_key</i>
                                                </button>
                                            </span>
                                        </td>
                                        </form>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>